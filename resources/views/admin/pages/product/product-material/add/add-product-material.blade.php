@extends('admin.layouts.base-admin')
@section('title')
<a href="{{route('products.all')}}"><i class="bi bi-arrow-left-square"></i></a>
Add your Material Product
@endsection
@section('subtitle')
Add your Material Product
@endsection
@section('content')
<main id="main" class="main">

    @include('admin.layouts.page-name')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- ERRORS -->
                    @if((Session::get('form_1')))
                    <div class="mb-2">
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger p-2" role="alert">
                            <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <!-- ERRORS -->

                    <form action="{{route('product-material.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="mt-2 px-0">Select a Category for your Product <span class="text-danger">*</span></label>
                                <div class="m-0 p-0">
                                    <select class="form-control" name="cat_id" id="select" style="width:100%;">
                                        @foreach($categories as $category)
                                        <option class="{{$category->parent_id == null ? 'my-bg-success text-white' : 'bg-dark text-white'}}" value="{{$category->id}}">
                                            {{$category->name}}
                                            -
                                            @if($category->parent_id == null)
                                            (Main Category)
                                            @else
                                            N°{{$category->id}}
                                            @endif
                                        </option>
                                        @endforeach
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" >Product Name<span class="text-danger">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'my-is-invalid' : ''}}" value="{{old('name') ?? old('name')}}">
                                </div>
                            </div>

                            <div class="form-group create_tag_div">

                                <label >Product Tags<span class="text-danger"> (Optional)</span></label>
                                <div class="mt-1">
                                    <div class="note">Here you can write keywords related to your product.
                                    </div>
                                    <div class="note">
                                        These words will be used as reference when the user search a product on your website via the searchbar.
                                    </div>
                                    <div class="note">
                                        Note: some keywords will be automatically generated for you if you leave this field blank.
                                    </div>
                                </div>
                                </label>

                                <div class="d-flex flex-wrap create_tag_list">
                                    <!-- CASE OLD VALUE -->
                                    @php
                                    old('tags') ?
                                    $array_tags = json_decode(old('tags')) : $array_tags = [] ;
                                    @endphp

                                    @if(!empty($array_tags))
                                    @forelse ($array_tags as $tag)
                                    <div class="tag-badge badge my-bg-primary me-1 my-1">
                                        <span class="me-1 value-tag">{{$tag}}</span>
                                        <span><i class="fas fa-window-close pointer"></i></span>
                                    </div>
                                    @empty
                                    @endforelse
                                    <!-- CASE OLD VALUE -->
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="create_tag_input form-control {{ $errors->has('tags') ? 'is-invalid' : ''}}" placeholder="Press enter to add a tag">

                                    <button class="btn btn-primary my-white create_tag_option">Enter</button>

                                    <!-- HIDDEN INPUT -->
                                    <input class="input_tags_array_1" type="hidden" name="tags" value="{{old('tags') ?? old('tags')}}">
                                    <!-- HIDDEN INPUT -->
                                </div>

                                <div class="form-group">
                                    <label for="weight" >Product Weight
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-sm-12">
                                                <input type="number" step="0.01" name="weight" class="form-control {{ $errors->has('weight') ? 'my-is-invalid' : ''}}" value="{{old('weight') ? old('weight') : 0}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-control" name="weight_id">
                                                @foreach($weights as $weight)
                                                <option value="{{$weight->id}}">{{$weight->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('admin.pages.product.product-material.add.add-product-material-descriptions')

                            @include('admin.pages.product.product-material.add.product-add-checkboxes')

                            @include('admin.pages.product.product-material.add.add-product-options-info')

                            <div class="flex-complete">
                                <button type="submit" id="submit-upload" class="btn btn-lg btn-primary">
                                    Save Product General Informations
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
