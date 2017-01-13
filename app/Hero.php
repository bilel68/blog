<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public $timestamps = false;
    public function Superpowers()
    {
      return $this->belongsToMany('App\Superpower');
    }
    public function nemesis()
    {
      return $this->belongsTo('App\Hero', 'nemesis_id');
    }
}
