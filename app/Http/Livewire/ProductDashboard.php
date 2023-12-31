<?php

namespace App\Http\Livewire;

use App\Http\Controllers\MailController;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class ProductDashboard extends Component
{

    public $search ;
   protected $listeners = ['renderProduct'=> 'render'];
    public function render()
    {
       
        $showModal=false;
        $products =  product::with('group','provider', 'store', 'prices')->where('title', 'like', '%'.$this->search.'%')->orWhereHas('provider', function ($query) {
            $query->where('name', 'like', '%'.$this->search.'%');
        })->get();
        return view('livewire.product-dashboard', compact('products'));
    }
}
