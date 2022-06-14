<?php

namespace Users\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\GeneralTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    use GeneralTrait;

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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors= $this->returnValidationError($validator->errors());
        throw new ValidationException( $validator, $errors);

    }
}
