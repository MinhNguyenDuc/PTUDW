<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfile extends FormRequest
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
            'studentID' => 'numeric',
            'name' => 'min:5',
            'email' => 'email',
            'phone' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
            'studentID.numeric' => 'Mã số sinh viên chỉ được bao gồm các số',
            'name.min' => 'Tên quá ngắn, vui lòng nhập tên ít nhất 5 kí tự',
            'email.email' => 'Email không đúng định dạng',
            //'email.unique' => 'Email đã được sử dụng, vui lòng chọn email khác',
            'phone.numeric' => 'Số điện thoại chỉ bao gồm các số'
        ];
    }
}
