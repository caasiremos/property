<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PropertyFormRequest;

class PropertyController extends Controller
{
    const SUCCESS_CREATION = "Property successfully created.";
    const SUCCESS_UPDATED = "Property successfully updated.";
    const ERROR_CREATING = "Could not create this property, please try again.";
    const ERROR_UPDATING = "Could not update this property, please try again.";
    const SUCCESS_DELETION = "Property successfully deleted.";
    const ERROR_DELETION = "Could not delete this property.";
    /**
     * Return a list of properties
     */
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created property.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = new Property;
        $property->country   = $request->country;
        $property->county    = $request->county;
        $property->town      = $request->town;
        $property->price     = $request->price;
        $property->post_code = $request->post_code;
        $property->bedroom_number  = $request->bedroom_number;
        $property->bathroom_number = $request->bathroom_number;
        $property->property_type   = $request->property_type;
        $property->description     = $request->description;
        $property->property_status = $request->property_status;
        $property->displayable_address = $request->displayable_address;
        if ($request->hasFile('image')) {
            $image_path = 'property_images/';
            if (!file_exists(public_path($image_path))) { //Verify if the directory exists
                mkdir(public_path($image_path), 666, true); //create it if do not exists
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = $image_path . $filename;
            Image::make($image)->resize(468, 249)->save($location);
            $property->image = $filename;
        }
        if ($property->save()) {
            flash(self::SUCCESS_CREATION)->success();
            return redirect()->route('properties.index');
        }else{
            flash(self::ERROR_CREATING)->error();
            return back();
        }
    }

    /**
     * Display the a single property.
     * @param  int  $id
     */
    public function show(Property $property)
    {
        //related property(could be constrained by property type of any field of choice
        //) for now we are just returning properties randomly without constriants
        $properties = Property::inRandomOrder()->limit(3)->get();
        return view('properties.show', compact('property', 'properties'));
    }

    /**
     * Show the form for editing the single property
     * @param  int  $id
     */
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     * @param  $request object
     * @param  int  $id
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->country   = $request->country;
        $property->county    = $request->county;
        $property->town      = $request->town;
        $property->price     = $request->price;
        $property->post_code = $request->post_code;
        $property->bedroom_number  = $request->bedroom_number;
        $property->bathroom_number = $request->bathroom_number;
        $property->property_type   = $request->property_type;
        $property->description     = $request->description;
        $property->property_status = $request->property_status;
        $property->displayable_address = $request->displayable_address;
        if ($request->hasFile('image')) {
            $image_path = 'property_images/';
            if (!file_exists(public_path($image_path))) { //Verify if the directory exists
                mkdir(public_path($image_path), 666, true); //create it if do not exists
            }
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension(); // get the image extention
            $location = $image_path . $filename;
            Image::make($image)->resize(468, 249)->save($location); //resise the image and save it
            $property->image = $filename;
        }

        if ($property->save()) {
            flash(self::SUCCESS_UPDATED)->success();
            return redirect()->route('properties.index');
        }else{
           flash(self::ERROR_UPDATING)->error();
            return back();
        }
    }

    /**
     * Remove the a single property from database.
     *
     * @param  int  $id
     */
    public function destroy(Property $property)
    {
        if ($property->delete()) {
            flash(self::SUCCESS_DELETION)->success();
            return redirect()->route('properties.index');
        }else{
            flash(self::ERROR_DELETION)->error();
            return back();
        }
    }
}
