<?php

namespace TallAndSassy\GrokJetUi\Models;

use Illuminate\Database\Eloquent\Model;

class GrokJetUiModel extends Model
{
    public $gaurded = [];// Defualt to no mass assignements
    public $fillable = ['name'];
    public $table = 'grok-jet-ui';

    public function getUpperCasedName() : string
    {
        return strtoupper($this->name);
    }
}
