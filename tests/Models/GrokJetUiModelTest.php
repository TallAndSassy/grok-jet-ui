<?php

namespace TallAndSassy\GrokJetUi\Tests\Feature\Models;

use TallAndSassy\GrokJetUi\Models\GrokJetUiModel;
use TallAndSassy\GrokJetUi\Tests\TestCase;

class GrokJetUiModelTest extends TestCase
{
    /** @test */
    public function it_can_create_a_model()
    {
        $model = GrokJetUiModel::create(['name' => 'John']);
        $this->assertDatabaseCount('grok-jet-ui', 1);
        $this->assertEquals('JOHN', $model->getUpperCasedName());
    }
}
