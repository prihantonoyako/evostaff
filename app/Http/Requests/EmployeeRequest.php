<?php

namespace App\Http\Requests;

use App\Services\ActionService;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    private $actionService;

    public function __construct(ActionService $actionService)
    {
        $this->actionService = $actionService;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        return false;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->input('status') == "on" ? 1 : 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $action = $this->actionService->getUrlRequest();

        if($action == 'create') {
            return [
                
            ];
        }

        return [
            'first_name' => 'string|nullable|max:255',
            'last_name' => 'string|nullable',
            'department_id' => 'string|nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean'
        ];
    }
}
