<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            "item"=>"required",
            "category_id"=>"required",
            "description"=>"required",
            "price"=>"required | numeric",
            "condition"=>"required",
            "type"=>"required",
            // "publish"=>"required",
            'img'=>"mimes:jpg,jpeg,png|max:200000",
            "owner"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "lat"=>"required",
            "lng" => "required",

        ];
    }
}
