@extends('admin.layouts.base-admin')
@section('title')
<a href="{{route('categories.all')}}"><i class="bi bi-arrow-left-square"></i></a>
Edit your Main Category
@endsection
@section('subtitle')
Edit your Main Category
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid all-category">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <h3>
                                <i class="fa-solid fa-box"></i>
                                <span>Edit your Main Category</span>
                            </h3>

                            @if((Session::get('form_1')))
                            <div class="mb-4">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger p-2" role="alert">
                                    <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-group mt-4">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control {{ $errors->has('cat_name') ? 'is-invalid' : ''}}" placeholder="Electronics, Books, Clothes, Computer..." value="{{$category->name}}">
                            </div>

                            <!-- Edit Main Image -->
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="mb-1">Mega Menu Image<span class="text-danger"> (Optional)</span></label>
                                    <div class="custom-file">
                                        <input type="file" id="mainImg" name="file_path_mega_menu" class="form-control  {{ $errors->has('main_image') ? 'my-is-invalid' : ''}}" accept="image/*">
                                    </div>

                                    <!-- Main Image if exists -->
                                    <div class="flex-complete">
                                        <div class="gallery-main d-flex flex-column align-items-center mt-5 text-center">
                                            @if($category->file_path_mega_menu)
                                            <h5>Current Default Image</h5>
                                            <div>
                                                <img class="img-fluid-main" src="{{asset($category->file_path_mega_menu)}}" alt="">
                                            </div>
                                            @else
                                            <label>No Main Image Uploaded</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Main Image if exists -->

                                <div class="div-img d-none text-center">
                                    <h3 id="title_preview_img"></h3>
                                    <img id="preview_main_image" class="img-fluid-main-variant" src="" alt="">
                                </div>
                            </div>
                            <!-- Edit Main Image -->

                            <div class="div-img d-none text-center">
                                <h3 id="title_preview_img"></h3>
                                <img id="preview_main_image" class="img-fluid-main-variant" src="" alt="">
                            </div>

                            <div class="form-group mt-4">
                                <label>Category Icon<span class="text-danger"> (Optional)</span></label>
                                <div class="note">Visit the following page
                                    <a href="{{route('choose.icon')}}" target="_blank">Click here
                                    </a>
                                </div>
                                <div class="note">
                                    1. Search and choose your own icon
                                </div>
                                <div class="note">
                                    2. Paste the appropriated name below, ex: "alarm"
                                </div>
                                <input type="text" name="category_icon" class="form-control {{ $errors->has('cat_name') ? 'is-invalid' : ''}}" placeholder="" value="{{old('category_icon') ? old('category_icon') : $category->category_name}}">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
