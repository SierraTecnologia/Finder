<?php

namespace Finder;

use App;
use Config;
use Finder\Facades\Finder as FinderFacade;
use Finder\Services\FinderService;
use Illuminate\Contracts\Events\Dispatcher;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use Log;
use Muleta\Traits\Providers\ConsoleTools;
use Route;

use Stalker\Services\Midia\FileService;

class FinderProvider extends ServiceProvider
{
    use ConsoleTools;

    public $packageName = 'finder';
    const pathVendor = 'sierratecnologia/finder';

    public static $aliasProviders = [
        'Finder' => \Finder\Facades\Finder::class,
        'FileService' => FileService::class,
    ];

    public static $providers = [

        \Stalker\StalkerProvider::class,
        \Casa\CasaProvider::class,

        /**
         * Externos
         */
        \SierraTecnologia\Crypto\CryptoProvider::class,

        
    ];

    /**
     * Rotas do Menu
     */
    public static $menuItens = [
        'Operações|150' => [
            [
                'text' => 'Finder',
                'icon' => 'fas fa-fw fa-search',
                'icon_color' => "blue",
                'label_color' => "success",
                'section' => "master",
                'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
            ],
            'Finder' => [
                [
                    'text'        => 'Procurar',
                    'icon'        => 'fas fa-fw fa-search',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section' => "master",
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Track',
                    'icon'        => 'fas fa-fw fa-search',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section' => "master",
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Url',
                    'route'       => 'master.finder.url.index',
                    'icon'        => 'fas fa-fw fa-ship',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section'     => "master",
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Computer Files',
                    'route'       => 'master.finder.files.index',
                    'icon'        => 'fas fa-fw fa-ship',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section'   => "master",
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                'Procurar' => [
                    [
                        'text'        => 'Finder Home',
                        'route'       => 'rica.finder.home',
                        'icon'        => 'fas fa-fw fa-ship',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'section' => "master",
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Finder Pessoas',
                        'route'       => 'rica.finder.persons',
                        'icon'        => 'fas fa-fw fa-group',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'section' => "master",
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                ],
                'Track' => [
                    [
                        'text'        => 'Persons',
                        'route'       => 'rica.finder.track.person',
                        'icon'        => 'fas fa-fw fa-coffee',
                        'icon_color'  => 'red',
                        'label_color' => 'success',
                        'section' => "master",
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'nivel' => \App\Models\Role::$GOOD,
                    ],
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

        // COloquei no register pq nao tava reconhecendo as rotas para o adminlte
        $this->app->booted(function () {
            $this->routes();
        });

        $this->loadLogger();
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
        $this->loadRoutesForRiCa(__DIR__.'/../routes');
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/finder.php'), 'sitec.finder');
        

        $this->setProviders();
        // $this->routes();



        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app->singleton(
            'finder', function () {
                return new Finder();
            }
        );
        
        /*
        |--------------------------------------------------------------------------
        | Register the Utilities
        |--------------------------------------------------------------------------
        */
        /**
         * Singleton Finder
         */
        $this->app->singleton(
            FinderService::class, function ($app) {
                \Log::channel('sitec-finder')->info('Singleton Finder');
                return new FinderService(\Illuminate\Support\Facades\Config::get('sitec.finder'));
            }
        );

        // Register commands
        $this->registerCommandFolders(
            [
            base_path('vendor/sierratecnologia/finder/src/Console/Commands') => '\Finder\Console\Commands',
            ]
        );

        // /**
        //  * Helpers
        //  */
        // Aqui noa funciona
        // if (!function_exists('finder_asset')) {
        //     function finder_asset($path, $secure = null)
        //     {
        //         return route('rica.finder.assets').'?path='.urlencode($path);
        //     }
        // }
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
        $this->publishes(
            [
            // Paths
            $this->getPublishesPath('config/sitec') => config_path('sitec'),
            ], ['config',  'sitec', 'sitec-config']
        );

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
        $this->publishes(
            [
            $viewsPath => base_path('resources/views/vendor/finder'),
            ], ['views',  'sitec', 'sitec-views']
        );
    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes(
            [
            $this->getResourcesPath('lang') => resource_path('lang/vendor/finder')
            ], ['lang',  'sitec', 'sitec-lang', 'translations']
        );

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'finder');
    }


    /**
     *
     */
    private function loadLogger()
    {
        Config::set(
            'logging.channels.sitec-finder', [
            'driver' => 'single',
            'path' => storage_path('logs/sitec-finder.log'),
            'level' => env('APP_LOG_LEVEL', 'debug'),
            ]
        );
    }
}
