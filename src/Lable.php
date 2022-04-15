<?php

namespace Dizaji\ToDo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lable extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;

    protected $table = "labels";

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
