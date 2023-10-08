<?php

namespace App\Http\Livewire\Prices;

use App\Models\product_price;
use Livewire\Component;

class PriceDashboard extends Component
{
    protected $listeners =['renderPrice'=> 'render'];
    public function render()
    {
        $products =  product_price::with(['product', 'store'])->get();
        return view('livewire.prices.price-dashboard', compact('products'));
    }
}
