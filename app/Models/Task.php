<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function steps()
    {
        return $this->hasMany('App\Models\Step');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function addStep($attributes)
    {
        return $this->steps()->create($attributes);
    }
}