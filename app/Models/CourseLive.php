<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CourseLive
 * @package App\Models
 * @version May 7, 2023, 9:45 am UTC
 *
 * @property string $name
 * @property string $description
 * @property string $duree
 */
class CourseLive extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'course_lives';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'duree'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'duree' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
