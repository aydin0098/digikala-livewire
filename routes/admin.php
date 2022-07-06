<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Livewire\Admin\Dashbord\Index::class)->name('admin.index');
//Admin Categories
Route::get('/categories',\App\Http\Livewire\Admin\Categories\Index::class)->name('admin.categories.index');
Route::get('/categories/{category}/update',\App\Http\Livewire\Admin\Categories\Update::class)->name('admin.categories.update');
Route::get('/categories/trashed',\App\Http\Livewire\Admin\Categories\Trashed::class)->name('admin.categories.trashed');
//Admin SubCategories
Route::get('/sub-categories',\App\Http\Livewire\Admin\SubCategories\Index::class)->name('admin.subCat.index');
Route::get('/sub-categories/{subCategory}/update',\App\Http\Livewire\Admin\SubCategories\Update::class)->name('admin.subCat.update');
Route::get('/sub-categories/trashed',\App\Http\Livewire\Admin\SubCategories\Trashed::class)->name('admin.subCat.trashed');
//Admin ChildCategories
Route::get('/child-categories',\App\Http\Livewire\Admin\ChildCategories\Index::class)->name('admin.childCat.index');
Route::get('/child-categories/{childCategory}/update',\App\Http\Livewire\Admin\ChildCategories\Update::class)->name('admin.childCat.update');
Route::get('/child-categories/trashed',\App\Http\Livewire\Admin\ChildCategories\Trashed::class)->name('admin.childCat.trashed');
//Admin Logs
Route::get('/logs',\App\Http\Livewire\Admin\Logs\Index::class)->name('admin.log.index');
