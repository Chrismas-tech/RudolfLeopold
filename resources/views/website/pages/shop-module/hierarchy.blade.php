@if(count($collect_parent_names))
<div class="d-flex flex-wrap align-items-center mt-3 mb-3">
    @forelse($collect_parent_names as $key => $value)
    <div class="my-bg-danger py-1 me-3 rounded">
        <h6 class="text-white m-0 px-2">
            <i class="fa-solid fa-circle-right"></i> {{$value}}
        </h6>
    </div>
    @empty
    @endforelse
</div>
@endif
