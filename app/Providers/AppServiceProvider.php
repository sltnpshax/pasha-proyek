<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        if (isset($_SERVER['VERCEL']) || env('VERCEL') == 1) {
            config(['livewire.temporary_file_upload.directory' => '/tmp/storage/app/livewire-tmp']);
        }
    }
}