<?php

namespace App\Mail\Transport;

use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mailer\SentMessage;
use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;
use Illuminate\Support\Facades\Log;

class GmailApiTransport extends AbstractTransport
{
    protected Client $client;

    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    protected function doSend(SentMessage $message): void
    {
        $gmail = new Gmail($this->client);
        $gmsg = new Message();

        // Convert Symfony SentMessage to raw MIME string
        $mime = $message->toString();

        // Base64Url encode for Gmail API
        $raw = strtr(base64_encode($mime), '+/', '-_');
        $raw = rtrim($raw, '=');

        $gmsg->setRaw($raw);

        try {
            $gmail->users_messages->send('me', $gmsg);
        } catch (\Exception $e) {
            Log::error('Gmail API Error: ' . $e->getMessage());
        }
    }

    public function __toString(): string
    {
        return 'gmail';
    }
}
