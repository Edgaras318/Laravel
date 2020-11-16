<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    //table name
    protected $table = 'blogs';
    //primary key
    public $primaryKey = 'id';
    //time staps its true by default
    public $timestaps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

     protected $fillable = [
        'title', 'description','user_id'
    ];

}
