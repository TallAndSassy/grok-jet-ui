<?php

namespace TallAndSassy\GrokJetUi;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use TallAndSassy\GrokJetUi\Commands\GrokJetUiCommand;
use TallAndSassy\GrokJetUi\Http\Controllers\GrokJetUiController;

class GrokJetUiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../config/grok-jet-ui.php' => config_path('grok-jet-ui.php'),
                ],
                'config'
            );

            $this->publishes(
                [
                    __DIR__ . '/../resources/views' => base_path('resources/views/vendor/grok-jet-ui'),
                ],
                'views'
            );

            $migrationFileName = 'create_grok_jet_ui_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes(
                    [
                        __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path(
                            'migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName
                        ),
                    ],
                    'migrations'
                );
            }

            $this->publishes([
                 __DIR__.'/../resources/public' => public_path('eleganttechnologies/grok'),
                ], ['public']);

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('tallandsassy/grok-jet-ui'),
            ], 'grok.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/tallandsassy/grok-jet-ui'),
            ], 'grok.views');*/



            // Registering package commands.
            $this->commands(
                [
                    GrokJetUiCommand::class,
                ]
            );
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tassygrokjetui');


        Route::macro(
            'tassygrokjetui',
            function (string $prefix) {
                Route::prefix($prefix)->group(
                    function () {
                        // Prefix Route Samples -BEGIN-
                        // Sample routes that only show while developing...
                        if (App::environment(['local', 'testing'])) {
                            // prefixed url to string
                            Route::get(
                                '/TallAndSassy/GrokJetUi/string', // you will absolutely need a prefix in your url
                                function () {
                                    return "Hello GrokJetUi string via blade prefix";
                                }
                            );

                            // prefixed url to blade view
                            Route::get(
                                '/TallAndSassy/GrokJetUi/test_blade',
                                function () {
                                    return view('tassygrokjetui::test_blade');
                                }
                            );

                            // prefixed url to controller
                            Route::get(
                                '/TallAndSassy/GrokJetUi/controller',
                                [GrokJetUiController::class, 'sample']
                            );
                        }
                        // Prefix Route Samples -END-

                        // TODO: Add your own prefixed routes here...
                    }
                );
            }
        );
        Route::tassygrokjetui('tassygrokjetui'); // This works. http://test-jet.test/tassy/TallAndSassy/GrokJetUi/string
        // They are addatiive, so in your own routes/web.php file, do Route::tassy('staff'); to
        // make http://test-jet.test/staff/TallAndSassy/GrokJetUi/string work


        // global url samples -BEGIN-
        if (App::environment(['local', 'testing'])) {
            // global url to string
            Route::get(
                '/grok/TallAndSassy/GrokJetUi/string',
                function () {
                    return "Hello GrokJetUi string via global url.";
                }
            );

            // global url to blade view
            Route::get(
                '/grok/TallAndSassy/GrokJetUi/test_blade',
                function () {
                    return view('tassygrokjetui::test_blade');
                }
            );

            // global url to controller
            Route::get('/grok/TallAndSassy/GrokJetUi/controller', [GrokJetUiController::class, 'sample']);
        }
        // global url samples -END-

        // TODO: Add your own global routes here...

        // GROK
        if (App::environment(['local', 'testing'])) {
            \ElegantTechnologies\Grok\GrokWrangler::grokMe(static::class, 'TallAndSassy', 'grok-jet-ui', 'resources/views/grok', 'tassygrokjetui');
            #Route::get('/grok/TallAndSassy/GrokJetUi', fn () => view('tassy::grok/index'));
        }
        // TODO: Add your own other boot related stuff here...
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/grok-jet-ui.php', 'grok-jet-ui');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
