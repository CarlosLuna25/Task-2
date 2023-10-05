<?php

namespace App\Http\Livewire;

use App\Models\change;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function Laravel\Prompts\alert;

class EditProduct extends Component
{
    public $modalEdit=false;
    public $product;
    public $productAux;
    protected $rules=[
        'product.title'=>'required',
        'product.provider_id'=>'required',
         'product.store_id'=>'required',
         'product.group_id'=>'required',
         'product.description'=>'required',
         'product.sku'=>'required',
         
    ];
    public function mount(product $product){
        $this->product= $product;
        $this->productAux= $product;


    }
    public function save(){

        $this->validate();
        if (Auth::user()->role=="Teamleader") {
            # code...
            $this->product->edit='Available';
            $this->product->editor_id= 0;
            $this->product->save();
            
            $this->emit('renderProduct');
            $this->modalEdit=false;
        }
        if (Auth::user()->role=="Editor") {
            # code...
            $this->validate();
            $change = new change();
            $change->table_name= "product";
            $change->status= "pending";
            $change->original = json_encode($this->productAux);
            $change->changes = json_encode($this->product);
            $change->editor= Auth::user()->id;
            $change->save();
            $this->product->edit='Edited';
            $this->product->editor_id=Auth::user()->id;
            $this->product->save();
            $this->emit('renderProduct');
            $this->modalEdit=false;
        }


    }
   
    public function OpenModal(){ 

        if ($this->product->edit== 'in edition') {
            
            if ( $this->product->editor_id== Auth::user()->id) {
           
                $this->modalEdit=true;
          
            }
            $this->emit('renderProduct');
        }
        else{
            if ($this->product->edit!= 'Edited') {
                # code... 
                $this->product->edit= 'in edition';
            $this->product->editor_id= Auth::user()->id;
            $this->product->save();
            $this->modalEdit=true;
            $this->emit('renderProduct');
            }
            $this->emit('renderProduct');
      
           
        
        }
    }
    public function render()
    {
        return view('livewire.edit-product');
    }
    public function closeCancel(){
     
        $this->product->edit='Available';
        $this->product->editor_id= 0;
        $this->product->save();
        $this->modalEdit=false;
        $this->emit('renderProduct');
       
    }
}
