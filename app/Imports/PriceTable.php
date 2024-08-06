<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use App\Models\ShippingPrice;

class PriceTable implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
{
    foreach ($rows as $row) {
        $country_id = $row['country_id'];
        $weight = $row['weight'];
        $price = $row['price'];

        $this->inactiveData($country_id);
    }
    foreach ($rows as $row) {
        $country_id = $row['country_id'];
        $weight = $row['weight'];
        $price = $row['price'];
        
        $prices = new ShippingPrice();
        $prices->country_id = $country_id;
        $prices->weight = $weight;
        $prices->price = $price;
        $prices->save();
    }
}

    public function inactiveData($country_id)
    {
        
        $country = ShippingPrice::where('country_id', $country_id)->exists();
    
        if (! $country) {
            
            return false;
        }
    
        
        ShippingPrice::where('country_id', $country_id)
            ->update([
                'is_active' => 0
            ]);
    
        return true;
    }
}
