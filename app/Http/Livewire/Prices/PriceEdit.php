<?php

namespace App\Http\Livewire\Prices;

use App\Http\Controllers\MailController;
use App\Models\change;
use App\Models\product;
use App\Models\product_price;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PriceEdit extends Component
{
    public $modalProduct;
    public $product ;
    public $productAux;
    protected $rules =[
        
        'productAux.price'=>'required|numeric',
    ];
    public function mount(product_price $product){
        $this->product= $product;
        $this->productAux=$product;
    }
    public function render()
    {
        return view('livewire.prices.price-edit');
    }public function save(){
        $this->validate();
        if (Auth::user()->role=="Teamleader") {
            # code...
          
            $this->product=$this->productAux;
            $this->product->edit='Available';
            $this->product->editor_id= 0;
            $this->product->save();

            
            $this->emit('renderPrice');
            $this->modalProduct=false;
        }
        if (Auth::user()->role=="Editor") {
            # code...
            $this->validate();
            $change = new change();
            $change->table_name= "price";
            $change->status= "pending";
            $change->original = json_encode($this->product);
            $change->changes = json_encode($this->productAux);
            $change->editor= Auth::user()->id;
            $change->save();
            $this->product->edit='Edited';
            $this->product->editor_id=Auth::user()->id;
            $this->product->save();
            $mail = new MailController();
            $mail->SendEmailChangeRequest(Auth::user()->email, 'Change request in ProductManager', 
            'Hello, a request for changes has been made, which is pending approval, below are more details of the request', 'Product Prices' );
            $this->emit('renderPrice');
            $this->modalProduct=false;
        }

    }
    public function OpenModal(){ 
     

        if ($this->product->edit== 'in edition') {
            
            
            if ( $this->product->editor_id== Auth::user()->id) {
           
                $this->modalProduct=true;
          
            }
            $this->emit('renderPrice');
        }
        else{
            if ($this->product->edit!= 'Edited') {
                # code... 
                $this->product->edit= 'in edition';
            $this->product->editor_id= Auth::user()->id;
            $this->product->save();
            $this->modalProduct=true;
            $this->emit('renderPrice');
            }
            $this->emit('renderPrice');
      
           
        
        }
    }
    public function closeCancel(){
     
        $this->product->edit='Available';
        $this->product->editor_id= 0;
        $this->product->save();
        $this->modalProduct=false;
        $this->emit('renderPrice');
       
    }
}
