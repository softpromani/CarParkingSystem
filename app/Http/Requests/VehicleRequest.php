<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        // For PUT or PATCH, get the vehicle ID from route model binding or fallback
        $vehicleId = $this->route('vehicle')?->id ?? $this->id;

        // Base rules
        $rules = [
            'registration_number' => [
                'required',
                'regex:/^((BP|BG|BT|CD|DPR|G|RBP)-[1-9]-([A-Z])?\d{1,4}|[A-Z]{2}\d{1,2}[A-Z]{1,2}\d{4}|[0-9]{2}[A-Z] ?\d{6}[A-Z]?)$/',
                Rule::unique('vehicles', 'registration_number')->ignore($vehicleId),
            ],
            'driver_id'           => 'sometimes|exists:users,id',
            'model_id'            => 'nullable|integer|exists:brand_models,id|required_without:model_name',
            'model_name'          => 'nullable|string|required_without:model_id',
            'brand_id'            => 'nullable|integer|exists:brands,id|required_without:brand_name',
            'brand_name'          => 'nullable|string|required_without:brand_id',
            'color'               => 'sometimes|string',
            'tyre'                => 'required|integer',
            'type'                => 'required|in:car,bike,heavy-vehicle',
        ];

        // Make fields optional if PATCH (partial update)
        if ($this->isMethod('patch')) {
            foreach ($rules as $field => &$rule) {
                if (is_string($rule)) {
                    $rule = 'sometimes|' . $rule;
                } elseif (is_array($rule)) {
                    array_unshift($rule, 'sometimes');
                }
            }
        }

        return $rules;
    }
}
