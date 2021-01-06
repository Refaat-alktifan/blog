<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'title','cover','message','author','slug','cat','seodesc','seokeyword','status','tags'
    ];
    protected $hidden = [
     ];
}
