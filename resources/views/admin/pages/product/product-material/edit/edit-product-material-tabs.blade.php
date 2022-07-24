<!-- Tab Panel -->
<nav>
    <div class="nav nav-tabs @if((Session::get('tabs'))) {{Session::get('tabs')}}@endif" id="nav-tab" role="tablist">
        <!-- Product Infos -->
        <button class="nav-link active" id="product-infos-tab" data-bs-toggle="tab" data-bs-target="#product-infos" type="button" role="tab">
            <h3><i class="bi bi-info-circle"></i> <span>Product General Informations</span></h3class=>
        </button>
        <!-- Product Infos -->

        <button class="nav-link @if(Session::get('tabs')) tabs-blink @endif" id="product-variants-tab" data-bs-toggle="tab" data-bs-target="#product-variants" type="button" role="tab">
            <h3><i class="bi bi-card-checklist"></i> <span>Product Variants</span></h3>
        </button>
    </div>
</nav>
<!-- Tab Panel -->
