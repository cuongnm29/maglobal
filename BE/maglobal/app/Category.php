<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'category';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
        'ismenu',
        'title',
        'description',
        'istype',
        'isorder',
        'photo',
        'status',
        'langid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function parent()
    {
        return $this->belongsTo('App\Category', 'id', 'parent_id'); // I believe you can use also hasOne().
    }
    
    public function child()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }
    public static function tree() {
        return static::where('parent_id', '=', 0)->get(); // or based on you question 0?
    }
    public static function treeNews() {
        return static::where('parent_id', '=', 0)->where('istype','!=',4)->get(); // or based on you question 0?
    }
    
}
