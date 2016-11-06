<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CenarioStep extends Model
{
    protected $table = 'cenario_step';
    protected $fillable = ['valor','cenario_id','step_id', 'id'];
    public $timestamps = false;

}
