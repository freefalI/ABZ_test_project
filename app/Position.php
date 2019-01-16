<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use NodeTrait;
    use Sortable;
    public $sortable = ['id',
        'name'
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
