<div class="modal fade edit-urs-mdl" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shippingAddressModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close cancel-upd-mdl" data-mdb-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ $url }}" method="POST">
                    @csrf
                    <input type="hidden" id="form-address-id" name="address_id">
                    <div class="mb-3">
                        <label for="inputAddressLine1" class="form-label">Address Line 1<span class="starred"
                                style="
">* (required field)</span></label>
                        <input type="text" class="form-control" id="inputAddressLine1{{ $i }}"
                            name="address_line1" placeholder="Enter address line 1" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputAddressLine2" class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" id="inputAddressLine2{{ $i }}"
                            name="address_line2" placeholder="Enter address line 2">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country<span class="starred" style="
">* (required
                                field)</span></label>
                        <select id="country{{ $i }}" name="country_id" class="country-class form-control">
                            <option value="">Select an option</option>
                            @foreach (getAllCountries() as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 state-class">
                        <label for="inputState" class="form-label">State<span class="starred" style="
">* (required
                                field)</span></label>
                        <input type="text" class="form-control" id="state_id{{ $i }}" name="state_id"
                            placeholder="Enter State/Province">
                    </div>
                    <div class="mb-3 city-class">
                        <label for="inputCountry" class="form-label">City<span class="starred" style="
">*
                                (required field)</span></label>
                        <input type="text" class="form-control" id="city_id{{ $i }}" name="city_id"
                            placeholder="Enter City">
                    </div>
                    <div class="mb-3">
                        <label for="inputZip" class="form-label">ZIP Code<span class="starred" style="
">*
                                (required field)</span></label>
                        <input type="text" class="form-control" id="inputZip{{ $i }}" name="zip_code"
                            placeholder="Enter ZIP code" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancel-upd-mdl"
                            data-mdb-dismiss="modal">Cancel</button>
                        <button type="submit" id="save-btn{{ $i }}" class="btn btn-primary">Update
                            Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-open .modal {
        -webkit-backdrop-filter: blur(4px);
        backdrop-filter: blur(4px);
    }
</style>
