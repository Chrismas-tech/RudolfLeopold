@extends('admin.layouts.base-admin')
@section('title')
Category Management
@endsection
@section('subtitle')
Category Management
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid all-category">

        <div class="row">
            @include('admin.pages.categories.category-add-main')

            <div class="col-md-12">
                <div class="card" id="tree-categories">

                    <div class="card-body">
                        <h3>
                            <i class="fa fa-tree my-success"></i>
                            <span class="ms-1">
                                Category/SubCategory Tree View
                            </span>
                        </h3>
                        @if(count($categories) > 0)
                        <div class="note">A tree view represents a hierarchical view of information, where each item can have a number of subitems.
                            <br>
                            Click on the arrow(s) to open or close the tree branches.
                        </div>
                        @else
                        <div class="note">Please create a category above to fill the Database.</div>
                        @endif
                    </div>

                    <div class="card-body" style="border: 1px solid #e9ecef;">
                        <!-- FOREACH CATEGORIES SUBCATEGORIES -->
                        <ul id="myUL">

                            <!-- If session (if subcat just created we collect all parent_ids), we create a variable -->
                            @php
                            if(Session::has('collect_parent_ids')) {
                            $collect_parent_ids = Session::get('collect_parent_ids');
                            }
                            @endphp

                            {{-- @forelse ($collect_parent_ids as $item)
                            {{$item}}
                            @empty
                            @endforelse --}}

                            <!-- Foreach Categories/Sucategories -->
                            @foreach ($categories as $category)
                            <li>
                                <!-- If Category has Subcategories -->
                                @if (count($category->children))

                                <!-- SubCategory just created  ? -->
                                <!-- Yes chevron down, No chevron right -->
                                @if(in_array($category->id, $collect_parent_ids))
                                <i class="fa fa-fw fa-chevron-circle-down" title="Expand this Category/Subcategory"></i>
                                @else
                                <i class="fa fa-fw fa-chevron-circle-right" title="Expand this Category/Subcategory"></i>
                                @endif

                                <!-- Category Icon ? -->
                                @if($category->category_icon)
                                {!! $category->category_icon !!}
                                @else
                                <i class="fa-solid fa-box"></i>
                                @endif
                                <!-- Category Icon ? -->

                                <!-- Category Name -->
                                <span class="edit_name_category_{{$category->id}}">{{$category->name}}</span>
                                <!-- Category Name -->

                                <!-- IF Parent NULL-->
                                @if($category->parent_id == null)
                                <span class="
                                @if(in_array($category->id, $collect_parent_ids))
                                badge bg-warning text-dark 
                                @else
                                badge my-bg-success text-white 
                                @endif
                                main-category-badge-change-{{$category->id}}">
                                    Main Category N°{{$category->id}}
                                </span>
                                @endif
                                <!-- IF Parent NULL-->

                                <!-- EDIT BUTTONS -->
                                @include('admin.pages.categories.category-add-edit-delete-buttons')
                                <!-- EDIT BUTTONS -->

                                <!-- CALL SAME RESURSIVE BlADE FILE -->
                                @include('admin.pages.categories.tree-categories', ['categories' => $category->children ])
                                <!-- CALL SAME RESURSIVE BlADE FILE -->



                                <!---------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------->
                                @else
                                <!---------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------->
                                <!---------------------------------------------------------------------------------------------------------->

                                <span class="ms-1"></span>

                                <!-- Else If No Subcategories -->

                                <!-- Category Icon ? -->
                                @if($category->category_icon)
                                {!! $category->category_icon !!}
                                @else
                                <i class="fa-solid fa-box"></i>
                                @endif
                                <!-- Category Icon ? -->

                                <!-- Category Name -->
                                <span class="edit_name_category_{{$category->id}}">{{$category->name}}</span>
                                <!-- Category Name -->

                                <!-- IF Parent NULL-->
                                @if($category->parent_id == null)
                                {{-- <h1>{{$category->id}}</h1>
                                <h1>{{var_dump($collect_parent_ids)}}</h1> --}}
                                <span class="badge my-bg-success text-white">
                                    <strong>
                                        Main Category
                                    </strong>
                                </span>
                                @endif
                                <!-- IF Parent NULL-->

                                @include('admin.pages.categories.category-add-edit-delete-buttons')

                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <!-- FOREACH CATEGORIES SUBCATEGORIES -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('admin.pages.modals.modal-edit-subcategory')
@include('admin.pages.modals.modal-add-subcategory')
@endsection
