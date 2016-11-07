<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Modulo extends Model
{
    use CrudTrait;

    protected $table = 'modulo';
    protected $fillable = ['nome','caminho_base'];
    public $timestamps = false;

    public function features()
    {
        return $this->hasMany('App\Feature');
    }
}
