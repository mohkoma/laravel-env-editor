<?php

/**
 * Configs for the application
 */
return [

    /**
     *  The middlewares for the env's routes
     */
    'middlewares' => [
        //\Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class
    ],


    /**
     *  Choose custom routes (Keep the same keys, Just change the value)
     */
    'routes' => [
        /**
         * Dispaly the editor view
         */
        'dev.environment' => '/dev/environment',

        /**
         * Fetch the current environment file
         */
        'dev.environment.fetch' => '/dev/environment/fetch',

        /**
         * Save environment file changes
         */
        'dev.environment.save' => '/dev/environment/save',
    ],

    /**
     *  The validation for the env
     */
    'validation' => [

        /**
         * Rules for the env content coming from client
         */
        'rules' => 'required|string',
    ],
];
