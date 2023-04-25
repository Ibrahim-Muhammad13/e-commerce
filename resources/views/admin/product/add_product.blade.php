@extends('layouts.admin_content')


@section('content')
<div class="text-center">add product</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (\Session::has('success'))
    <div class="alert alert-success">
    {!! \Session::get('success') !!}
    </div>
@endif
<form method="POST" enctype="multipart/form-data" action="{{route('product.store')}}">
    @csrf
    <div class="form-row">
      <div class="col">
        <label for="title"> title</label>
        <input type="text" value="{{old('title')}}" name="title" class="form-control text-white" placeholder="product title" name="" id="title">
      </div>
      <div class="col">
        <label for="desc">product description</label>
        <input type="text"  value="{{old('desc')}}" name="desc" class="form-control text-white" placeholder="product description" id="desc">
      </div>
    </div>
    <div class="form-row">
        <div class="col">
          <label for="img"> image</label>
          <input type="file" name="img" class="form-control text-white" placeholder="product img" id="img">
        </div>
        <div class="col">
          <label for="category">category</label>
          {{-- <input type="text"  name="category" class="form-control text-white" placeholder="product category" id="category"> --}}
            <select name="category" id="" class="form-control text-white">
                <option value="" disabled="disabled" selected="selected">select category</option>
               @foreach ($category as $name)
                   <option value="{{$name->category_name}}">{{$name->category_name}}</option>
               @endforeach
            </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="quantity"> quantity</label>
          <input type="number" name="quantity" class="form-control text-white" placeholder="product quantity" id="quantity">
        </div>
        <div class="col">
          <label for="price">product price</label>
          <input type="number"  name="price" class="form-control text-white" placeholder="product price" id="price">
        </div>
      </div>
      <input type="submit" value="submit" class="btn btn-primary mt-3">
  </form>
@endsection