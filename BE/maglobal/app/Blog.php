<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'blog';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'catid',
        'slug',
        'title',
        'ishome',
        'istype',
        'isorder',
        'photo',
        'summary',
        'content',
        'keyword',
        'meta',
        'pagetitle',
        'status',
        'langid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public  function categories() {
        return $this->belongsTo(Category::class, 'catid');
    }
}
