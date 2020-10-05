<?php


namespace TallAndSassy\GrokJetUi\Tests\Feature\Http\Controllers;

class GrokJetUiControllerTest extends \TallAndSassy\GrokJetUi\Tests\TestCase
{
    /** @test */
    public function global_urls_returns_ok()
    {
        // Test hard-coded routes...
        $this
            ->get('/grok/TallAndSassy/GrokJetUi/string')
            ->assertOk()
            ->assertSee('Hello GrokJetUi string via global url.');
        $this
            ->get('/grok/TallAndSassy/GrokJetUi/test_blade')
            ->assertOk()
            ->assertSee('Hello GrokJetUi from blade in TallAndSassy/GrokJetUi/groks/test_blade');
        $this
            ->get('/grok/TallAndSassy/GrokJetUi/controller')
            ->assertOk()
            ->assertSee('Hello GrokJetUi from: TallAndSassy\GrokJetUi\Http\Controllers\GrokJetUiController::sample');
    }


    /** @test */
    public function prefixed_urls_returns_ok()
    {
        // Test user-defined routes...
        // Reproduce in routes/web.php like so
        //  Route::tassy('staff');
        //  http://test-tallandsassy.test/staff/TallAndSassy/GrokJetUi/string
        //  http://test-tallandsassy.test/staff/TallAndSassy/GrokJetUi/blade
        //  http://test-tallandsassy.test/staff/TallAndSassy/GrokJetUi/controller
        $userDefinedBladePrefix = $this->userDefinedBladePrefix; // user will do this in routes/web.php Route::tassy('url');

        // string
        $this
            ->get("/$userDefinedBladePrefix/TallAndSassy/GrokJetUi/string")
            ->assertOk()
            #->assertSee('hw(TallAndSassy\GrokJetUi\Http\Controllers\GrokJetUiController)');
        ->assertSee('Hello GrokJetUi string via blade prefix');

        // blade
        $this
            ->get("/$userDefinedBladePrefix/TallAndSassy/GrokJetUi/test_blade")
            ->assertOk()
            ->assertSee('Hello GrokJetUi from blade in TallAndSassy/GrokJetUi/groks/test_blade');

        // controller
        $this
            ->get("/$userDefinedBladePrefix/TallAndSassy/GrokJetUi/controller")
            ->assertOk()
            ->assertSee('Hello GrokJetUi from: TallAndSassy\GrokJetUi\Http\Controllers\GrokJetUiController::sample');
    }
}
