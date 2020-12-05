<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        //!!!Вообщем это напоминание!!!
        //безобразие ниже необходимо отрефакторить по всем параметрам
        $tasks = (new Task)->where('author_id', auth()->id())->with('tags')->get()->pluck('tags')->flatten()->unique('name');
        return $tasks;
    }
}
