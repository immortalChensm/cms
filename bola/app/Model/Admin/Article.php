<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Article extends Model
{
    use SearchableTrait;
     protected $table       = 'article';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'article.title' => 1,
        ],
        'joins' => [
            //'subject' => ['hospital.subjectid','categorys.id'],
        ],
    ];
}
