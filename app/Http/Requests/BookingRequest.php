<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'slot_id'           => 'required|exists:parking_slots,id',
            'vehicle_id'        => 'required|exists:vehicles,id',
            'booking_from_time' => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:' . now()->format('Y-m-d H:i:s'),
            ],

            'booking_to_time'   => [
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:booking_from_time',
            ],
        ];
    }
}
