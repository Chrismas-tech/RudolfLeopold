@if(count($all_products))
@if( $all_products->hasPages() )
<!-- Pagination-->
<div class="flex-complete mt-5 mb-5">
    <div class="py-1 px-2">
        <div class="pagination">
            {!! $all_products->appends(request()->query())->links()!!}
        </div>
    </div>
</div>
<!-- Pagination-->
@endif
@endif
