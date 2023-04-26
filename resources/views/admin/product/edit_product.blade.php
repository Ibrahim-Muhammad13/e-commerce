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
<form method="POST" enctype="multipart/form-data" action="{{route('product.update',$product->id)}}">
    @csrf 
    @method('PUT')
    <div class="form-row">
      <div class="col">
        <label for="title"> title</label>
        <input type="text" value="{{old('title',$product->title)}}" name="title" class="form-control text-white" placeholder="product title" name="" id="title">
      </div>
      <div class="col">
        <label for="desc">product description</label>
        <input type="text"  value="{{old('desc',$product->description)}}" name="desc" class="form-control text-white" placeholder="product description" id="desc">
      </div>
    </div>
    <div>
        <img src="{{ asset('product_img/'.$product->image.'') }}" alt="{{ $product->name }}" style="max-width: 100px">
       </div>
    <div class="form-row">

        <div class="col">
          <label for="img"> image</label>
          <input type="file" name="img"  class="form-control text-white" placeholder="product img" id="img">
        </div>
        <div class="col">
          <label for="category">category</label>
          {{-- <input type="text"  name="category" class="form-control text-white" placeholder="product category" id="category"> --}}
            <select name="category" id="" class="form-control text-white">
                {{-- <option value="{{old('category',$product->category)}}" selected="selected">{{$product->category}}</option> --}}
               @foreach ($category as $name)
                    @if($name->category_name == $product->category)
                     <option value="{{$name->category_name}}" selected="selected">{{$name->category_name}}</option>
                    @else
                   <option value="{{$name->category_name}}">{{$name->category_name}}</option>
                   @endif
               @endforeach
            </select>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <label for="quantity"> quantity</label>
          <input type="number" value="{{old('quantity',$product->quantity)}}" name="quantity" class="form-control text-white" placeholder="product quantity" id="quantity">
        </div>
        <div class="col">
          <label for="price">product price</label>
          <input type="number" value="{{old('price',$product->price)}}" name="price" class="form-control text-white" placeholder="product price" id="price">
        </div>
      </div>
      <input type="submit" value="submit" class="btn btn-primary mt-3">
  </form>
@endsection