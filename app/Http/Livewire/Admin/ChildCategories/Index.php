<?php

namespace App\Http\Livewire\Admin\ChildCategories;

use App\Models\childCategory;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public ChildCategory $childCategory;
    public $title;
    public $search;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $readyToLoad = false;


    public function mount()
    {
        $this->childCategory = new childCategory();

    }


    public function loadCategory()
    {
        $this->readyToLoad = true;

    }

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
        if ($this->childCategory->status)
        {
            $this->childCategory->status = 1;
        }else{
            $this->childCategory->status = 0;
        }




        $this->childCategory->save();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دسته کودک '.$this->childCategory->title,
            'actionType' => 'ایجاد'
        ]);
        $this->emit('toast','success','دسته کودک ایجاد شد');

    }

    public function updateStatus($id)
    {
        $cat = ChildCategory::find($id);
        if ($cat->status==1)
        {
            $cat->update([
                'status' => 0
            ]);
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'غیرفعالسازی دسته کودک '.$this->childCategory->title,
                'actionType' => 'غیرفعالسازی'
            ]);
            $this->emit('toast','success','دسته کودک غیرفعال شد');
        }else{
            $cat->update([
                'status' => 1
            ]);
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'فعالسازی دسته کودک '.$this->childCategory->title,
                'actionType' => 'فعالسازی'
            ]);
            $this->emit('toast','success','دسته کودک فعال شد');
        }

    }

    public function deleteCategory($id)
    {
        $cat = ChildCategory::find($id);
        $cat->delete();
        $this->emit('toast','success','دسته کودک به سطل زباله منتقل شد');
    }




    public function render()
    {
        $categories = $this->readyToLoad ? ChildCategory::where('title','LIKE',"%{$this->search}%")
            ->latest()->paginate(10):[];
        return view('livewire.admin.child-categories.index',compact('categories'))->layout('layouts.admin');
    }
}
