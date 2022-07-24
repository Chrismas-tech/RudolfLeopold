<!-- Modal -->
<div class="modal fade" id="add-category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                    <div class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-5 feather feather-package">
                            <path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path>
                            <polyline points="2.32 6.16 12 11 21.68 6.16"></polyline>
                            <line x1="12" y1="22.76" x2="12" y2="11"></line>
                            <line x1="7" y1="3.5" x2="17" y2="8.5"></line>
                        </svg>
                        <h4 class="card-title ms-1">Create Subcategory</h4>
                    </div>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-2">
                <div class="col-md-12">

                    <form id="form_cat_store" action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if((Session::get('form_2')))
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
                                <label>Subcategory Name</label>
                                <input type="text" name="sub_cat_name" class="form-control {{ $errors->has('sub_cat_name') ? 'is-invalid' : ''}}" placeholder="Electronics, Books, Clothes, Computer..." value="{{old('sub_cat_name')}}">
                            </div>
                        </div>

                        <input type="hidden" name="sub_cat_id" value="">


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                Create
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>
