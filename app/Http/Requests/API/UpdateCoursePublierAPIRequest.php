<?php

namespace App\Http\Requests\API;

use App\Models\CoursePublier;
use InfyOm\Generator\Request\APIRequest;

class UpdateCoursePublierAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = CoursePublier::$rules;
        
        return $rules;
    }
}
