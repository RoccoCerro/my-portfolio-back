@extends('layouts.app')

@section('content')
<section class="create-types p-5">
  <div class="container">
    <h2 class="fs-2">Add new Type</h2>
  </div>
  <div class="container">
    <form action="{{ route('admin.types.store') }}" method="POST">

      {{-- Cross Site Request Forgering --}}
      @csrf 

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="insert name.." value="{{ old('name') }}">
      </div>

      <button class="btn btn-dark">Add Type</button>

    </form>

    @if ($errors->any())
      <p class="">
        <ul>
          @foreach ($errors->all() as $error )
          <li class="alert alert-danger">{{ $error }}</li>
          @endforeach
        </ul>
      </p>
    @endif

  </div>
</section>
@endsection