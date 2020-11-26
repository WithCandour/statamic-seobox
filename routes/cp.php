<?php

Route::namespace('\WithCandour\AardvarkSeo\Http\Controllers\CP')
    ->prefix('aardvark-seo')
    ->name('aardvark-seo.')
    ->group(function () {

    Route::redirect('settings', 'settings/general')
        ->name('settings');

    Route::prefix('settings')->group(function() {
        Route::resource('general', 'GeneralController')->only([
            'index', 'store'
        ]);

        Route::resource('sitemap', 'SitemapController')->only([
            'index', 'store'
        ]);

        Route::resource('marketing', 'MarketingController')->only([
            'index', 'store'
        ]);

        Route::resource('social', 'SocialController')->only([
            'index', 'store'
        ]);

        Route::resource('blueprints', 'BlueprintsController')->only([
            'index', 'store'
        ]);

        Route::resource('defaults', 'DefaultsController')->only([
            'index', 'edit', 'update'
        ]);
    });

    // Redirects have their own section
    Route::namespace('Redirects')
        ->name('redirects.')
        ->prefix('redirects')
        ->group(function() {
            // Top level redirect
            Route::redirect('/', 'redirects/manual-redirects')->name('index');

            // Manual redirects
            Route::prefix('manual-redirects')
                ->name('manual-redirects.')
                ->group(function() {
                    Route::get('actions', 'ManualRedirectsController@bulkActions')
                        ->name('actions');
                    Route::post('actions', 'ManualRedirectsController@runActions')
                        ->name('run');
                });
            Route::resource('manual-redirects', 'ManualRedirectsController')->only([
                'index', 'create', 'edit', 'update', 'store', 'destroy'
            ]);

            // Auto redirects
            Route::prefix('auto-redirects')
                ->name('auto-redirects.')
                ->group(function() {
                    Route::get('actions', 'AutoRedirectsController@bulkActions')
                        ->name('actions');
                    Route::post('actions', 'AutoRedirectsController@runActions')
                        ->name('run');
                });
            Route::resource('auto-redirects', 'AutoRedirectsController')->only([
                'index', 'destroy'
            ]);
        });
});