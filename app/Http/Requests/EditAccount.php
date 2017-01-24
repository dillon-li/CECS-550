<?php

namespace CECS550\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

use CECS550\User;

class EditAccount extends FormRequest
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
      $user = Auth::user();
        return [
          'name' => 'required',
          'username' => 'required|unique:users,username,'.$user->id,
          'email' => 'required|unique:users,email,'.$user->id,
        ];
    }
}
