<?php

namespace App\Http\Livewire;

use App\Http\Controllers\MailController;
use App\Models\change;
use App\Models\inventory;
use App\Models\product;
use App\Models\product_price;
use App\Models\User;
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
        if ($this->change->status == 'in review') {

            if ($this->change->reviewer == Auth::user()->id) {

                $this->modalReview = true;
            }
            $this->emit('renderChanges');
        } else {
            if ($this->change->status != 'rejected') {
                $this->change->reviewer = Auth::user()->id;
                $this->change->status = 'in review';
                $this->change->save();
                $this->modalReview = true;
                $this->emit('renderChanges');
            }
            $this->emit('renderChanges');
        }
    }
    public function save()
    {
        $mail =  new MailController();
        // $changes is the var that contain all changes
        $changes = json_decode($this->change->changes);
        if ($this->change->table_name == 'product') {

            $product = product::where('id', $changes->id)->first();
            $product->title = $changes->title;
            $product->group_id = $changes->group_id;
            $product->store_id = $changes->store_id;
            $product->provider_id = $changes->provider_id;
            $product->description = $changes->description;
            $product->sku = $changes->sku;
            $editor =  User::where('id', $product->editor_id)->first();
            $product->edit = 'Available';
            $product->editor_id = 0;
            $product->save();
            $mail->SendApprovalChange($editor->email, 'Your changes in ProductManager have been approved ', 'The Changes you made in the ProductManager ' . $this->change->table_name . ' table have been approved');
            $this->change->delete();
            $this->emit('renderChanges');
        }
        //inventory changes
        if ($this->change->table_name == 'inventory') {

            $inventory = inventory::where('id', $changes->id)->first();
            $inventory->warehouses_id = $changes->warehouses_id;
            $inventory->stock = $changes->stock;
            $editor =  User::where('id', $inventory->editor_id)->first();
            $inventory->edit = 'Available';
            $inventory->editor_id = 0;
            $inventory->save();
            $mail->SendApprovalChange($editor->email, 'Your changes in ProductManager have been approved ', 'The Changes you made in the ProductManager ' . $this->change->table_name . ' table have been approved');
            $this->change->delete();
            $this->emit('renderChanges');
        }

        // price changes
        if ($this->change->table_name == 'price') {
            $price = product_price::where('id', $changes->id)->first();
            $price->price = $changes->price;
            $editor =  User::where('id', $price->editor_id)->first();
            $price->edit = 'Available';
            $price->editor_id = 0;
            $price->save();
            $mail->SendApprovalChange($editor->email, 'Your changes in ProductManager have been approved ', 'The Changes you made in the ProductManager ' . $this->change->table_name . ' table have been approved');
            $this->change->delete();
            $this->emit('renderChanges');
        }
    }
    public function Reject()
    {
        $mail =  new MailController();
        if ($this->change->table_name == 'product') {
            $productChange = json_decode($this->change->original);
            $product = product::where('id', $productChange->id)->first();
            $editor =  User::where('id', $product->editor_id)->first();
            $product->edit = 'Available';
            $product->editor_id= 0;
            $product->save();
            $mail->SendApprovalChange($editor->email, 'Your changes in ProductManager have been rejected ', 'The Changes you made in the ProductManager ' . $this->change->table_name . ' table have been rejected, please verify them');
            $this->change->delete();
            $this->modalReview = false;
            $this->emit('renderChanges');
        }
        if ($this->change->table_name == 'inventory') {
            $change = json_decode($this->change->original);
            $inventory= inventory::where('id', $change->id)->first();
            $editor =  User::where('id', $inventory->editor_id)->first();
            $inventory->edit = 'Available';
            $inventory->editor_id= 0;
            $inventory->save();
            $mail->SendApprovalChange($editor->email, 'Your changes in ProductManager have been rejected ', 'The Changes you made in the ProductManager ' . $this->change->table_name . ' table have been rejected, please verify them');
            $this->change->delete();
            $this->modalReview = false;
            $this->emit('renderChanges');
        }
        if ($this->change->table_name == 'price') {
            $change = json_decode($this->change->original);
            $price= product_price::where('id', $change->id)->first();
            $editor =  User::where('id', $price->editor_id)->first();
            $price->edit = 'Available';
            $price->editor_id= 0;
            $price->save();
            $mail->SendApprovalChange($editor->email, 'Your changes in ProductManager have been rejected ', 'The Changes you made in the ProductManager ' . $this->change->table_name . ' table have been rejected, please verify them');
            $this->change->delete();
            $this->modalReview = false;
            $this->emit('renderChanges');
        }
    }
    public function cancelChanges()
    {
        $this->change->status = 'pending';
        $this->change->save();
        $this->modalReview = false;
        $this->emit('renderChanges');
    }
}
