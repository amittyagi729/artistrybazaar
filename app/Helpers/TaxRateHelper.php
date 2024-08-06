// Use findOrFail to retrieve the address, and it will automatically handle the 404 response if not found
    $address = AddressList::findOrFail($addressId);

    // Get related data using eager loading
    $address->load(['city.state.country']);

    // Construct the response data in an array
    $responseData = [
        'address_line1' => $address->address_line1,
        'address_line2' => $address->address_line2,
        'cityname' => $address->city->name,
        'countryname' => $address->city->state->country->name,
        'statename' => $address->city->state->name,
        'zip_code' => $address->zip_code,
    ];