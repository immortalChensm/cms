<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Hospital extends Model
{
    use SearchableTrait;

    //
    protected $guarded = [];
    protected $table = "hospital";

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


    public function province()
    {
        return $this->belongsTo(Region::class,'provinceid','id');
    }

    public function city()
    {
        return $this->belongsTo(Region::class,'cityid','id');
    }

    public function county()
    {
        return $this->belongsTo(Region::class,'countyid','id');
    }

    public function town()
    {
        return $this->belongsTo(Region::class,'townid','id');
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
            'hospital.name' => 1,
        ],
        'joins' => [
            //'subject' => ['hospital.subjectid','categorys.id'],
        ],
    ];

    //该医院下的医生
    public function doctors()
    {
        return $this->hasMany(Pyhsician::class,"hospitalid","id");
    }

}
