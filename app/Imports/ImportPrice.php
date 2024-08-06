<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Price;
use App\Models\Product;

class ImportPrice implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $sku = $row['sku'];
            $price1 = $row['price1'];
            $price2 = $row['price2'];
            $unit = $row['unit'];
    
            $product = Product::where('sku', $sku)->first();
            if ($product) {
                $checkPriceTable = Price::where('product_id', $product->id)->get();
                if ($checkPriceTable->isNotEmpty()) {
                    foreach ($checkPriceTable as $priceRecord) {
                        $priceRecord->delete();
                    }
                }
    
                $prices = new Price();
                $prices->product_id = $product->id;
                $prices->min_qty = 25;
                $prices->max_qty = 200;
                $prices->qty_text = $unit;
                $prices->price = $price1;
                $prices->lead_time = 30;
                $prices->save();
    
                $prices2 = new Price();
                $prices2->product_id = $product->id;
                $prices2->min_qty = 201;
                $prices2->max_qty = 500;
                $prices2->qty_text = $unit;
                $prices2->price = $price2;
                $prices2->lead_time = 30;
                $prices2->save();
            }
        }
    }
    

}
