<!-- product variants -->
<div class="row product-variants">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Product Variants</h4>
            </div>
            <div class="table-responsive p-3 {{$errors->has('product_variants') ? 'my-is-invalid' : ''}}">
                <table class="table table-striped">
                    <thead class="thead-light-products">
                        <tr>
                            <th scope="col">Quantity ({{$qty_product}})</th>
                            <th scope="col">Sizes</th>
                            <th scope="col">Colors</th>
                            <th scope="col">Unit Price €</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <div id="div-errors" class="d-none">

                    </div>
                    <tbody class="customtable table-variants">
                        <tr>
                            <td style="min-width: 142px !important;">
                                <input type="number" id="qty_variant" class="form-control" value="1">
                            </td>
                            <td>
                                <select id="size_variant" aria-label="Default select example">
                                    <option value="0" selected>Choose a Size</option>
                                    <option value="No">I don't need a specific size</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </td>
                            <td>
                                <select aria-label="Default select example" id="color_variant">
                                    <option value="0" selected>Choose a color</option>
                                    <option value="No">I don't need a specific color</option>
                                    <option value="red">red</option>
                                    <option value="blue">blue</option>
                                    <option value="yellow">yellow</option>
                                    <option value="orange">orange</option>
                                </select>
                            </td>
                            <td style="min-width: 95px !important;">
                                <input type="text" class="form-control" id="unit_price_variant" value="1">
                            </td>
                            <td class="flex-complete">
                                <span title="Add variant" class="btn btn-success" id="add-variant">
                                    <i class="far fa-plus-square text-white"></i>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Product Variants -->
                <input type="hidden" name="product_variants" id="product_variants">
                <input type="hidden" id="edit_product_variants_i_count" value={{count($product_variants)}}>
                <!-- Product Variants -->
            </div>
        </div>
    </div>
</div>
<!-- product variants -->
