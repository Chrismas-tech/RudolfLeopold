<form action="{{route('website.shop')}}" method="GET" class="flex-complete" id="form-searchbar">
    @csrf

    <div class="input-group">
        <input name="search_bar" id="input_searchbar" type="text" class="form-control" placeholder="Search a product in our Store" value="">
        <button class="btn my-bg-white my-danger" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <div class="flex-complete spinner-div">
        <div class="spinner-border text-primary"> 
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div id="searchbar_results">
    </div>
</form>
