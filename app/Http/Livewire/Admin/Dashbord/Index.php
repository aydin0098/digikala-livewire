<?php

namespace App\Http\Livewire\Admin\Dashbord;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dashbord.index')->layout('layouts.admin');
    }
}
