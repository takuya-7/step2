<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'category_id' => 'required|integer',
            'child_step_title.*' => 'required|string|max:255',
            'child_step_description.*' => 'required|string|max:10000',
            'child_step_estimated_achievement_day.*' => 'required|integer',
            'child_step_estimated_achievement_hour.*' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
