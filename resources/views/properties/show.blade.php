@extends('layouts.app')
@section('title', 'Property details')
@section('content')
<div>
    <div class="container">
         <a href="{{ route('properties.index')}}" class="btn btn-sm btn-warning mt-5">Lets go back home</a>
        <div class="row">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-body">
                         <img src="{{ '/property_images/'.$property->image }}" style="height: 230px;" width="100%" />
                          <p class="text text-muted mt-3"><strong>{{ $property->description }}</strong> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mt-5">
                    <div class="card-body">
                         <p class="text text-muted"><strong>Country:</strong> {{ $property->country }}</p>
                         <p class="text text-muted"><strong>County:</strong> {{ $property->county}}</p>
                         <p class="text text-muted"><strong>Town:</strong> {{ $property->town }}</p>
                         <p class="text text-muted"><strong>Type:</strong> {{ $property->property_type }}</p>
                         <p class="text text-muted"><strong>Bedrooms:</strong> {{ $property->bedroom_number }}</p>
                         <p class="text text-muted"><strong>Bathrooms:</strong> {{ $property->bathroom_number}}</p>
                         <p class="text text-muted"><strong>Price:</strong> {{ $property->price }} UGX</p>
                         <p class="text text-muted"><strong>Address:</strong> {{ $property->displayable_address }}</p>
                         <p class="text text-muted"><strong>Status:</strong> {{ $property->property_status }}</p>
                         <p class="text text-muted"><strong>Listed on:</strong> {{ $property->created_at }}</p>
                         <form action="{{ route('properties.destroy', $property->id)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger mt-2" style="width: 100%">Delete this property</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
        <h3 style="color: white; font-weight: 800;" class="mt-5">You may also like</h3>
        <div class="row mt-3">
        @foreach($properties as $property)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{ '/property_images/'.$property->image }}" style="height: 230px;" width="100%" />
            <div class="card-body">
              <p class="card-text text-muted">{{ Str::limit($property->description, 200)}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{ route('properties.show', $property->id)}}" class="btn btn-sm btn-outline-success">View</a>
                  <a href="{{ route('properties.edit', $property->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                </div>
                <small class="text-muted">{{ $property->created_at->diffForHumans() }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</div>
@endsection