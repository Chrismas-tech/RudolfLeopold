<!-- product variants -->
<div class="product-variants">
    <form action="{{route('product-variants.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" style="width: 211.804px;">ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" style="width: 211.804px;">Variant</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 336.42px;">SKU</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 162.798px;">Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 63.892px;">Unit Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" ascending" style="width: 128.864px;">Add Images</th>
                                    </tr>
                                </thead>
                                @csrf
                                <tbody>
                                    @foreach ($variants as $variant)
                                    <tr>
                                        <td style="width:5%;">
                                            {{$variant->id}}
                                        </td>

                                        <td style="width:20%;">
                                            @if($product->variant)
                                            @php
                                            $substr = substr($variant->name, 1);
                                            $name = substr($substr,0, -1);
                                            @endphp
                                            {{$name}}
                                            @else
                                            {{$variant->name}}
                                            @endif
                                        </td>
                                        <td style="width:15%;">
                                            <input type="text" class="form-control" name="variants[{{$variant->id}}][sku]" value="{{$variant->sku ?? $variant->sku}}" step="1" min="1">
                                        </td>
                                        <td style="width:15%;">
                                            <input type="number" name="variants[{{$variant->id}}][quantity_variant]" class="form-control quantity_variant" step="1" min="1" value="{{$variant->qty > 0 ? $variant->qty : ''}}">
                                        </td>
                                        <td style="width:15%;">
                                            <input type="number" name="variants[{{$variant->id}}][unit_price]" class="form-control unit_price_variant" step="0.01" min="0.01" value="{{$variant->unit_price ? $variant->unit_price / 100 : ''}}">
                                        </td>
                                        <td style="width:20%;">
                                            <label for="multi_img_variants{{$variant->id}}">
                                                <a class=" btn btn-primary my-white" title="Upload a New image">
                                                    <i class="fas fa-upload"></i>
                                                </a>
                                            </label>

                                            <input type="file" name="variants[{{$variant->id}}][variant_multi_images][]" class="multi_img_variants form-control d-none {{ $errors->has('image_variant_'.$variant->id) ? 'my-is-invalid' : ''}}" multiple accept="image/*" enctype="multipart/form-data" id="multi_img_variants{{$variant->id}}">

                                            @if(count($multiple_img_variants))
                                            <div class="d-flex flex-wrap justify-content-center align-items-center img-variant-server mt-2 mb-2 current_preview_images">
                                                @forelse ($multiple_img_variants as $img_variant)
                                                {{-- {{dd($img_variant, $variant->id, $multiple_img_variants)}} --}}
                                                @if($img_variant->product_variant_id == $variant->id)
                                                <img class="img-fluid-variant" src="{{asset($img_variant->file_path)}}" alt="">
                                                @endif
                                                @empty
                                                @endforelse
                                            </div>
                                            @endif


                                            <div class="text-center">
                                                {{-- <h6 class="title_preview_multi_images"></h6> --}}
                                                <div class="d-flex flex-wrap justify-content-center align-items-center preview_multi_images">
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <div class="card-body">
            <div class="row mt-4">
                <div class="form-group row">
                    <!-- Edit Main Image -->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="mb-1">Main Image Upload</label>
                            <div class="custom-file">
                                <input type="file" id="mainImg" name="main_img_variant" class="form-control  {{ $errors->has('main_image') ? 'my-is-invalid' : ''}}" accept="image/*">
                            </div>

                            <!-- Main Image if exists -->
                            <div class="flex-complete">
                                <div class="gallery-main d-flex flex-column align-items-center mt-5 text-center">
                                    @if($product->file_path)
                                    <h5>Current Default Image</h5>
                                    <div>
                                        <img class="img-fluid-main-variant" src="{{asset($product->file_path)}}" alt="">
                                    </div>
                                    @else
                                    <label>No Main Image Uploaded</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Main Image if exists -->

                        <div class="div-img d-none text-center">
                            <h3 id="title_preview_img"></h3>
                            <img id="preview_main_image" class="img-fluid-main-variant" src="" alt="">
                        </div>
                    </div>
                    <!-- Edit Main Image -->
                </div>
            </div>
        </div>


        <div class="divider"></div>

        <div class="card-body">
            <div class="form-group">
                <label>Price and Currency<span class="text-danger">*</span></label>
                <div class="mb-1">
                    <div class="note">
                        This price field will be automatically generated by saving your datas. It will select the lowest price among your product variants.
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" disabled name="selling_price" class="form-control {{ $errors->has('price') ? 'my-is-invalid' : ''}}" value="{{PriceHelpers::selling_price($product->selling_price)}}">
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control  {{ $errors->has('currency') ? 'my-is-invalid' : ''}}" name="currency">
                            @foreach($currencies as $currency)
                            <option @if($currency->id == $product->currency->id)
                                selected
                                @endif
                                value="{{$currency->id}}">{{$currency->value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Apply a Discount in %<span class="text-danger"> (Optional)</span></label>
                <div class="col-sm-12">
                    <input type="number" step="0.01" name="discount_percent" class="form-control {{ $errors->has('discount_percent') ? 'my-is-invalid' : ''}}" value="{{$product->discount_percent ? $product->discount_percent : 0 }}">
                </div>
            </div>

            @if($product->discount_percent > 0)
            <div class="form-group">
                <label>Selling Price After Discount<span class="text-danger"></span></label>
                <div class="mb-1">
                    <div class="note">
                        This field is automatically generated.
                    </div>
                </div>
                <div class="col-sm-12">
                    <input type="text" disabled class="form-control {{ $errors->has('price') ? 'my-is-invalid' : ''}}" value="{{PriceHelpers::selling_price_after_discount($product->discount_percent, $product->selling_price)}}">
                </div>
            </div>
            @endif

            <div class="form-group">
                <label>Product Quantity<span class="text-danger">*</span></label>
                <div class="mb-1">
                    <div class="note">
                        This field is automatically generated.
                    </div>
                </div>
                <div class="col-sm-12">
                    <input type="number" disabled step="1" name="qty" class="form-control {{ $errors->has('qty') ? 'my-is-invalid' : ''}}" value="{{$product->qty}}">
                </div>
            </div>
        </div>

        <div class="flex-complete bg-primary">
            <button type="submit" id='submit-upload' class="btn btn-primary w-100">Save Product Variants to database</button>
        </div>
    </form>
</div>
<!-- product variants -->
