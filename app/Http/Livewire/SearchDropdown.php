<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use DB;
use Benchmark;
use Illuminate\Support\Facades\Cache;

class SearchDropdown extends Component
{
    public $searchTerm = '';
    public $products = [];

    public function updatedSearchTerm()
    {
        if (empty($this->searchTerm)) {
            $this->emit('emptySearch');
            // You can add any necessary logic here, such as showing a message to the user.
            return;
        }

        $cachedProducts = Cache::remember('cached_products_' . $this->searchTerm, now()->addMinutes(10), function () {
            $query = "
                SELECT *
                FROM tbl_categories
                WHERE (meta_title LIKE ? OR meta_description LIKE ?)
                AND deleted_at IS NULL
                AND is_active = 1
                LIMIT 5
            ";

            $results = DB::select($query, ["%$this->searchTerm%", "%$this->searchTerm%"]);

            $data = [
                'searchTerm' => $this->searchTerm,
                'results' => $results,
            ];
            return $data;
        });

        $this->products = $cachedProducts;

        $this->emit('productAvailable', $this->products);
    }
    public function render()
    {
        return view('livewire.search-dropdown');
    }
}