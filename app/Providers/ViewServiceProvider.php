<?php

namespace App\Providers;
/**
 * - turn off blade compiler
 */
use Illuminate\View\Engines\EngineResolver;

class ViewServiceProvider extends \Illuminate\View\ViewServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->registerFactory();
        $this->registerViewFinder();
    }

    /**
     * Register the engine resolver instance.
     *
     * @return void
     */
    public function registerEngineResolver()
    {
        $this->app->singleton('view.engine.resolver', function () {
            $resolver = new EngineResolver;

            // Next, we will register the various view engines with the resolver so that the
            // environment will resolve the engines needed for various views based on the
            // extension of view file. We call a method for each of the view's engines.
            foreach (['file', 'php'] as $engine) {
                $this->{'register'.ucfirst($engine).'Engine'}($resolver);
            }

            return $resolver;
        });
    }
}
