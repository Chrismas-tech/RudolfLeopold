@extends('admin.layouts.base-admin')
@section('title')
Edit your Material Product
@endsection
@section('subtitle')
<div class="d-flex align-items-center mb-4">
    <h4 class="p-0 m-0 card-title">Edit your Digital Product</h4>
    <i class="ms-2 me-2 fas fa-angle-right"></i>
    <h4 class="p-0 m-0 card-title"><a class="my-orange" href="{{route('products.all')}}">Return to All Products List</a></h4>
</div>
@endsection
@section('content')
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    @include('admin.layouts.page-name')
    <div class="container-fluid">
        @yield('subtitle')

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Edit your Product</h4>

                        <form action="{{route('product-digital.update', $product->id)}}"  method="POST" enctype="multipart/form-data" >
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
                                        <option {{$category->id == $product->category_id ? 'selected' : ''}} class="{{$category->parent_id == null ? 'my-bg-success text-white' : 'bg-dark text-white'}}" value="{{$category->id}}">
                                            {{$category->name}}
                                            -
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
                                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'my-is-invalid' : ''}}" value="{{$product->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  >Product Code <span class="text-danger">(Optional)</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="product_code" class="form-control {{ $errors->has('product_code') ? 'my-is-invalid' : ''}}" value="{{$product->product_code}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cono1" >Product Selling Price<span class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="price" class="form-control {{ $errors->has('price') ? 'my-is-invalid' : ''}}" value="{{Helpers::selling_price($product->price)}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cono1" >Product Discount <span class="text-danger">(Optional)</span></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="discount_percent" class="form-control {{ $errors->has('discount_percent') ? 'my-is-invalid' : ''}}" value="{{Helpers::discount_percent($product->discount_percent)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="form-group mx-2 row my-tags-input {{ $errors->has('product_tags') ? 'my-is-invalid p-1' : ''}}">
                                        <label for="cono1" >Product Tags <span class="text-danger">*</span></label>
                                        <input type="text" data-role="tagsinput" name="product_tags" class="form-control" value="{{$product->product_tags}}">
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
                        <textarea id="editor1" name="long_description" id="" cols="30" rows="10">
                            {!!$product->long_description!!}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body {{ $errors->has('short_description') ? 'my-is-invalid' : ''}}">
                        <h4 class="card-title">Short Description <span class="text-danger">*</span></h4>
                        <!-- Create the editor container -->
                        <textarea id="editor2" name="short_description" id="" cols="30" rows="10">
                            {!!$product->short_description!!}
                        </textarea>
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
                    <div class="row mt-3">
                        <div class="col-md-6 text-center">
                            <label>Current Package of files displayed on your website</label>
                            <div class="mt-3">
                                <a href="{{route('product-digital.download.file', $product->id)}}" class="btn btn-sm btn-info">Download RAR file<span class="mr-10"></span>
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <label>All Current Files Separated Files of Package</label>
                            <div class="mt-3">
                                @foreach ($multi_digital_files as $digital_file)
                                <a class="btn btn-sm btn-info" href="{{route('product-digital.download.file.list', $product->id)}}">{{Helpers::name_of_file($digital_file->file_path)}}
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                                @endforeach
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

                <div class="row">
                    <div class="form-group row">
                        <!-- Edit Main Image -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Main Image Upload</label>
                                <div class="custom-file">
                                    <input type="file" id="mainImg" name="main_image_path" class="form-control  {{ $errors->has('main_image_path') ? 'my-is-invalid' : ''}}" onchange="FetchThumbnail(this)" accept="image/*">
                                </div>

                                <!-- Main Image if exists -->
                                <div class="gallery-main text-center m-auto mt-5">
                                    <label>Current Default Image</label>
                                    @if($product->main_image_path)
                                    <div>
                                        <img class="img-fluid-admin" src="{{asset($product->main_image_path)}}" alt="">
                                    </div>
                                    @else
                                    <div>
                                        <img class="img-fluid-admin" src="{{asset('img/img-admin/no_image.jpg')}}" alt="">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Main Image if exists -->

                            <div class="div-img d-none text-center">
                                <h3 id="title_preview_img"></h3>
                                <img id="preview_main_image" src="" alt="">
                            </div>
                        </div>

                        <!-- Edit Main Image -->

                        <!-- Edit Multi Images-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label>Multiple Images Upload</label>
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="file" name="multi_images_files[]" id="multiImg" class="form-control  {{ $errors->has('multi_images_files') ? 'my-is-invalid' : ''}}" multiple accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="gallery-multi text-center mt-5">
                                <label>Current Multi Images</label>


                                <div id="my_nanogallery2" data-nanogallery2='{
                                    "thumbnailWidth":  "150",
                                    "thumbnailHeight":  "150",
                                    "thumbnailAlignment": "center",
                                    "thumbnailBorderHorizontal": 0,
                                    "thumbnailBorderVertical": 0,
                                    "thumbnailGutterWidth": 10,
                                    "thumbnailGutterHeight": 10,
                                    "thumbnailHoverEffect2": "customlayer_backgroundColor_rgba(0,0,0,0.0)_rgba(0,0,0,0.2)_1000"
                                    }'>

                                    <!-- ### gallery content ### -->
                                    @forelse ($multiple_images_id as $image_id)
                                    public static function nano_data_thumb_multi_images($image_id)
                                    <a href="{{route('product.multiple.images.serve', $image_id)}}" data-ngthumb="{{Helpers::nano_data_thumb_multi_images($image_id)}}">
                                        <img src="{{route('product.multiple.images.serve', $image_id)}}" alt="">
                                    </a>
                                    @empty
                                    No Multi images...
                                    @endforelse
                                </div>
                            </div>

                            <div class="text-center">
                                <h5 id="title_preview_multi_images"></h5>
                                <div class="row" id="preview_multi_images">
                                </div>
                            </div>
                        </div>
                        <!-- Edit Multi Images-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Images -->

        @include('admin.pages.product.product-material.edit.product-edit-checkboxes')


        <div class="card-body d-flex justify-content-center">
            <button type="submit" id="submit-upload" class="btn btn-lg btn-primary">
                Update this Product
            </button>
        </div>
    </div>
</div>
@endsection
