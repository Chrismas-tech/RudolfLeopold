@extends('admin.layouts.base-admin')
@section('title')
Manage your Product Options
@endsection
@section('subtitle')
Manage your Product Options
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('option.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <h3>
                                <i class="bi bi-card-list"></i>
                                <span class="ms-1">Create a Product Option</span>
                            </h3>

                            @if((Session::get('form_1')))
                            <div class="mb-3">
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger p-2" role="alert">
                                    <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-group">
                                <label class="col-md-12 mt-3">Name of your option<span class="text-danger">*</span>
                                </label>
                                <input type="text" name="option_name" class="form-control {{ $errors->has('option_name') ? 'is-invalid' : ''}}" placeholder="Name" value="{{old('option_name')}}">
                            </div>


                            <!-- PRODUCT OPTIONS TAGS CREATE -->
                            <div class="col-md-12 create_tag_div">
                                <label for="product_options" class="control-label col-form-label">Product Option
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="d-flex flex-wrap create_tag_list">
                                    <!-- CASE OLD VALUE -->
                                    @php
                                    old('product_options_tags') ?
                                    $array_tags = json_decode(old('product_options_tags')) : $array_tags = [] ;
                                    @endphp

                                    @forelse ($array_tags as $tag)
                                    <div class="tag-badge badge my-bg-primary my-1 me-1">
                                        <span class="me-1 value-tag">{{$tag}}</span>
                                        <span><i class="fas fa-window-close pointer"></i></span>
                                    </div>
                                    @empty
                                    @endforelse
                                    <!-- CASE OLD VALUE -->
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="create_tag_input form-control {{ $errors->has('product_options_tags') ? 'is-invalid' : ''}}">
                                    <button class="btn btn-primary my-white create_tag_option">Enter</button>
                                    <!-- HIDDEN INPUT -->
                                    <input class="input_tags_array_1" type="hidden" name="product_options_tags" value="{{old('product_options_tags') ?? old('product_options_tags')}}">
                                    <!-- HIDDEN INPUT -->
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary my-white">
                                        Save in database
                                    </button>
                                </div>
                            </div>
                            <!-- PRODUCT OPTIONS TAGS CREATE -->
                        </div>
                    </form>
                </div>
            </div>

            <!-- PRODUCT OPTION EDIT LIST -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="d-flex justify-content-between">

                            <h3>
                                <i class="bi bi-card-list"></i>
                                <span class="ms-1">Products Options List</span>
                            </h3>
                            <button id="select_all" class="btn btn-primary">Select all</button>
                            <button id="deselect_all" class="btn btn-primary d-none">Deselect all</button>
                        </div>

                        @if((Session::get('form_2')))
                        <div class="mb-3">
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger p-2" role="alert">
                                <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="table-responsive mt-3">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Values</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @forelse($products_options as $option)
                                <tr id="{{$option->id}}">
                                    <td style="width:25%;">
                                        <input type="text" name="option_name_edit" class="form-control edit_option_name" value="{{ucfirst($option->name)}}">
                                    </td>

                                    @php
                                    $array_options = json_decode($option->value);
                                    @endphp

                                    <td class="edit_option_value_td">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control input-keypress {{ $errors->has('product_options_tags') ? 'is-invalid' : ''}}">
                                            <button class="btn btn-success my-white add_edit_option"><i class="far fa-plus-square"></i></button>
                                        </div>

                                        @forelse ($array_options as $value)
                                        <div class="tag-badge badge my-bg-success my-1 mx-1">
                                            <span class="edit_option_value me-1">{{$value}}</span>
                                            <span>
                                                <i class="fas fa-window-close pointer"></i>
                                            </span>
                                        </div>
                                        @empty
                                        @endforelse
                                    </td>

                                    <td>
                                        <form action="{{route('option.update')}}" method="post" id="form-option-update">
                                            @csrf
                                            <div class=" mb-2">
                                                <span class="ms-2 me-2">
                                                    <a class="btn btn-primary my-white" title="Save this Product Option" id="update_option_{{$option->id}}">
                                                        <i class="fas fa-save"></i>
                                                    </a>
                                                </span>
                                            </div>

                                            <!-- Product Option Input Hidden -->
                                            <input type="hidden" id="edit_option_id_hidden" name="option_id" value="{{$option->id}}">
                                            <input type="hidden" id="edit_option_name_hidden" name="option_name">
                                            <input type="hidden" id="edit_option_value_hidden" name="option_value">
                                            <!-- Product Option Input Hidden -->
                                        </form>

                                        <div class="mb-2 mt-2">
                                            <span class="btn btn-danger delete_button d-none delete-sweet-alert-product-options">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </div>
                                        <div class="flex-complete">
                                            <div class="form-check form-switch" title="Select/Deselect">
                                                <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$option->id}}">
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
            <!-- PRODUCT OPTION EDIT LIST -->
        </div>
    </div>

    <!-- Delete Multiple Product-->
    <form title="Delete this Product" id="form_delete_entry" action="{{route('option.delete')}}" method="POST">
        @csrf
        <!-- INPUT HIDDEN -->
        <input type="hidden" id="delete_multiple_entries" name="delete_checkbox">
        <!-- INPUT HIDDEN -->
    </form>
    <!-- Delete Multiple Product-->
</main>
@endsection
