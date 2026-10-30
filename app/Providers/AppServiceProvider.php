<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Register custom Gmail API mail transport
        $this->app->make(\Illuminate\Mail\MailManager::class)->extend('gmail', function ($config) {
            $client = new \Google\Client();
            
            // Read credentials
            $credentialsPath = base_path('advance.json');
            if (file_exists($credentialsPath)) {
                $client->setAuthConfig($credentialsPath);
            }

            // Set the saved token
            $tokenPath = storage_path('app/gmail_token.json');
            if (file_exists($tokenPath)) {
                $accessToken = json_decode(file_get_contents($tokenPath), true);
                $client->setAccessToken($accessToken);
            }

            // If access token is expired, refresh it
            try {
                if ($client->isAccessTokenExpired()) {
                    if ($client->getRefreshToken()) {
                        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
                    }
                }
            } catch (\Exception $e) {
                \Log::error('Gmail Token Refresh Error: ' . $e->getMessage());
            }

            return new \App\Mail\Transport\GmailApiTransport($client);
        });
    }
}
