@if(count($reviews))
@if( $reviews->hasPages() )
<!-- Pagination-->
<div class="flex-complete mt-5 mb-5">
    <div class="py-1 px-2">
        <div class="pagination">
            {!! $reviews->appends(request()->query())->links()!!}
        </div>
    </div>
</div>
<!-- Pagination-->
@endif
@endif
