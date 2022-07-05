<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Livewire\Admin\Dashbord\Index::class)->name('admin.index');
//Admin Categories
Route::get('/categories',\App\Http\Livewire\Admin\Categories\Index::class)->name('admin.categories.index');
Route::get('/categories/{category}/update',\App\Http\Livewire\Admin\Categories\Update::class)->name('admin.categories.update');
//Admin SubCategories
Route::get('/sub-categories',\App\Http\Livewire\Admin\SubCategories\Index::class)->name('admin.subCat.index');
Route::get('/sub-categories/{subCategory}/update',\App\Http\Livewire\Admin\SubCategories\Update::class)->name('admin.subCat.update');
