<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'registration_number' => 'required|regex:/^(BP|BG|BT|CD|DPR|G|RBP)-[1-9]-[A-Z]\d{1,4}$/',
            'owner_id'            => 'sometimes|exists:users,id',
            'driver_id'           => 'sometimes|exists:users,id',
            // 'model_id'=>''
        ];
    }
}
