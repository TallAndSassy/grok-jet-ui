<?php


namespace TallAndSassy\GrokJetUi\Tests\Feature\Commands;

class GrokJetUiCommandTest extends \TallAndSassy\GrokJetUi\Tests\TestCase
{
    /** @test */
    public function test_command_works()
    {
        $this->artisan('hw')->assertExitCode(0);
        $this->artisan('hw')->expectsOutput('TallAndSassy/GrokJetUi/hw/tbd');
    }
}
