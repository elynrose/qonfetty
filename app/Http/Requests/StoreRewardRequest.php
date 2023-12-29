<?php

namespace App\Http\Requests;

use App\Models\Reward;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRewardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reward_create');
    }

    public function rules()
    {
        return [
            'photo' => [
                'array',
            ],
            'name' => [
                'string',
                'required',
            ],
            'price' => [
                'required',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'points_required' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stores_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
