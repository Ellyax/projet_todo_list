<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    //permettera de passer les infos de la BDD au classe qui y herite
protected $table = 'tasks';

    public $timestamps=true;
    protected $fillable=['id','user_id','name','descriptionTache','fini'];

}
