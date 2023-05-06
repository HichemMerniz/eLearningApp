<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Quiz
 * @package App\Models
 * @version May 1, 2023, 1:51 pm UTC
 *
 * @property string $question
 * @property string $repance
 */
class Quiz extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'quizzes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'question',
        'repance'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string',
        'repance' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
