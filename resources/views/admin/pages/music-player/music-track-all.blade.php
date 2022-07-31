@extends('admin.layouts.base-admin')
@section('title')
Music Player Management
@endsection
@section('subtitle')
Music Player Management
@endsection
@section('content')
<main id="main" class="main tracks">
    @include('admin.layouts.page-name')

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('track.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <h3>
                            <i class="bi bi-music-note-beamed"></i>
                            <span>Add Music Tracks to your Website</span>
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

                        <div class="form-group">
                            <label for="name">Album Name<span class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" name="album_name" class="form-control {{ $errors->has('album_name') ? 'my-is-invalid' : ''}}" value="{{old('album_name') ?? old('album_name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="mb-1">Album Image Upload<span class="text-danger"> (Optional)</span></label>
                            <div class="custom-file">
                                <input type="file" id="mainImg" name="img_file" class="form-control  {{ $errors->has('main_image') ? 'my-is-invalid' : ''}}" accept="image/*">
                            </div>

                            <div class="div-img d-none text-center mt-4">
                                <h3 id="title_preview_img"></h3>
                                <img id="preview_main_image" class="img-fluid-main-variant" src="" alt="">
                            </div>
                        </div>

                        <div class="form-group music-upload-admin {{ $errors->has('audio_files') ? 'my-is-invalid' : ''}}">
                            <label for="name">Music Upload<span class="text-danger">*</span></label>
                            <div class="flex-complete mt-3 text-center">
                                <div class="note">
                                    Image Format Allowed : MP3 - WAV
                                    <br>
                                    Maximum size per upload : 600 mo
                                </div>
                            </div>

                            <label for="audio_files" class="flex-complete mt-3 mb-3">
                                <a class=" btn btn-primary my-white" title="Upload multiple audio files">
                                    <i class="fas fa-upload"></i> Upload Multiple Audio Files
                                </a>
                            </label>

                            <input type="file" name="audio_files[]" class="form-control multi_audio_files d-none {{ $errors->has('audio_files') ? 'my-is-invalid' : ''}}" multiple accept="audio/*" id="audio_files">

                            <div class="text-center">
                                <div id="title_preview" class="note"></div>
                                <div class="d-flex flex-wrap justify-content-center align-items-center" id="preview_multi_tracks">
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" id="submit-upload" class="btn btn-primary" id='submit-upload'>
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
                    <h3><i class="bi bi-music-note-beamed"></i> <span>All Tracks</span></h3>
                    <button id="select_all" class="btn btn-primary">Select all</button>
                    <button id="deselect_all" class="btn btn-primary d-none">Deselect all</button>
                </div>

                <div class="flex-complete">
                    {!! $albums->links() !!}
                </div>

                <div class="table-responsive mt-3">
                    <table {{-- id="zero_config" --}} class="table table-striped table-bordered" {{-- style="table-layout: fixed;" --}}>
                        <thead>
                            <tr>
                                <th>Album Image</th>
                                <th>Album Name, Track Name, Position and Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($albums as $album)
                            <tr>
                                @if($album->audio_file)

                                @if($album->img_file)
                                <td>
                                    <img class="img-fluid-album-audio-main-image" src="{{asset($album->img_file)}}" alt="">
                                </td>
                                @else
                                <td>
                                    <img class="img-fluid-album-audio-main-image" src="{{asset('img/img-admin/no_image.jpg')}}" alt="">
                                </td>
                                @endif

                                {{-- {{dd(MusicTracksHelpers::all_tracks_album($album->album_name))}} --}}
                                <td>
                                    @include('admin.pages.music-player.audio-player', [
                                    'album_tracks' =>  MusicTracksHelpers::all_tracks_album($album->album_name)])
                                </td>
                                @endif
                            </tr>
                            @empty
                            <p>There is no Tracks in Database</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="flex-complete mt-3">
                    {!! $albums->links() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Multiple Product-->
    <form title="Delete this Product" id="form_delete_entry" action="{{route('track.delete')}}" method="POST">
        @csrf
        <!-- INPUT HIDDEN -->
        <input type="hidden" id="delete_multiple_entries" name="delete_checkbox">
        <!-- INPUT HIDDEN -->
    </form>
    <!-- Delete Multiple Product-->
</main>
@endsection
