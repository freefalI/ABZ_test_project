<?php

namespace App;

use App\Position;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use NodeTrait;

    public function position()
    {
        return $this->belongsTo(Position::class)->withDepth();
    }
    public function boss()
    {
        return $this->belongsTo(Employee::class, 'parent_id');
    }

    public function childrenWithPositions()
    {
        return $this->hasMany(get_class($this), $this->getParentIdName())
            ->setModel($this)->with('position');
    }

}
