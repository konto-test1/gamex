<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Gornymedia\Shortcodes\Facades\Shortcode;
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
        Schema::defaultStringLength(191);

        Shortcode::add('template', function($atts, $content, $name)
        {
          $a = Shortcode::atts([
            'name' => $name,
            'foo' => 'something',
            ], $atts);
            
          return "foo = {$a['foo']}";
        });
    }
}
