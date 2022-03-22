<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAndUpdateTaskRequest extends FormRequest
{    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {   
        return [            
            "title" => ["string", "required", "min:4", "max:100"],
            "body" => ["string", "required", "min:4", "max:500"]            
        ];
    }
}
