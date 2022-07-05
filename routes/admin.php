<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Livewire\Admin\Dashbord\Index::class)->name('admin.index');
