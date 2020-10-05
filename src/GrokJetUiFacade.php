<?php

namespace TallAndSassy\GrokJetUi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TallAndSassy\GrokJetUi\GrokJetUi
 */
class GrokJetUiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'grok-jet-ui';
    }
}
