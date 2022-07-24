<div class="badge rounded-pill my-bg-success mb-1">
    Album Name : {{$track->album_name}}
</div>
<div class="note">
    <i class="bi bi-music-note-beamed me-1"></i>{{$track->audio_file_name}}
</div>
<div>
    <audio controls>
        <source src="{{asset($track->audio_file)}}" type="audio/ogg">
    </audio>
</div>
