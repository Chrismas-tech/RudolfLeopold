<form action="{{route('tracks.update.position')}}" method="POST">
    @forelse ($album_tracks as $key => $track)

    @csrf
    @if($key == 0)
    <div class="mt-3 mb-3">
        <div class="badge rounded-pill my-bg-success">
            <h5 class="m-0">Album : {{$track->album_name}}</h5>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-2 mb-3 mx-3">
        <button type="submit" class="btn btn-primary">Update Track Positions</button>
    </div>
    @endif

    <div class="row div-album-track mb-4 mx-3 align-items-center">
        <div class="col-12">

            <div class="mt-2 mb-2">
                <div class="note">
                    <i class="bi bi-music-note-beamed me-1"></i>{{$track->audio_file_name}}
                </div>
                <div>
                    <audio controls>
                        <source src="{{asset($track->audio_file)}}" type="audio/ogg">
                    </audio>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- Input Hidden ID -->
        <input type="hidden" name="track_ids[]" step="1" min="1" value="{{$track->id}}">
        <!-- Input Hidden ID -->

        <div class="col-6">
            <div class="note">Choose Position Track</div>
            <div class="flex-complete">
                <input type="text" class="form-control input-order-music-tracks" name="position[]" step="1" min="1" value="{{$track->position}}">
            </div>
        </div>

        <div class="col-6">
            <div class="note">Actions</div>
            <div>
                <div class="mb-2 mt-2">
                    <span class="btn btn-danger delete-button_{{$track->id}} d-none delete-sweet-alert-music-tracks">
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
        </div>
    </div>

    @empty
    @endforelse
</form>
