<div class="col-12 mt-3">
    <label>Visibility of your product<span class="text-danger"> (Optional)</span></label>
    <div class="card">
        <div class="card-body">
            <div class="note">Additional sections where you may display your product <span class="text-danger">(Optional)</span></div>
            <div class="divider"></div>
            <div class="form-group row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <div class="col-md-6">
                            <div>
                                <input class="ios8-switch" type="checkbox" name="visible" id="checkbox_1" {{old('visible') ?? 'checked'}} value="1">
                                <label class="form-check-label mb-0" for="checkbox_1">Visible (public)</label>
                            </div>
                            <div>
                                <input class="ios8-switch" type="checkbox" name="hot_deals" id="checkbox_2" {{old('hot_deals') ?? 'checked'}} value="1">
                                <label class="form-check-label mb-0" for="checkbox_2">Hot Deals</label>
                            </div>
                            <div>
                                <input class="ios8-switch" type="checkbox" name="featured" id="checkbox_3" {{old('featured') ?? 'checked'}} value="1">
                                <label class="form-check-label mb-0" for="checkbox_3">Featured</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <input class="ios8-switch" type="checkbox" name="special_offer" id="checkbox_4" {{old('special_offer') ?? 'checked'}} value="1">
                                <label class="form-check-label mb-0" for="checkbox_4">Special Offer</label>
                            </div>
                            <div>
                                <input class="ios8-switch" type="checkbox" name="special_deals" id="checkbox_5" {{old('special_deals') ?? 'checked'}} value="1">
                                <label class="form-check-label mb-0" for="checkbox_5">Special Deals</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
