@extends('layouts.app')
@section('title', 'New Property')
@section('content')
    <h3 class="text text-center mt-5" style="color: white; font-weight: 700;">Create your dream property listing for free.</h3>
    <a href="{{ route('properties.index')}}" class="btn btn-sm btn-warning mt-5" style="margin-left: 525px;">Lets go back home</a>
    <div class="card mx-auto mt-5" style="width: 800px;">
        <div class="card-body">
            <form action="{{ route('properties.store')}}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : ''}}" id="country" name="country">
                         @if ($errors->has('country'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="county">County</label>
                        <input type="text" class="form-control {{ $errors->has('county') ? ' is-invalid' : ''}}" id="county" name="county">
                        @if ($errors->has('county'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('county') }}</strong>
                            </span>
                        @endif
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="town">Town</label>
                            <input type="text" class="form-control {{ $errors->has('town') ? ' is-invalid' : ''}}" id="town" name="town">
                            @if ($errors->has('town'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('town') }}</strong>
                                </span>
                            @endif
                        </div> 
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="post_code">Post Code</label>
                            <input type="text" class="form-control {{ $errors->has('post_code') ? ' is-invalid' : ''}}" id="post_code" name="post_code">
                             @if ($errors->has('post_code'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('post_code') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
              <div class="form-group">
                <label for="displayable_address">Displayable Address</label>
                <input type="text" class="form-control {{ $errors->has('displayable_address') ? ' is-invalid' : ''}}" id="displayable_address"
                        name="displayable_address">
                 @if ($errors->has('displayable_address'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('displayable_address') }}</strong>
                    </span>
                @endif
              </div>   
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                        <label for="bedroom_number">Number of bedrooms</label>
                        <select type="text" class="form-control" id="bedroom_number" name="bedroom_number">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                      </div> 
                  </div>
                  <div class="col">
                      <div class="form-group">
                        <label for="bathroom_number">Number of bathrooms</label>
                        <select class="form-control" id="bathroom_number" name="bathroom_number">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control {{ $errors->has('price') ? ' is-invalid' : ''}}" id="price" name="price">
                 @if ($errors->has('price'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
              </div> 
              <div class="form-group">
                <label for="image">Property Image</label>
                <input type="file" class="form-control {{ $errors->has('image') ? ' is-invalid' : ''}}" id="image" name="image">
                 @if ($errors->has('image'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
              </div> 
              <div class="form-group">
                <label for="property_type">Property type</label>
                <select type="property_type" class="form-control" id="property_type" name="property_type">
                    <option>Bangola</option>
                    <option>Apartment</option>
                    <option>Mansion</option>
                    <option>Hotel</option>
                </select>
              </div> 
              <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : ''}}" rows="3" name="description"></textarea>
                    @if ($errors->has('description'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
              </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="property_status" checked="true" id="inlineRadio1" value="Sale">
                  <label class="form-check-label" for="property_status">For Sale</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="property_status" id="inlineRadio2" value="Rent">
                  <label class="form-check-label" for="property_status">For Rent</label>
                </div>
              <button type="submit" class="btn btn-secondary mt-2" style="width: 100%">Create new property</button>
            </form>
        </div>
    </div>
@endsection