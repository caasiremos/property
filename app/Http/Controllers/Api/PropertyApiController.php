<?php

namespace App\Http\Controllers\Api;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\ExternalDataApi;

class PropertyApiController extends Controller
{
    /**
     * Fetch the property listing from external source and persist it
     * in the database
     * @return [type] [description]
     */
    public function fetchPropertyListing(){
        //get response from exteranl datasource
        $property_response = ExternalDataApi::fetchPropertyListing(2, 100);
        //formate the json to array in the form
        //{'['data' => 'data_values'], ['links' => 'link_values'], ['meta' => 'meta_values']}
        $formate_response = json_decode($property_response);
        //extract the property arrays from the formated response
        $properties = $formate_response['data'];
        //loop through the properties and save it to database
        $prop = new Property(); // instantiate from outside the loop to avoid multiple objects in the loop
        foreach ($properties as $key => $property) {
            $prop->country   = $property['country'];
            $prop->county    = $property['county'];
            $prop->town      = $property['town'];
            $prop->price     = $property['price'];
            $prop->post_code = $property['post_code'];
            $prop->bedroom_number  = $property['bedroom_number'];
            $prop->bathroom_number = $property['bathroom_number'];
            $prop->property_type   = $property['prop_type'];
            $prop->description     = $property['description'];
            $prop->property_status = $property['prop_status'];
            $prop->displayable_address = $property['displayable_address'];
            $prop->latitude = $property['latitude'];
            $prop->longitude = $property['longitude'];
            $prop->full_detail_url = $property['full_detail_url'];
            $prop->image_url = $property['image_url'];
            $prop->save();
        }
    }
}
