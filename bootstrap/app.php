<?php

use Gecche\Multidomain\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$environmentPath = null;

$domainParams = [
    'domain_detection_function_web' => function() {
        return \Illuminate\Support\Arr::get($_SERVER,'SERVER_NAME');
    }
];

return Application::configure(basePath: dirname(__DIR__),
    environmentPath: $environmentPath,
    domainParams: $domainParams)
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('login', [
            \App\Http\Middleware\LoginCheck::class,
        ]);
        $middleware->appendToGroup('checksubscription', [
            \App\Http\Middleware\CheckSubscription::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'admin/create_service_category',
            'admin/update_service_category',
            'admin/service-change',
            'admin/getactive',
            'admin/create-contact-mail',
            'admin/create-appointment-mail',
            'admin/service-list',
            'admin/update_service',
            'admin/addpressmedia',
            'admin/video-change',
            'admin/exclusive-list',
            'admin/bridal-list',
            'admin/result-servicelist',
            'admin/video-servicelist',
            'admin/service-section-delete',
            'admin/service-section-order',
            'admin/permission-menulists',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
            echo "<script>
     window.location.href = '/404'
     </script>";
        });
    })->create();
