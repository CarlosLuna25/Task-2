<?php

namespace App\Http\Livewire\Inventory;

use App\Models\inventory;
use Livewire\Component;

class InventoryDashboard extends Component
{
    protected $listeners =['renderInventory'=> 'render'];
    public function render()
    {
        $stocks=inventory::with(['product.store', 'warehouse'])->get();
       
        
        return view('livewire.inventory.inventory-dashboard', compact('stocks'));
    }
}
