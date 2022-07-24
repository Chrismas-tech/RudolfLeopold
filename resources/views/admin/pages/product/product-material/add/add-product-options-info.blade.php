<!-- PRODUCT OPTIONS CHECKBOX -->
<div class="form-group">
    <label>Product Options<span class="text-danger"> *</span></label>
    <div class="card product-options">
        <div class="card-body">
            <div class="col-12">
                <div>
                    <input class="ios8-switch" type="checkbox" name="variant" id="variant" value="1">
                    <label class="form-check-label pointer" for="variant">Please check this box if your product has multiple options like different sizes or colors</label>
                </div>
            </div>

            <div class="div-options-checkboxes d-none mt-2 mb-2">
                <h5>Check the options you need</h5>
                <div class="row mt-3">

                    @forelse($options as $option)
                    <div class="col-4">
                        <div>
                            {{-- {{dd(in_array($option->id,json_decode( $product->option_ids)))}} --}}
                            <input class="ios8-switch" value="{{$option->id}}" type="checkbox" name="option_ids[]" id="{{$option->name}}">
                            <label class="form-check-label" for="{{$option->name}}"> {{ucfirst($option->name)}} (@foreach(json_decode($option->value) as $key => $value)@if($key < 1){{ucfirst($value).','}}@elseif($key==1){{ucfirst($value).'...'}}@endif @endforeach)</label>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT OPTIONS CHECKBOX -->
