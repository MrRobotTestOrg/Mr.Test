<?php

namespace App;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Cenario extends Model
{
    use CrudTrait;

    protected $table = 'cenario';
    protected $fillable = ['titulo','feature_id'];
    public $timestamps = false;


    public function steps()
    {
        return $this->belongsToMany('App\Step')->withPivot(['valor','id']);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($model)
        {
            $model->steps()->detach();
        });
    }
}
