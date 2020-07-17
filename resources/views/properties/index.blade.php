@extends('layouts.app')
@section('title', 'All Properties')
@section('content')
<main role="main" style="background: #00B7AF;">
  <section class="jumbotron text-center" style="background: #00B7AF;">
    <div class="container">
      <h1 style="color: white; font-weight: 800;">Property market place</h1>
      <p class="lead mt-1" style="color: white;">Find all your dream properties in one place. Contact seller to book and buy the property of your choice</p>
      <p>
        <a href="{{ route('properties.create')}}" class="btn btn-warning" style="font-weight: 700; font-size: 1.2rem;">Add your property to market place</a>
      </p>
    </div>
  </section>
  <div class="album" style="background: #00B7AF;">
    <div class="container">
        @include('flash::message')
      <div class="row">
        @foreach($properties as $property)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="{{ 'property_images/'.$property->image }}" style="height: 230px;" width="100%" />
            <div class="card-body">
                <h4><strong>{{ number_format($property->price)}} Ugx</strong></h4>
              <p class="card-text text-muted"><strong>{{ Str::limit($property->description, 200)}}</strong></p>
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
</main>
@endsection

