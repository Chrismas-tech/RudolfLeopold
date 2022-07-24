@extends('admin.layouts.base-admin')
@section('title')
Create your Material Product
@endsection
@section('subtitle')
Create your Material Product
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid">

        @yield('subtitle')

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Create a Product</h4>

                        <form action="{{route('product-digital.store')}}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            @if((Session::get('form_1')))
                            <div class="mb-4">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger p-2" role="alert">
                                    <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-group row margin-select-admin">
                                <label class="col-md-12 mt-3 px-0">Select a Category for your Product <span class="text-danger">*</span></label>
                                <div class="col-md-12 m-0 p-0">
                                    <select name="cat_id" id="select" style="width:100%;">
                                        @foreach($categories as $category)
                                        <option class="{{$category->parent_id == null ? 'my-bg-success text-white' : 'select-color'}}" {{($category->id == old('cat_id') ? 'selected' : '')}} value="{{$category->id}}">
                                            {{$category->name}}
                                            --
                                            @if($category->parent_id == null)
                                            (Main Category)
                                            @else
                                            N°{{$category->id}}
                                            @endif
                                        </option>
                                        @endforeach
                                        {{-- <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup> --}}
                                    </select>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  >Product Name<span class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'my-is-invalid' : ''}}" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  >Product Code <span class="text-danger">(Optional)</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="product_code" class="form-control {{ $errors->has('product_code') ? 'my-is-invalid' : ''}}" value="{{old('product_code')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cono1" >Product Selling Price<span class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'my-is-invalid' : ''}}" value="{{old('price')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cono1" >Product Discount <span class="text-danger">(Optional)</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="discount_percent" class="form-control {{ $errors->has('discount_percent') ? 'my-is-invalid' : ''}}" value="{{old('discount_percent')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group mx-2 row my-tags-input {{ $errors->has('product_tags') ? 'my-is-invalid p-1' : ''}}">
                                        <label for="cono1" >Product Tags <span class="text-danger">*</span></label>
                                        <input type="text" data-role="tagsinput" name="product_tags" class="form-control" value="{{old('product_tags') ? old('product_tags') : ''}}">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- editor -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body {{ $errors->has('long_description') ? 'my-is-invalid' : ''}}">
                        <h4 class="card-title">Long Description <span class="text-danger">*</span></h4>
                        <!-- Create the editor container -->
                        <textarea id="editor1" name="long_description" id="" cols="30" rows="10" value="">{{old('long_description') ? old('long_description') : ''}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body {{ $errors->has('short_description') ? 'my-is-invalid' : ''}}">
                        <h4 class="card-title">Short Description <span class="text-danger">*</span></h4>
                        <!-- Create the editor container -->
                        <textarea id="editor2" name="short_description" id="" cols="30" rows="10" value="">{{old('short_description') ? old('short_description') : ''}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- editor -->

        <!-- Digital Files -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products Digital Files Upload <span class="text-danger">*</span></h4>
                <p class="card-title">Here you must upload some files to sell on your website.</p>
                <p class="card-title">All the files will be compress into a Rar file ready to download by the client.</p>
                <div class="divider"></div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label>Multiple Digital Files Upload</label>
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" id="multiDigital" name="multi_digital_files[]" class="form-control  {{ $errors->has('multi_digital_files') ? 'my-is-invalid' : ''}}" multiple accept=".zip,.rar,.7zip,audio/*,video/*,image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Digital Files -->


        <!-- Images -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products Images Upload <span class="text-danger">(Optional)</span></h4>
                <p class="card-title">Here you can upload a main image and a collection of images to illustrate your product.</p>
                <p class="card-title">Upload square dimensions format photos to optimize the rendering (800x800, 1000x1000, etc...).</p>
                <p class="card-title">If no images are uploaded, a default image will be generated for your digital product.</p>
                <div class="divider"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Main Image Upload</label>
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" id="mainImg" name="main_image_path" class="form-control  {{ $errors->has('main_image_path') ? 'my-is-invalid' : ''}}" onchange="FetchThumbnail(this)" accept="image/*">
                                </div>

                                <div class="div-img d-none text-center">
                                    <h5 id="title_preview_img" class="mt-3"></h5>
                                    <div class="div-img-main">
                                        <img id="preview_main_image" src="" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label>Multiple Images Upload</label>
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" name="multi_images_files[]" id="multiImg" class="form-control  {{ $errors->has('multi_images_files') ? 'my-is-invalid' : ''}}" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 id="title_preview_multi_images"></h5>
                            <div class="d-flex flex-wrap" id="preview_multi_images">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Images -->

        @include('admin.pages.product.product-digital.product-add-checkboxes')


        <div class="card-body d-flex justify-content-center">
            <button type="submit" id="submit-upload" class="btn btn-lg btn-primary">
                Add this Product
            </button>
        </div>
    </div>
</main>
@endsection
