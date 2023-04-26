@extends('layouts.admin_content')

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
    {!! \Session::get('success') !!}
    </div>
@endif
<div class="text-center">All products</div>
<div class="row">
                            <div class="col-12 grid-margin">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">categories</h4>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th> title </th>
                                          <th> desc </th>
                                          <th> image </th>
                                          <th>category</th>
                                          <th>quantity</th>
                                          <th>price</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td> {{$product->title}} </td>
                                            <td> {{$product->description}} </td>
                                            <td> <img src="{{asset('product_img/'.$product->image.'')}}" alt=""> </td>
                                            <td> {{$product->category}} </td>
                                            <td> {{$product->quantity}} </td>
                                            <td> {{$product->price}} </td>
                                            <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-warning">Edit</a> </td>
                                            <td><form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                           </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
@endsection