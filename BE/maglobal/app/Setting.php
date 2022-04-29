<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Setting extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'setting';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'logo',
        'map',
        'video',
        'email',
        'openhour',
        'facebook',
        'twitter',
        'linkedin',
        'address',
        'phone',
        'langid',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
