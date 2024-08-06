<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\EventsProduct;
use App\Models\Product; 

class EventsProductImport implements ToCollection, WithHeadingRow
{
    protected $eventId;

    /**
    * @param Collection $collection
    */

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function collection(Collection $rows)
    {
       
        $mode = session()->get('EventProductMode');

        if($mode == 1)
        {
            EventsProduct::where('event_id', $this->eventId)->delete();
        }

        foreach($rows as $row){
             $product = Product::where('upc' ,$row['upc'])->first();
             if($product){
                $eventsProduct = new EventsProduct();
                $eventsProduct->event_id = $this->eventId;
                $eventsProduct->product_id = $product->id;
                $eventsProduct->status = 'A';
                $eventsProduct->homepage = $row['homepage'];
                $eventsProduct->save();
             }
        }
    }
}
