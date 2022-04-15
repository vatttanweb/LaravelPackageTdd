<?php

namespace Dizaji\ToDo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;

    public function lables()
    {
        return $this->hasMany(Lable::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
