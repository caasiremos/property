<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'country', 'county', 'town', 'description', 'full_detail_url', 'image_url',
        'thumnail_url', 'displayable_address', 'latitude', 'longitude', 'price',
        'bedroom_number', 'bathroom_number', 'property_type', 'property_status'
    ];

    // validation rules
    public function rules()
    {
        return [
            'country' => 'required',
            'county' => 'required',
            'town' => 'required',
            'post_code' => 'required',
            'displayable_address' => 'required',
            'bedroom_number' => 'required',
            'bathroom_number' => 'required',
            'property_type' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];
    }
}
