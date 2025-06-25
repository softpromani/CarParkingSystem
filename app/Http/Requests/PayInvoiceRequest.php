<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayInvoiceRequest extends FormRequest
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
            'invoice_id'     => 'required|integer|exists:booking_invoices,id',
            'payment_mode'   => 'required|in:wallet,offline,online',
            'amount'         => 'sometimes',
            'transaction_no' => 'sometimes',
        ];
    }
}
