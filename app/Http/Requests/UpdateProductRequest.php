<?php

namespace Ngea\Http\Requests;

use Ngea\Http\Requests\Request;
use Ngea\Models\Product;

class UpdateProductRequest extends Request
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
        return Product::$rules;
    }
}
