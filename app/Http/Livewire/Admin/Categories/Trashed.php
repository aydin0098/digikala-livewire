<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trashed extends Component
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




    public function loadCategory()
    {
        $this->readyToLoad = true;

    }




    public function deleteCategory($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        $this->emit('toast','success','دسته حذف شد');
    }

    public function restoreCategory($id)
    {
        $cat = Category::withTrashed()->where('id',$id)->first();
        $cat->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => ' بازیابی دسته '.$cat->title,
            'actionType' => 'بازیابی'
        ]);
        $this->emit('toast','success','دسته بازیابی شد');
    }




    public function render()
    {
        $categories = $this->readyToLoad ? DB::table('categories')->whereNotNull('deleted_at')
            ->where('title','LIKE',"%{$this->search}%")
            ->latest()->paginate(10):[];
        return view('livewire.admin.categories.trashed',compact('categories'))->layout('layouts.admin');
    }
}
