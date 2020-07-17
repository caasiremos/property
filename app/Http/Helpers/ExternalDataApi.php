<?php
namespace App\Http\Helpers;

use GuzzleHttp\Client;

class ExternalDataApi
{
    const PROPERTY_LIST_URL = "http://trialapi.craig.mtcdevserver.com/api/properties";

    /**
     * fetch property listing from an external datasource 
     * @param  [type] $number [description]
     * @param  [type] $size   [description]
     * @return [type]         [description]
     */
    public static function fetchPropertyListing($number, $size){
        $client = new Client();
        $response = $client->request(
            'GET', 
            self::PROPERTY_LIST_URL, 
            [
                'page' => $number,  //the api docs have the same key name for both number and size, this could cause problems
                'page' => $size,
                'api_key' => env('API_KEY'),
            ]
        );
       return $response->getBody();
    }

    //since the data source provided is not working(returning error of 504 Gateway timeout),
    // am assuming the following response structure base on the api documentation
    /**
     *  {
            "data": [
                {
                    "id": 1,
                    "coutnry": "Uganda",
                    "county": "kampala",
                    "town": "kampala",
                    "description": "Lorem ipsum text...",
                    "full_detail_url": "http://trialapi.craig.mtcdevserver.com/3/detail"
                    "displayable_address": "kampala city",
                    "image_url": "http://butali.test/category_images/1591279686.png"
                    "latitude": 1023029.39,
                    "longitude": 36.894983,
                    "bedroom_number": 2,
                    "bathroom_number": 3,
                    "price": 3000000,
                    "property_type": mansion,
                    "for_sale/for_rent": for rent,
                }
            ],
            "links": {
                "first": "http://trialapi.craig.mtcdevserver.com?page=1",
                "last": "http://trialapi.craig.mtcdevserver.com?page=11",
                "prev": null,
                "next": "http://trialapi.craig.mtcdevserver.com?page=2"
            },
            "meta": {
                "current_page": 1,
                "from": 1,
                "last_page": 11,
                "path": "hhttp://trialapi.craig.mtcdevserver.com",
                "per_page": 10,
                "to": 10,
                "total": 105
            }
        }
     */
}