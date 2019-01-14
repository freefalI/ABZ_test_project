<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use NodeTrait;

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
