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

                        <div class="flex-complete mt-3 text-center">
                            <div class="note">
                                Image Format Allowed : MP3 - WAV
                                <br>
                                Maximum size per upload : 600 mo
                            </div>
                        </div>

                        <label for="tracks" class="flex-complete mt-3 mb-3">
                            <a class=" btn btn-primary my-white" title="Upload a New Track">
                                <i class="fas fa-upload"></i> Upload Multiple Tracks
                            </a>
                        </label>

                        <input type="file" name="tracks[]" class="form-control multi_audio_files d-none {{ $errors->has('tracks') ? 'my-is-invalid' : ''}}" multiple accept="audio/*" id="tracks">

                        <div class="text-center">
                            <div id="title_preview" class="note"></div>
                            <div class="d-flex flex-wrap justify-content-center align-items-center" id="preview_multi_tracks">
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
                    {!! $tracks->links() !!}
                </div>

                <div class="table-responsive mt-3">
                    <table {{-- id="zero_config" --}} class="table table-striped table-bordered" {{-- style="table-layout: fixed;" --}}>
                        <thead>
                            <tr>
                                <th style="min-width: 400px;">Track</th>
                                {{-- <th >File Path</th> --}}
                                <th style="">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tracks as $track)
                            <tr>
                                @if($track->file_path)
                                <td>
                                    @include('admin.pages.music-player.audio-player', ['track' => $track])
                                </td>
                                {{-- <td>
                                    <div class="badge rounded-pill my-bg-success">
                                        {{$track->file_path}}
                                    </div>
                                </td> --}}
                                <td>
                                    <div>
                                        <div class="mb-2 mt-2">
                                            <span class="btn btn-danger delete_button d-none delete-sweet-alert-music-tracks">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </div>
                                        <div class="flex-complete">
                                            <div class="form-check form-switch" title="Select/Deselect">
                                                <input class="form-check-input switch-input" type="checkbox" id="checkbox_{{$track->id}}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </div>
                                    </div>
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
                    {!! $tracks->links() !!}
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
