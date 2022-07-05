<?php

namespace App\Http\Livewire\Admin\SubCategories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public SubCategory $subCategory;
    public $title;





    protected $rules = [
        'subCategory.title' => 'required',
        'subCategory.category_id' => 'required',
        'subCategory.status' => 'nullable',
        'subCategory.en_name' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);


    }


    public function store()
    {
        $this->validate();

        $this->subCategory->update();
        $this->emit('toast','success','زیردسته ویرایش شد');
        return redirect()->route('admin.subCat.index');

    }





    public function render()
    {
        $subCategory = $this->subCategory;
        return view('livewire.admin.sub-categories.update',compact('subCategory'))->layout('layouts.admin');
    }
}
