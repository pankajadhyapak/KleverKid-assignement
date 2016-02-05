<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function academy()
    {
        return $this->belongsToMany(Academy::class);
    }
}
