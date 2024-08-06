<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="shippingAddressModalLabel">{{ $title }}</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ $url }}" method="POST">
            @csrf
            <input type="hidden" name="address_type" value={{ $i }}>
            <div class="mb-3">
              <label for="inputAddressLine1" class="form-label">Address Line 1</label>
              <input type="text" class="form-control" id="inputAddressLine1{{ $i }}" name="address_line1" placeholder="Enter address line 1" required>
            </div>
            <div class="mb-3">
              <label for="inputAddressLine2" class="form-label">Address Line 2</label>
              <input type="text" class="form-control" id="inputAddressLine2{{ $i }}" name="address_line2" placeholder="Enter address line 2">
            </div>
            <div class="mb-3">
              <label for="country" class="form-label">Country</label>
              <select id="country{{ $i }}" name="country_id" class="country-class form-control">
                <option value="">Select an option</option>
                @foreach (getAllCountries() as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 state-class">
              <label for="inputState" class="form-label">State</label>
              <select id="state_id" name="state_id" class="state_id-class state_id{{ $i }} form-control">
                <option value="">Please select a Country</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="inputZip" class="form-label">ZIP Code</label>
              <input type="text" class="form-control" id="inputZip{{ $i }}" name="zip_code" placeholder="Enter ZIP code" required>
            </div>
            <div class="mb-3 city-class">
              <label for="inputCountry" class="form-label">City</label>
              <select id="city_id" name="city_id" class="city_id-class city_id{{ $i }} form-control">
                <option value="">Please select a State</option>
              </select>
            </div>
            @if($i == 0)
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" name="same_as_shipping" value="1" id="same_as_shipping">
                <label class="form-check-label" for="same_as_shipping">Billing address same as shipping address</label>
              </div>
            </div>
            @endif
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
              <button type="submit" id="save-btn{{ $i }}" class="btn btn-primary">Save Address</button>
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
  