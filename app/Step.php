<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use CrudTrait;

    protected $table = 'step';
    protected $fillable = ['nome'];
    public $timestamps = false;

    public function cenarios()
    {
        return $this->belongsToMany('App\Cenario');
    }
}
