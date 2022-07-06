<?php

namespace App\Http\Livewire\Admin\ChildCategories;

use App\Models\ChildCategory;
use App\Models\Log;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public ChildCategory $childCategory;
    public $title;





    protected $rules = [
        'childCategory.title' => 'required',
        'childCategory.parent_id' => 'required',
        'childCategory.status' => 'nullable',
        'childCategory.en_name' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);


    }


    public function store()
    {
        $this->validate();

        $this->childCategory->update();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'بروزرسانی دسته کودک '.$this->childCategory->title,
            'actionType' => 'بروزرسانی'
        ]);
        $this->emit('toast','success','دسته کودک ویرایش شد');
        return redirect()->route('admin.childCat.index');

    }





    public function render()
    {
        $childCategory = $this->childCategory;
        return view('livewire.admin.child-categories.update',compact('childCategory'))->layout('layouts.admin');
    }
}
