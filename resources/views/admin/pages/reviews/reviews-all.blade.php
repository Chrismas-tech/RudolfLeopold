@extends('admin.layouts.base-admin')
@section('title')
<a href="{{route('products.all')}}"><i class="bi bi-arrow-left-square"></i></a>
Manage the Reviews
@endsection
@section('subtitle')
Manage the Reviews
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h3>
                                <i class="bi bi-star"></i>
                                <span class="ms-1">All Reviews</span>
                            </h3>

                            <button id="select_all" class="btn btn-primary">Select all</button>
                            <button id="deselect_all" class="btn btn-primary d-none">Deselect all</button>
                        </div>

                        <div class="divider"></div>

                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reviews as $review)
                                    <tr>
                                        <td style="width:15%;">
                                            <p>UserID : {{$review->user_id}}</p>
                                            <p>{{$review->user->firstname}}</p>
                                            <p>{{$review->user->lastname}}</p>
                                        </td>
                                        <td style="width:25%;">
                                            <div class="badge rounded-pill bg-info">
                                                <h6 class="p-0 m-0">{{$review->product->name}}</h6>
                                            </div>
                                            <h6 class="my-2">Product ID : {{$review->product->id}}</h6>
                                            <div class="mt-2">
                                                @if($review->product->main_image_path)
                                                <img class="img-admin-review" src="{{asset($review->product->main_image_path)}}" alt="">
                                                @else
                                                <img class="img-admin-review" src="{{asset('img/img-admin/no_image.jpg')}}" alt="">
                                                @endif
                                            </div>
                                        </td>
                                        <td style="width:25%;">
                                            <div class="card p-2">
                                                <div class="note">
                                                    {{$review->created_at->format('jS F Y - h:i')}}
                                                </div>
                                                {{$review->review}}
                                            </div>
                                        </td>
                                        <td style="width:25%;">
                                            @if($review->status == 1)
                                            <div class="mb-3">
                                                <h3>Status</h3>
                                                <span class="btn btn-success text-white">
                                                    Review Accepted <i class="fas fa-check"></i>
                                                </span>
                                            </div>

                                            <hr>

                                            <form title="Set this Review in pending" id="form_product_review_pending" action="{{route('review.pending', $review->id)}}" method="POST">
                                                @csrf
                                                <span class="btn btn-warning text-dark pending-sweet-alert-product-review">
                                                    Set in pending <i class="bi bi-clipboard-check"></i>
                                                </span>
                                            </form>

                                            <div class="mb-2 mt-2">
                                                <span class="btn btn-danger delete_button d-none delete-sweet-alert-product-reviews">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </div>

                                            <div class="form-check form-switch" title="Select/Deselect">
                                                <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$review->id}}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>

                                            @elseif($review->status == 2)
                                            <div class="mb-3">
                                                <h3>Status</h3>
                                                <span class="btn btn-warning text-dark">
                                                    Waiting for approbation <i class="bi bi-clipboard-check"></i>
                                                </span>
                                            </div>

                                            <hr>

                                            <div class="flex-complete">
                                                <form title="Approve this Review" class="me-2" id="form_product_review_approve" action="{{route('review.approve', $review->id)}}" method="POST">
                                                    @csrf
                                                    <span class="btn btn-success text-white approve-sweet-alert-product-review">
                                                        Click to Approve <i class="fas fa-check"></i>
                                                    </span>
                                                </form>
                                            </div>

                                            <div class="mb-2 mt-2">
                                                <span class="btn btn-danger delete_button d-none delete-sweet-alert-product-reviews">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </div>

                                            <div class="form-check form-switch" title="Select/Deselect">
                                                <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$review->id}}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>

                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <p>There is no reviews in Database</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Multiple Product-->
        <form title="Delete this Product" id="form_delete_entry" action="{{route('review.delete')}}" method="POST">
            @csrf
            <!-- INPUT HIDDEN -->
            <input type="hidden" id="delete_multiple_entries" name="delete_checkbox">
            <!-- INPUT HIDDEN -->
        </form>
        <!-- Delete Multiple Product-->
    </div>
</main>

@endsection
