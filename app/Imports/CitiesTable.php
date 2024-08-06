<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Cities;

class CitiesTable implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function __construct()
    {
        set_time_limit(0);
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $country_id = $row['country_id'];
            $state_id = $row['state_id'];
            $zip_code = $row['zip_code'];
            $name = $row['city'];

            $cities = new Cities();
            $cities->country_id = $country_id;
            $cities->state_id = $state_id;
            $cities->zip_code = $zip_code;
            $cities->name = $name;
            $cities->save();
        }
    }
}
