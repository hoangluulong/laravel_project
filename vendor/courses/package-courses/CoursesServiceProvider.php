<?php 

namespace Courses\Courses;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use URL,
    Route;
use Illuminate\Http\Request;

class CoursesServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {

        //generate context key
//        $this->generateContextKey();

        // load view
        $this->loadViewsFrom(__DIR__ . '/Views', 'package-courses');

        // publish config
        $this->publishConfig();

        // publish views
        //$this->publishViews();

        // publish assets
        $this->publishAssets();
        
        // public migrations
        $this->publishMigrations();
        
        // public seeders
        $this->publishSeeders();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';
    }

    /**
     * Public config to system
     * @source: vendor/cansa/package-intership/config
     * @destination: config/
     */
    protected function publishConfig() {
        $this->publishes([
            __DIR__ . '/config/package-courses.php' => config_path('package-courses.php'),
                ], 'config');
    }

    

    /**
     * Public view to system
     * @source: vendor/cansa/package-intership/Views
     * @destination: resources/views/vendor/package-intership
     */
    protected function publishViews() {

        $this->publishes([
            __DIR__ . '/Views' => base_path('resources/views/vendor/package-courses'),
        ]);
    }

    protected function publishAssets() {
        $this->publishes([
            __DIR__ . '/public' => public_path('packages/courses/package-courses'),
        ]);
    }
    
    /**
     * Publish migrations
     * @source: courses/package-courses/database/migrations
     * @destination: database/migrations
     */
    protected function publishMigrations() {        
        $this->publishes([
            __DIR__ . '/database/migrations' => $this->app->databasePath() . '/migrations',
        ]);
    }
    
    /**
     * Publish seeders
     * @source: courses/package-courses/database/seeders
     * @destination: database/seeders
     */
    protected function publishSeeders() {        
        $this->publishes([
            __DIR__ . '/database/seeders' => $this->app->databasePath() . '/seeders',
        ]);
    }

}