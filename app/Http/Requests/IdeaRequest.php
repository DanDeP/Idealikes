<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IdeaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *You can add logic so only the right people can edit something.
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
            'ideaname'=>'required',
            'idea'=>'required'
        ];
    }
}
