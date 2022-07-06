<?php

namespace App\Http\Livewire\Admin\Logs;

use App\Models\Category;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $readyToLoad = false;





    public function loadCategory()
    {
        $this->readyToLoad = true;

    }


    public function render()
    {
        $logs = $this->readyToLoad ? Log::where('actionType','LIKE',"%{$this->search}%")
            ->latest()->paginate(10):[];
        return view('livewire.admin.logs.index',compact('logs'))->layout('layouts.admin');
    }
}
