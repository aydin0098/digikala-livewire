<?php

namespace App\Http\Livewire\Admin\SubCategories;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public SubCategory $subCategory;
    public $title;
    public $search;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $readyToLoad = false;


    public function mount()
    {
        $this->subCategory = new SubCategory();

    }


    public function loadCategory()
    {
        $this->readyToLoad = true;

    }

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
        if ($this->subCategory->status)
        {
            $this->subCategory->status = 1;
        }else{
            $this->subCategory->status = 0;
        }




        $this->subCategory->save();
        $this->emit('toast','success','زیردسته ایجاد شد');

    }

    public function updateStatus($id)
    {
        $cat = SubCategory::find($id);
        if ($cat->status==1)
        {
            $cat->update([
                'status' => 0
            ]);
            $this->emit('toast','success','زیردسته غیرفعال شد');
        }else{
            $cat->update([
                'status' => 1
            ]);
            $this->emit('toast','success','زیردسته فعال شد');
        }

    }

    public function deleteCategory($id)
    {
        $cat = SubCategory::find($id);
        $cat->delete();
        $this->emit('toast','success','زیردسته به سطل زباله منتقل شد');
    }




    public function render()
    {
        $categories = $this->readyToLoad ? SubCategory::where('title','LIKE',"%{$this->search}%")
            ->latest()->paginate(10):[];
        return view('livewire.admin.sub-categories.index',compact('categories'))->layout('layouts.admin');
    }
}
