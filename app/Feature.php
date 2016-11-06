<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use CrudTrait;

    protected $table = 'feature';
    protected $fillable = ['titulo','para_que','como_um','eu_devo','modulo_id'];
    public $timestamps = false;

    public function modulo()
    {
        return $this->belongsTo('App\Modulo');
    }
}
