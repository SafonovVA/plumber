<?php

namespace App\Http\Requests\Voyager;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property string $name
 * @property array $abilities
 */
class VoyagerCreateTokenRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['name' => "string", 'abilities' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'abilities' => 'array|nullable'
        ];
    }

    protected function getValidatorInstance(): Validator
    {
        return parent::getValidatorInstance()->after([$this, 'after']);
    }

    public function after(Validator $validator): void
    {
        if ($validator->failed()) {
            foreach ($validator->errors()->messages() as $error) {
                $this->session()->flash('message', $error);
                $this->session()->flash('alert-type', 'error');
            }
        }
    }
}
