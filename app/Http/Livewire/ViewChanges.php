<?php

namespace App\Http\Livewire;

use App\Models\change;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewChanges extends Component
{
    public $change;

    public $modalReview = false;

    public function mount(change $change)
    {
        $this->change = $change;
    }
    public function render()
    {
        $original = json_decode($this->change->original);
        $ChangedAtt = json_decode($this->change->changes);
        

        return view('livewire.view-changes', compact(['original', 'ChangedAtt']));
    }
    public function openModalR()
    {
        if ($this->change->status== 'in review') {
            
            if ( $this->change->reviewer== Auth::user()->id) {
           
                $this->modalReview=true;
          
            }
            $this->emit('renderChanges');
        }else{
            if ($this->change->status!='rejected') {
                $this->change->reviewer = Auth::user()->id;
                $this->change->status= 'in review';
                $this->change->save();
                $this->modalReview=true;
                $this->emit('renderChanges');

            }
            $this->emit('renderChanges');
        }
    }
    public function save(){
        if($this->change->table_name=='product'){
            $changes= json_decode($this->change->changes);
            $product = product::where('id',$changes->id)->first();
            $product->title= $changes->title;
            $product->group_id= $changes->group_id;
            $product->store_id= $changes->store_id;
            $product->provider_id= $changes->provider_id;
            $product->description= $changes->description;
            $product->sku= $changes->sku;
            $product->edit='Available';
            $product->editor_id=0;
            $product->save();
            $this->change->delete();
            $this->emit('renderChanges');

        }
    }
    public function Reject(){
        $productChange= json_decode($this->change->original);
        $product= product::where('id', $productChange->id)->first();
        $product->edit='Available';
        $product->save();
        $this->change->delete();
        $this->modalReview = false;
        $this->emit('renderChanges');
    }
    public function cancelChanges(){
        $this->change->status = 'pending';
        $this->change->save();
        $this->modalReview = false;
        $this->emit('renderChanges');

    }
}
