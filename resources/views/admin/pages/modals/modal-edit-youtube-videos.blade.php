<!-- Modal -->
<div class="modal fade" id="edit-youtube-video" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <div class="d-flex">
                        <h3><i class="bi bi-youtube me-2"></i>
                            <span>Edit the Youtube Url Video</span>
                        </h3>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 mt-2">
                <div class="col-md-12">

                    <form action="{{ route('youtube-videos.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if((Session::get('form_3')))
                        <div class="mb-4">
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger p-2" role="alert">
                                <i class="i bi-exclamation-circle me-2"></i>{{ $error }}
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="edit_url_video" class="form-control {{ $errors->has('edit_url_video') ? 'is-invalid' : ''}}" placeholder="example : https://www.youtube.com/watch?v=a_Bv7eqoqb0" value="{{old('edit_url_video') ? old('edit_url_video') : ''}}">
                            </div>
                        </div>

                        <input type="hidden" name="edit_url_video_id" value="">


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
