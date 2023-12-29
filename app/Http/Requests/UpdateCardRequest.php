<?php

namespace App\Http\Requests;

use App\Models\Card;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('card_edit');
    }

    public function rules()
    {
        return [
            'card_batch_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'required',
                'unique:cards,code,' . request()->route('card')->id,
            ],
        ];
    }
}
