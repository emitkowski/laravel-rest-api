<?php namespace RestApiSample\Services\Mailer;

use Illuminate\Support\ServiceProvider;

class MailerServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

    }

}