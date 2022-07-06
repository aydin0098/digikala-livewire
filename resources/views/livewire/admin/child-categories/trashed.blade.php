@section('title','سطل زباله ')
@section('styles')
    <style>
        #default-breadcrumb .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
            content: ''!important;
        }
    </style>
@endsection
<div>
    @include('layouts.admin.includes.breadcrumb',['title'=> 'زیردسته ها','data' => [['title' => ' دسته ها','url' => url('admin/categories')],['title' => 'دسته های کودک','url' => url('admin/child-categories')]]])
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
                                    <li class="breadcrumb-item"><a style="padding: 10px" class="badge badge-primary" href="{{route('admin.childCat.index')}}">دسته های کودک</a></li>
                                    <li class="breadcrumb-item d-flex">
                                        <div style="margin-right: 18px">
                                            <form action="" >
                                                <input wire:model.debounce.1000="search" type="text" id="fname-icon" class="form-control" name="fname-icon" placeholder="جستجو دسته...">
                                            </form>

                                        </div>
                                    </li>
                                    <li class="breadcrumb-item" style="position: absolute;left: 13px;top: 30%">
                                        <a style="padding: 10px" class="badge badge-danger" href="{{route('admin.childCat.trashed')}}">سطل زباله ({{\App\Models\ChildCategory::onlyTrashed()->count()}})</a>
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
        <div class="col-md-12 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">سطل زباله دسته های کودک</h4>
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
                                                        <td>
                                                            @if($cat->status ==1)
                                                                <span  class="badge badge-success">فعال</span>
                                                            @else
                                                                <span  class="badge badge-danger">غیرفعال</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a wire:click="deleteCategory({{$cat->id}})" class="fa fa-trash"></a>
                                                            <a wire:click="restoreCategory({{$cat->id}})" class="fa fa-refresh"></a>
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
    </div>
</div>
