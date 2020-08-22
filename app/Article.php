<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class Article extends Model
{
    protected $fillable=['title','excerpt','body']; //this limits the submission of data, and provide security against unauthorized user
    //protected $guarded = []; //This leave all security on developer
    public function path(){
        return route('articles.show',$this);
    }

public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
