<?php

namespace App\Http\Livewire\Inventory;

use App\Models\change;
use App\Models\inventory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InventoryEdit extends Component
{
    public $modalInventory = false;
    public $stock;
    public $stockAux;
    protected $rules=[
     
        'stockAux.stock'=>'required',
        'stockAux.warehouses_id'=>'required|numeric',
       
         
    ];
    public function mount(inventory $stock)
    {
        $this->stock = $stock;
        $this->stockAux=$stock;
    }


    public function render()
    {
        return view('livewire.inventory.inventory-edit');
    }

    public function save(){
        $this->validate();
        if (Auth::user()->role=="Teamleader") {
            # code...
          
            $this->stock=$this->stockAux;
            $this->stock->edit='Available';
            $this->stock->editor_id= 0;
            $this->stock->save();

            
            $this->emit('renderInventory');
            $this->modalInventory=false;
        }
        if (Auth::user()->role=="Editor") {
            # code...
            $this->validate();
            $change = new change();
            $change->table_name= "inventory";
            $change->status= "pending";
            $change->original = json_encode($this->stock);
            $change->changes = json_encode($this->stockAux);
            $change->editor= Auth::user()->id;
            $change->save();
            $this->stock->edit='Edited';
            $this->stock->editor_id=Auth::user()->id;
            $this->stock->save();
            $this->emit('renderInventory');
            $this->modalInventory=false;
        }
    }

    //Open Edit modal function
    public function OpenModal(){
        if ($this->stock->edit== 'in edition') {
            
            if ( $this->stock->editor_id== Auth::user()->id) { 
           
                $this->modalInventory=true;
          
            }
            $this->emit('renderInventory');
        }
        else{
            if ($this->stock->edit!= 'Edited') {
                # code... 
                $this->stock->edit= 'in edition';
            $this->stock->editor_id= Auth::user()->id;
            $this->stock->save();
            $this->modalInventory=true;
            $this->emit('renderInventory');
            }
            $this->emit('renderInventory');
      
           
        
        }
    }

    //close modal 
    public function closeCancel(){
     
        $this->stock->edit='Available';
        $this->stock->editor_id= 0;
        $this->stock->save();
        $this->modalInventory=false;
        $this->emit('renderInventory');
       
    }
}
