<?php

namespace Dizaji\ToDo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
