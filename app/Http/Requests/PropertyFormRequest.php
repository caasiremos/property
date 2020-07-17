<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
        return (new Property)->rules();
    }

    // customise the validation message for better reporting
    public function messages(){
        return [
            'country.required' => 'Please provide country name',
            'county.required' => 'Please provide county name',
            'town.required' => 'Please provide town name',
            'post_code.required' => 'Please provide postal code',
            'displayable_address.required' => 'Please provide displayable address',
            'bedroom_number.required' => 'Please provide bedroom number',
            'bathroom_number.required' => 'Please provide bathroom number',
            'property_type.required' => 'Please provide property type',
            'price.required' => 'Please provide price',
            'description.required' => 'Please provide property description',
        ];
    }
}
