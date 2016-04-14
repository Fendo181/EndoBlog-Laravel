<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //認証の仕組み
    public function authorize()
    {
        //return false;
        
        return true;
        
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //認証の仕組み
    public function rules()
    {
        return [
            //
            'title' => 'required|min:3',
            'body' => 'required'
        ];
        
    }
}
