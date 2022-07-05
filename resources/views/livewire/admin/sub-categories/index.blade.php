@section('title','زیردسته ها ')
@section('styles')
    <style>
        #default-breadcrumb .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
            content: ''!important;
        }
    </style>
@endsection
<div>
    @include('layouts.admin.includes.breadcrumb',['title'=> 'زیردسته ها','data' => [['title' => ' دسته ها','url' => url('admin/categories')],['title' => 'زیردسته ها','url' => url('admin/sub-categories')]]])
    <section id="default-breadcrumb">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="padding: 10px" class="badge badge-primary" href="{{route('admin.categories.index')}}">دسته ها</a></li>
                                    <li class="breadcrumb-item"><a style="padding: 10px" class="badge badge-primary" href="{{route('admin.subCat.index')}}">زیردسته ها</a></li>
                                    <li class="breadcrumb-item"><a style="padding: 10px" class="badge badge-primary" href="#">دسته های کودک</a></li>
                                    <li class="breadcrumb-item">
                                        <div style="position: absolute; top: 26%;margin-right: 18px">
                                            <form action="" >
                                                <input wire:model.debounce.1000="search" type="text" id="fname-icon" class="form-control" name="fname-icon" placeholder="جستجو دسته...">
                                            </form>

                                        </div>
                                    </li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row match-height">
        <div class="col-md-8 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">لیست زیردسته ها</h4>
                </div>
                <div class="card-content" wire:init="loadCategory">
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        @if($readyToLoad)
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                <tr>
                                                    <th scope="col">آیدی</th>
                                                    <th scope="col">نام دسته</th>
                                                    <th scope="col">نام لاتین دسته</th>
                                                    <th scope="col">دسته والد</th>
                                                    <th scope="col">وضعیت دسته</th>
                                                    <th scope="col">عملیات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $cat)
                                                    <tr>
                                                        <th scope="row">{{$cat->id}}</th>
                                                        <td>{{$cat->title}}</td>
                                                        <td>
                                                            @if($cat->en_name)
                                                                {{$cat->en_name}}
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td><span class="badge badge-info">{{$cat->categories->title}}</span></td>
                                                        <td>
                                                            @if($cat->status ==1)
                                                                <span wire:click="updateStatus({{$cat->id}})" class="badge badge-success">فعال</span>
                                                            @else
                                                                <span wire:click="updateStatus({{$cat->id}})" class="badge badge-danger">غیرفعال</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a wire:click="deleteCategory({{$cat->id}})" class="fa fa-trash"></a>
                                                            <a href="{{route('admin.subCat.update',$cat->id)}}" class="fa fa-edit"></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$categories->render()}}
                                        @else
                                            <div class="alert alert-warning" role="alert">
                                                <p class="mb-0">در حال بارگزاری اطلاعات...</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">زیر دسته جدید</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" wire:submit.prevent="store">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        @include('errors.error')
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>نام دسته</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="position-relative">
                                                    <input type="text" wire:model.lazy="subCategory.title" id="fname-icon" class="form-control" name="fname-icon" placeholder="نام دسته">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>نام لاتین دسته</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="position-relative">
                                                    <input type="text" wire:model.lazy="subCategory.en_name" id="email-icon" class="form-control" name="email-id-icon" placeholder="نام لاتین">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>دسته والد</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="position-relative">
                                                    <select wire:model.lazy="subCategory.category_id" class="form-control">
                                                        @foreach(\App\Models\Category::all() as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <fieldset>
                                            <div class="custom-control custom-checkbox">
                                                <input wire:model.lazy="subCategory.status" type="checkbox" class="custom-control-input" checked="" name="customCheck" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">فعال کردن دسته</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class=" btn btn-primary mr-1 mb-1 waves-effect waves-light">افزودن</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

