<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Consulation extends Model
{
    use SearchableTrait;

    //
    protected $guarded = [];
    protected $table = "consulation";



    public function hospital()
    {
        //病例记录关联的医院
        return $this->belongsTo(Hospital::class,'assign_hospitalid','id');
    }

    public function pyhsician()
    {
        //病例记录关联的医生
        return $this->belongsTo(Pyhsician::class,'userid','id');
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
            'consulation.name' => 1,
        ],
        'joins' => [
            //'subject' => ['hospital.subjectid','categorys.id'],
        ],
    ];



}
