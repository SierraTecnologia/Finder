<?php

namespace Finder;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Finder\Services\FinderService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

use Log;
use App;
use Config;
use Route;
use Illuminate\Routing\Router;

use Support\ClassesHelpers\Traits\Models\ConsoleTools;

use Finder\Facades\Finder as FinderFacade;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class FinderProvider extends ServiceProvider
{
    use ConsoleTools;

    public static $aliasProviders = [
        'Finder' => \Finder\Facades\Finder::class,
    ];

    public static $providers = [
        \Finder\Providers\FinderEventServiceProvider::class,
        \Finder\Providers\FinderRouteProvider::class,

        \Tracking\TrackingProvider::class,

        /**
         * Externos
         */
        // \CipeMotion\Medialibrary\ServiceProvider::class,
        \SierraTecnologia\Crypto\CryptoProvider::class,
        \Intervention\Image\ImageServiceProvider::class,
    ];

    /**
     * Rotas do Menu
     */
    public static $menuItens = [
        'Ferramentas' => [
            [
                'text'        => 'Procurar',
                'icon'        => 'fas fa-fw fa-search',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                // 'access' => \App\Models\Role::$ADMIN
            ],
            'Procurar' => [
                [
                    'text'        => 'Finder Home',
                    'route'       => 'finder.home',
                    'icon'        => 'fas fa-fw fa-ship',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Finder Index',
                    'route'       => 'finder.finder',
                    'icon'        => 'fas fa-fw fa-gavel',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Finder Pessoas',
                    'route'       => 'finder.persons',
                    'icon'        => 'fas fa-fw fa-group',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
            ],
        ],
    ];

    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        
        // Register configs, migrations, etc
        $this->registerDirectories();

        // // COloquei no register pq nao tava reconhecendo as rotas para o adminlte
        // $this->app->booted(function () {
        //     $this->routes();
        // });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        /**
         * Finder Routes
         */
        Route::group([
            'namespace' => '\Finder\Http\Controllers',
        ], function ($router) {
            require __DIR__.'/Routes/web.php';
        });
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/finder.php'), 'sitec.finder');
        

        $this->setProviders();
        $this->routes();



        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $loader = AliasLoader::getInstance();
        $loader->alias('Finder', FinderFacade::class);

        $this->app->singleton('finder', function () {
            return new Finder();
        });
        
        /*
        |--------------------------------------------------------------------------
        | Register the Utilities
        |--------------------------------------------------------------------------
        */
        /**
         * Singleton Finder
         */
        $this->app->singleton(FinderService::class, function($app)
        {
            Log::info('Singleton Finder');
            return new FinderService(config('sitec.finder'));
        });

        // Register commands
        $this->registerCommandFolders([
            base_path('vendor/sierratecnologia/finder/src/Console/Commands') => '\Finder\Console\Commands',
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'finder',
        ];
    }

    /**
     * Register configs, migrations, etc
     *
     * @return void
     */
    public function registerDirectories()
    {
        // Publish config files
        $this->publishes([
            // Paths
            $this->getPublishesPath('config/sitec') => config_path('sitec'),
        ], ['config',  'sitec', 'sitec-config']);

        // // Publish finder css and js to public directory
        // $this->publishes([
        //     $this->getDistPath('finder') => public_path('assets/finder')
        // ], ['public',  'sitec', 'sitec-public']);

        $this->loadViews();
        $this->loadTranslations();

    }

    private function loadViews()
    {
        // View namespace
        $viewsPath = $this->getResourcesPath('views');
        $this->loadViewsFrom($viewsPath, 'finder');
        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/finder'),
        ], ['views',  'sitec', 'sitec-views']);

    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes([
            $this->getResourcesPath('lang') => resource_path('lang/vendor/finder')
        ], ['lang',  'sitec', 'sitec-lang', 'translations']);

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'finder');
    }

}
