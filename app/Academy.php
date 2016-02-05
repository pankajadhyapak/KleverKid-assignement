<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = ['user_name','academy_name','timeslots','email','phone','description','latitude','longitude'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
