<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public Category $category;
    public $title;
    public $image;
    public $search;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $readyToLoad = false;


    public function mount()
    {
        $this->category = new Category();

    }


    public function loadCategory()
    {
        $this->readyToLoad = true;

    }

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
        if ($this->category->status)
        {
            $this->category->status = 1;
        }else{
            $this->category->status = 0;
        }

        if ($this->image)
        {
            $this->category->image = uploadImage('categories',$this->image);
        }



        $this->category->save();
        $this->emit('toast','success','دسته ایجاد شد');

        Log::create([
            'user_id' => auth()->user()->id,
            'url' => 'افزودن دسته '.$this->category->title,
            'actionType' => 'ایجاد'
        ]);

    }

    public function updateStatus($id)
    {
        $cat = Category::find($id);
        if ($cat->status==1)
        {
            $cat->update([
                'status' => 0
            ]);
            $this->emit('toast','success','دسته غیرفعال شد');
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'غیرفعال کردن دسته '.$this->category->title,
                'actionType' => 'غیرفعالسازی'
            ]);
        }else{
            $cat->update([
                'status' => 1
            ]);
            $this->emit('toast','success','دسته فعال شد');
            Log::create([
                'user_id' => auth()->user()->id,
                'url' => 'فعال کردن دسته '.$this->category->title,
                'actionType' => 'فعالسازی'
            ]);
        }

    }

    public function deleteCategory($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        $this->emit('toast','success','دسته به سطل زباله منتقل شد');
    }




    public function render()
    {
        $categories = $this->readyToLoad ? Category::where('title','LIKE',"%{$this->search}%")
            ->latest()->paginate(10):[];
        return view('livewire.admin.categories.index',compact('categories'))->layout('layouts.admin');
    }
}
