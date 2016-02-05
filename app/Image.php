<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image_path','academy_id'];

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
}
