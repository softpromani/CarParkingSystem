<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkInOutRequest extends FormRequest
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
            'parking_id' => 'required|integer|exists:parkings,id',
            'booking_id' => 'required|integer|exists:bookings,id',
            'user_by'    => 'required|in:owner,guard,admin',
        ];
    }
}
