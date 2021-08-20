@extends('layouts.admin')
@section('content')
@include('sweetalert::alert')
<h1 class="mt-4">{{__('custom.list_products')}}</h1>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('custom.Category')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach($OBJ_Categorys as $OBJ_Category)
                        <a class="dropdown-item" href="{{route('show_product_by_category',['id'=>$OBJ_Category->id ])}}">{{$OBJ_Category->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <a href="{{route('export_product')}}" class="btn btn-success">{{__('custom.Export Excel')}} <i class="fas fa-file-excel"></i></a>
                <form id="import_product_excel" method="POST"  action="{{route('import_product')}}" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="file" name="file" placeholder="Choose file">
                                </div>
                                @error('file')
                                    <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success" id="submit">{{__('custom.Import Excel')}} <i class="fas fa-file-excel"></i></button>
                            </div>
                        </div>
                 </form>
            </div>
            <div class="col-md-2">
                <a href="{{route('product.create')}}" class="btn btn-primary" id="btn_add_product">{{__('custom.add_product')}} <i class="fa fa-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('custom.Number In Order')}}</th>
                        <th>{{__('custom.ID Product')}}</th>
                        <th>{{__('custom.Product Name')}}</th>
                        <th>{{__('custom.Image')}}</th>
                        <th>{{__('custom.Category')}}</th>
                        <th>{{__('custom.Amount Of')}}</th>
                        <th>{{__('custom.Price')}}</th>
                        <th>{{__('custom.Status')}}</th>
                        <th>{{__('custom.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($OBJ_Products as $OBJ_Product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$OBJ_Product->id_product}}</td>
                            <td>{{$OBJ_Product->name_product}}</td>
                            <td>
                                <img src="{{asset('/storage/products')}}/{{$OBJ_Product->image}}" id="img_product">
                            </td>
                            <td>{{$OBJ_Product->name_category}}</td>
                            <td>{{$OBJ_Product->amount_of}}</td>
                            <td>{{ formatPrice($OBJ_Product->price) }}</td>
                            <td>
                                @if($OBJ_Product->status_product == 1)
                                    <p class="text-primary">{{__('custom.Show')}}</p>
                                @else
                                    <p class="text-danger">{{__('custom.Hidden')}}</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('product.edit',$OBJ_Product->id_product)}}" class="btn btn-primary">
                                    <i class="fa fa-edit "></i>
                                </a>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteProduct">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                                <form action="{{ route('product.destroy',$OBJ_Product->id_product) }}" method="post" id="delete">
                                @csrf
                                @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('includes.admin.product.modal-delete')
@endsection