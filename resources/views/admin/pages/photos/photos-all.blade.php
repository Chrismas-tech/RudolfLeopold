@extends('admin.layouts.base-admin')
@section('title')
Photos Management
@endsection
@section('subtitle')
Photos Management
@endsection
@section('content')
<main id="main" class="main photos">
    @include('admin.layouts.page-name')

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <h3>
                            <i class="bi bi-images"></i>
                            <span>Add Photos to your Website</span>
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

                        <div class="divider"></div>

                        <div class="flex-complete mt-3 text-center">
                            <div class="note">
                                Image Format Allowed : JPEG - JPG - PNG
                                <br>
                                Maximum size : 50mo
                            </div>
                        </div>


                        <label for="photos" class="flex-complete mt-3 mb-3">
                            <a class=" btn btn-primary my-white" title="Upload a New image">
                                <i class="fas fa-upload"></i> Upload Multiple Photos
                            </a>
                        </label>

                        <input type="file" name="photos[]" class="form-control multi_img_variants d-none {{ $errors->has('photos') ? 'my-is-invalid' : ''}}" multiple accept="image/*" enctype="multipart/form-data" id="photos">

                        <div class="text-center">
                            {{-- <h6 class="title_preview_multi_images"></h6> --}}
                            <div class="d-flex flex-wrap justify-content-center align-items-center preview_multi_images">
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" id='submit-upload'>
                                Submit
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3><i class="bi bi-images"></i> <span>All Photos</span></h3>
                    <button id="select_all" class="btn btn-primary">Select all</button>
                    <button id="deselect_all" class="btn btn-primary d-none">Deselect all</button>
                </div>

                <div class="flex-complete">
                    {!! $photos->links() !!}
                </div>

                <div class="table-responsive mt-3">
                    <table {{-- id="zero_config" --}} class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($photos as $photo)
                            <tr>
                                @if($photo->file_path)
                                <td>
                                    <div>
                                        <img class="img-fluid-photo" src="{{asset($photo->file_path)}}" alt="">
                                    </div>
                                    <div class="d-none badge rounded-pill my-bg-success mt-2" id="current_url_video_{{$photo->id}}" style="max-width:400px;overflow:scroll;">
                                        File Path : {{$photo->file_path}}
                                    </div>
                                </td>
                                <td>
                                    <div class="mb-2 mt-2">
                                        <span class="btn btn-danger delete_button_{{ $photo->id }} d-none delete-sweet-alert-photos">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </div>
                                    <div class="flex-complete">
                                        <div class="form-check form-switch" title="Select/Deselect">
                                            <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$photo->id}}">
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <p>There is no Photos in Database</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex-complete">
                    {!! $photos->links() !!}
                </div>
            </div>
        </div>

    </div>


    <!-- Delete Multiple Product-->
    <form title="Delete this Product" id="form_delete_entry" action="{{route('photo.delete')}}" method="POST">
        @csrf
        <!-- INPUT HIDDEN -->
        <input type="hidden" id="delete_multiple_entries" name="delete_checkbox">
        <!-- INPUT HIDDEN -->
    </form>
    <!-- Delete Multiple Product-->
</main>
@endsection
