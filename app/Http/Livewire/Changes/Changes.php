<?php

namespace App\Http\Livewire\Changes;

use App\Models\change;
use Livewire\Component;

class Changes extends Component
{
    protected $listeners = ['renderChanges'=>'render'];
    public function render()
    {
        $changes= change::with(['user'])->get();
        return view('livewire.changes.changes', compact('changes'));
    }
}
