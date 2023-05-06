<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Courses
 * @package App\Models
 * @version May 1, 2023, 1:33 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property string|\Carbon\Carbon $date
 */
class Courses extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'courses';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
//        'date' => 'required'
    ];


}
