<?php

namespace App\Http\Livewire\Admin\SubCategories;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Log;
use App\Models\SubCategory;
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
        $cat = SubCategory::find($id);
        $cat->delete();
        $this->emit('toast','success','زیردسته حذف شد');
    }

    public function restoreCategory($id)
    {
        $cat = SubCategory::withTrashed()->where('id',$id)->first();
        $cat->restore();
        Log::create([
            'user_id' => auth()->user()->id,
            'url' => ' بازیابی زیردسته  '.$cat->title,
            'actionType' => 'بازیابی'
        ]);
        $this->emit('toast','success','زیردسته بازیابی شد');
    }




    public function render()
    {
        $categories = $this->readyToLoad ? DB::table('sub_categories')->whereNotNull('deleted_at')
            ->where('title','LIKE',"%{$this->search}%")
            ->latest()->paginate(10):[];
        return view('livewire.admin.sub-categories.trashed',compact('categories'))->layout('layouts.admin');
    }
}
