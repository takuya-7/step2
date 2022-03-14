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
            'estimated_achievement_day' => 'nullable|integer',
            'estimated_achievement_hour' => 'nullable|integer',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'child-step1-title' => 'required|string',
            'child-step2-title' => 'required_with:child-step3-title,child-step4-title,child-step5-title,child-step6-title,child-step7-title,child-step8-title,child-step9-title,child-step10-title,child-step2-description|nullable|string',
            'child-step3-title' => 'required_with:child-step4-title,child-step5-title,child-step6-title,child-step7-title,child-step8-title,child-step9-title,child-step10-title,child-step3-description|nullable|string',
            'child-step4-title' => 'required_with:child-step5-title,child-step6-title,child-step7-title,child-step8-title,child-step9-title,child-step10-title,child-step4-description|nullable|string',
            'child-step5-title' => 'required_with:child-step6-title,child-step7-title,child-step8-title,child-step9-title,child-step10-title,child-step5-description|nullable|string',
            'child-step6-title' => 'required_with:child-step7-title,child-step8-title,child-step9-title,child-step10-title,child-step6-description|nullable|string',
            'child-step7-title' => 'required_with:child-step8-title,child-step9-title,child-step10-title,child-step7-description|nullable|string',
            'child-step8-title' => 'required_with:child-step9-title,child-step10-title,child-step8-description|nullable|string',
            'child-step9-title' => 'required_with:child-step10-title,child-step9-description|nullable|string',
            'child-step10-title' => 'required_with:child-step10-description|nullable|string',
            'child-step1-description' => 'required|string',
            'child-step2-description' => 'required_with:child-step2-title|nullable|string',
            'child-step3-description' => 'required_with:child-step3-title|nullable|string',
            'child-step4-description' => 'required_with:child-step4-title|nullable|string',
            'child-step5-description' => 'required_with:child-step5-title|nullable|string',
            'child-step6-description' => 'required_with:child-step6-title|nullable|string',
            'child-step7-description' => 'required_with:child-step7-title|nullable|string',
            'child-step8-description' => 'required_with:child-step8-title|nullable|string',
            'child-step9-description' => 'required_with:child-step9-title|nullable|string',
            'child-step10-description' => 'required_with:child-step10-title|nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'child-step2-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step3-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step4-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step5-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step6-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step7-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step8-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step9-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step10-title.required_with' => '入力が必要です（順番を飛ばして入力できません）',
            'child-step2-description.required_with' => '入力が必要です',
            'child-step3-description.required_with' => '入力が必要です',
            'child-step4-description.required_with' => '入力が必要です',
            'child-step5-description.required_with' => '入力が必要です',
            'child-step6-description.required_with' => '入力が必要です',
            'child-step7-description.required_with' => '入力が必要です',
            'child-step8-description.required_with' => '入力が必要です',
            'child-step9-description.required_with' => '入力が必要です',
            'child-step10-description.required_with' => '入力が必要です',
        ];
    }
}
