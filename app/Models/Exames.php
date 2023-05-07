<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Exames
 * @package App\Models
 * @version May 7, 2023, 9:44 am UTC
 *
 * @property string $question
 * @property string $repanse
 */
class Exames extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'exames';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'question',
        'repanse'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'question' => 'string',
        'repanse' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question' => 'required',
        'repanse' => 'required'
    ];

    
}
