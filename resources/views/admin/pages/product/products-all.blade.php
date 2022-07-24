@extends('admin.layouts.base-admin')
@section('title')
Manage your Products
@endsection
@section('subtitle')
Manage your Products
@endsection
@section('content')

<main id="main" class="main products-all">
    @include('admin.layouts.page-name')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3><i class="bi bi-inboxes-fill"></i> <span>All Products</span></h3>
                    <button id="select_all" class="btn btn-primary">Select all</button>
                    <button id="deselect_all" class="btn btn-primary d-none">Deselect all</button>
                </div>


                <div class="table-responsive mt-3">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                @if($product->type == 1)
                                <td style="width:17%;">
                                    <div class="badge rounded-pill my-bg-success mb-2">
                                        <p class="p-0 m-0">Material</p>
                                    </div>
                                    {{-- <h5>Product ID : {{$product->id}}</h5> --}}
                                    <!-- Main Image if exists -->
                                    @if($product->file_path)
                                    <div>
                                        <img class="img-fluid-all-products" src="{{asset($product->file_path)}}" alt="">
                                    </div>
                                    @else
                                    <div>
                                        <img class="img-fluid-all-products" src="{{asset('img/img-admin/no_image.jpg')}}" alt="">
                                    </div>
                                    @endif
                                    <!-- Main Image if exists -->
                                </td>
                                @elseif($product->type == 2)
                                <td>
                                    <div class="badge rounded-pill my-bg-success mb-2">
                                        <p class="p-0 m-0">Digital</p>
                                    </div>
                                    @if($product->main_image_path)
                                    <img class="img-fluid-all-products" src="{{asset($product->main_image_path)}}" alt="">
                                    @else
                                    <img class="img-fluid-all-products" src="{{asset('img/img-admin/no_image.jpg')}}" alt="">
                                    @endif
                                </td>
                                @endif
                                <td style="width:18%;">
                                    <div class="badge rounded-pill bg-primary mb-2">
                                        <p class="p-0 m-0">{{ucfirst($product->name)}}</p>
                                    </div>
                                    <div class="note">
                                        Category ➔ {{ucfirst($product->category->first()->name)}}
                                    </div>
                                </td>
                                <td style="width:15%;">
                                    @if($product->sku)
                                    <div class="text-center">
                                        <div>
                                            <i class="fas fa-barcode"></i>
                                        </div>
                                        <div>
                                            {{$product->sku}}
                                        </div>
                                    </div>
                                    @else
                                    No SKU Code
                                    @endif
                                </td>
                                <td class="quantity" style="width:15%;">
                                    @if($product->qty)
                                    <div class="alert alert-info d-flex align-items-center justify-content-center" role="alert">
                                        <div>
                                            {{$product->qty}}
                                        </div>
                                    </div>
                                    @else
                                    <div>
                                        No Quantity Yet
                                    </div>
                                    @endif
                                </td>
                                <td style="width:15%;">
                                    @if($product->selling_price)
                                    @if($product->discount_percent)
                                    <div class="alert alert-success d-flex flex-column justify-content-center align-items-center" role="alert">
                                        <div>
                                            {{PriceHelpers::selling_price_after_discount($product->discount_percent, $product->selling_price) }} Є
                                        </div>
                                        <span class="badge my-bg-success">
                                            - {{$product->discount_percent}} % discount
                                        </span>
                                    </div>
                                    @else
                                    <div class="alert alert-success d-flex flex-column justify-content-center align-items-center" role="alert">
                                        <div>
                                            {{$product->selling_price}} Є
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    <div>
                                        No Price Yet
                                    </div>
                                    @endif
                                </td>
                                <td>

                                    @if($product->type == 1)
                                    <div class="mb-2">
                                        <a href="{{route('product-material.edit', $product->id)}}" title="Edit your product" class="btn btn-primary" href="#">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    @elseif($product->type == 2)
                                    <div class="mb-2">
                                        <a href="{{route('product-digital.edit', $product->id)}}" title="Edit your product" class="btn btn-primary" href="#">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>

                                    <div class="mb-2">
                                        <a class="btn btn-success" href="{{route('product-digital.download.file', $product->id)}}" title="Download the files" class="btn">
                                            <i class="fa fa-download text-white" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="mb-2">
                                        <form title="Duplicate this Product" id="form_clone_product_{{$product->id}}" action="{{route('product.clone', $product->id)}}" method="POST">
                                            @csrf
                                            <span class="btn btn-success text-white sweet-alert-product-clone" id="clone-product_{{$product->id}}">
                                                <i class="bi bi-plus-square"></i>
                                            </span>
                                        </form>
                                    </div>
                                    <div class="mb-2">
                                        <span class="btn btn-danger delete_button delete-sweet-alert-product d-none">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </div>
                                    <div class="flex-complete">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$product->id}}">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @empty
                            <p>There is no products in Database</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Delete Multiple Product-->
<form title="Delete this Product" id="form_delete_entry" action="{{route('product.delete')}}" method="POST">
    @csrf
    <!-- INPUT HIDDEN -->
    <input type="hidden" id="delete_multiple_entries" name="delete_checkbox">
    <!-- INPUT HIDDEN -->
</form>
<!-- Delete Multiple Product-->

@endsection
