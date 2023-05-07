<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CoursePublier
 * @package App\Models
 * @version May 7, 2023, 9:46 am UTC
 *
 * @property string $nomCourse
 * @property string $description
 */
class CoursePublier extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'course_publiers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomCourse',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nomCourse' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
