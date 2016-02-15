<?php

namespace App\Providers;

use App\Sentinel\Persistences\StatelessPersistenceRepository;
use Cartalyst\Sentinel\Laravel\SentinelServiceProvider;

class StatelessSentinelServiceProvider extends SentinelServiceProvider
{
    public function register()
    {
        $this->app->configure('sentinel');
        config(['cartalyst.sentinel' => config('sentinel')]);
        config(['sentinel' => null]);

        parent::register();
    }

    /**
     * Registers the persistences.
     *
     * @return void
     */
    protected function registerPersistences()
    {
        /**
         * Dropping session and cookie registration since Lumen 5.2+ (stateless) does not include
         * `session.store` and `cookie`
         */
        // $this->registerSession();
        // $this->registerCookie();

        $this->app->singleton('sentinel.persistence', function ($app) {
            $config = $app['config']->get('cartalyst.sentinel');

            $model  = array_get($config, 'persistences.model');
            $users  = array_get($config, 'users.model');

            if (class_exists($users) && method_exists($users, 'setPersistencesModel')) {
                forward_static_call_array([$users, 'setPersistencesModel'], [$model]);
            }

            return new StatelessPersistenceRepository();
        });
    }
}