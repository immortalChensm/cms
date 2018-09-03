<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Pyhsician extends Model
{
    use SearchableTrait;

    //
    protected $guarded = [];
    protected $table = "pyhsician";

    public function subject()
    {
        //所属科室
        return $this->belongsTo(Categorys::class,'subjectid','id');
    }

    public function skill()
    {
        //所属专业特长
        return $this->belongsTo(Categorys::class,'skillid','id');
    }


    public function position()
    {
        return $this->belongsTo(Position::class,'positionid','id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospitalid','id');
    }

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'pyhsician.username' => 1,
        ],
        'joins' => [
            //'subject' => ['hospital.subjectid','categorys.id'],
        ],
    ];



}
