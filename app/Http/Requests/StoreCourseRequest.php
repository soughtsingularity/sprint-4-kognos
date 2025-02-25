<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreCourseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => ['required','json'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function($validator){
            $chapters = json_encode($this->content, true);

            if(!is_array($chapters) || count($chapters) < 1){
                $validator->errors()->add('content', 'El curso debe contener al menos un capítulo');
            }
        });
    }
}
