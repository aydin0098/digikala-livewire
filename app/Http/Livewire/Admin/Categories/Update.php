<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public Category $category;
    public $title;
    public $image;




    protected $rules = [
        'category.title' => 'required',
        'category.status' => 'nullable',
        'category.en_name' => 'nullable',
    ];

    public function updated($title)
    {
        $this->validateOnly($title);


    }


    public function store()
    {
        $this->validate();

        if ($this->image)
        {
            $this->category->image = updateImage('categories',$this->image,$this->category->image);
        }

        $this->category->update();
        $this->emit('toast','success','دسته ویرایش شد');
        return redirect()->route('admin.categories.index');

    }





    public function render()
    {
        $category = $this->category;
        return view('livewire.admin.categories.update',compact('category'))->layout('layouts.admin');
    }
}
