<?php
namespace App\Providers;

use App\Cart;
use App\Store;
use App\Theme;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Blade;
use Lavender\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Cart', 'App\Store', 'App\Theme'];
    }


    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $this->bootStore($this->app['App\Store']);

            $this->bootTheme($this->app['App\Theme'], $this->app['App\Store']);

        } catch(QueryException $e){

            // missing core tables
            if(!\App::runningInConsole()) throw new HttpException(500, "Lavender not installed.");
        } catch(\Exception $e){

            // something went wrong
            if(!\App::runningInConsole()) throw new HttpException(500, $e->getMessage());
        }
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Cart');

        $this->app->singleton('App\Store');

        $this->app->singleton('App\Theme');

        $this->app->booted(function(){

            $this->registerBladeExtensions();

        });
    }

    public function bootStore(Store $store)
    {
        // Add database config for current store.
        if($store->bootStore()) $this->registerStoreConfig($store);

        // Default store was not found.
        else throw new \Exception("Default store was not found.");
    }


    /**
     * Update the view paths.
     *
     * @return void
     */
    private function registerStoreConfig(Store $store)
    {
        // merge store config into global config
        foreach($store->getConfig() as $item){

            $this->app['config']->set('store.' . $item->key, $item->value);

        }
    }

    /**
     * Match user session to initialize $theme
     *
     * @throws HttpException
     */
    private function bootTheme(Theme $theme, Store $store)
    {
        // Add file paths for current theme.
        if($theme->bootTheme($store)) $this->registerViewPaths($theme);

        // Theme not set for current store.
        else throw new \Exception("Theme not set for current store.");
    }


    /**
     * Update the view paths.
     *
     * @return void
     */
    private function registerViewPaths(Theme $theme)
    {
        // get current view paths
        $paths = $this->app->config['view.paths'];

        // unset original paths
        $this->app['config']->set('view.paths', []);

        // merge all package views
        // todo keep?
//        $viewFinder = $this->app['view.finder'];
//        foreach($viewFinder->getHints() as $module_paths){
//
//            $paths = array_merge($paths, $module_paths);
//        }

        // create new paths based on current theme
        foreach($theme->fallbacks as $fallback){

            foreach($paths as $path){

                $this->app['config']->push('view.paths', $path . '/' . $fallback);

            }
        }

    }

    private function registerBladeExtensions()
    {
        Blade::extend(function($view, $compiler){
            return preg_replace(
                $compiler->createMatcher('tabs'),
                '$1<?php echo Tabs::make$2; ?>',
                $view
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('menu'),
                '$1<?php echo Menu::make$2; ?>',
                $html
            );
        });

        Blade::extend(function($html){
            return preg_replace(
                '/\@define(.+)/',
                '<?php ${1}; ?>',
                $html
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('form'),
                '$1<?php echo Form::make$2; ?>',
                $html
            );
        });

        Blade::extend(function($html, $compiler){
            return preg_replace(
                $compiler->createMatcher('paginate'),
                '$1<?php echo paginate$2; ?>',
                $html
            );
        });
    }


}