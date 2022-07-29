@extends('admin.layouts.base-admin')
@section('title')
Youtube Videos Management
@endsection
@section('subtitle')
Youtube Videos Management
@endsection
@section('content')
<main id="main" class="main">
    @include('admin.layouts.page-name')
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('youtube-videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <h3>
                            <i class="bi bi-youtube"></i>
                            <span>Add a Youtube Video</span>
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

                        <div class="form-group">
                            <label for="name">Youtube Video Name<span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" name="video_name" id="video_name" class="form-control {{ $errors->has('video_name') ? 'my-is-invalid' : ''}}" value="{{old('video_name') ?? old('video_name')}}">
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label>Url of your Youtube Video</label>
                            <div class="note">1. Go on Youtube and search your video <a href="youtube.com">Click here</a></div>
                            <div class="note">2. Right Click on the Video => "Copy video URL" or "Copy video URL at current time"</div>
                            <div class="note">3. Paste The URL Video below</div>
                            <input type="text" name="url_video" class="form-control {{ $errors->has('url_video') ? 'is-invalid' : ''}}" placeholder="example : https://youtu.be/S9Bz_a3RyjQ">
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


    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3><i class="bi bi-youtube me-1"></i><span>All Youtube Videos</span></h3>
                    <button id="select_all" class="btn btn-primary">Select all</button>
                    <button id="deselect_all" class="btn btn-primary d-none">Deselect all</button>
                </div>

                <div class="flex-complete">
                    {!! $youtube_videos->links() !!}
                </div>

                <div class="table-responsive mt-3">
                    <table {{-- id="zero_config"  --}}class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><i class="bi bi-youtube me-1 my-danger"></i>Youtube Video</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($youtube_videos as $ytb_video)
                            <tr>
                                @if($ytb_video->url)
                                <td style="width:25%;">
                                    <div class="badge rounded-pill my-bg-success mb-2" >
                                       Video name : <span>{{$ytb_video->video_name}}</span> 
                                       <span id="current_url_video_{{$ytb_video->id}}"></span>
                                    </div>
                                    <div>
                                        <iframe width="426" height="240" src="{{asset($ytb_video->url)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </td>
                                <td style="width:25%;">
                                    <div>
                                        <button class="btn btn-primary" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#edit-youtube-video" id="{{$ytb_video->id}}" title="Edit your Youtube Video">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <div class="mb-2 mt-2">
                                            <span class="btn btn-danger delete-button_{{$ytb_video->id}} d-none delete-sweet-alert-youtube-videos" >
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </div>
                                        <div class="flex-complete">
                                            <div class="form-check form-switch" title="Select/Deselect">
                                                <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$ytb_video->id}}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <p>There is no Youtube Videos in Database</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex-complete">
                    {!! $youtube_videos->links() !!}
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Delete Multiple Product-->
<form title="Delete this Product" id="form_delete_entry" action="{{route('youtube-videos.delete')}}" method="POST">
    @csrf
    <!-- INPUT HIDDEN -->
    <input type="hidden" id="delete_multiple_entries" name="delete_checkbox">
    <!-- INPUT HIDDEN -->
</form>
<!-- Delete Multiple Product-->
@include('admin.pages.modals.modal-edit-youtube-videos')
@endsection
