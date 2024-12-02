<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDirectives();
        $this->configurePurelizer();
    }

    protected function configureDirectives(): void
    {
        Blade::directive('money', function ($expression) {
            return "<?php echo \Illuminate\Support\Number::currency(($expression) / 100, 'BRL', 'pt_BR'); ?>";
        });
    }

    protected function configurePurelizer(): void
    {
        Pluralizer::useLanguage('portuguese');
    }
}
