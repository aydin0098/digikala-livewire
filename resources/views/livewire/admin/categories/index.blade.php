@section('title','دسته بندی ها ')
@section('styles')
    <style>
        #default-breadcrumb .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
            content: ''!important;
        }
    </style>
@endsection
<div>
    @include('layouts.admin.includes.breadcrumb',['title'=> 'دسته ها','data' => [['title' => ' دسته ها','url' => url('admin/categories')]]])
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
                                            <a style="padding: 10px" class="badge badge-danger" href="{{route('admin.categories.trashed')}}">سطل زباله ({{\App\Models\Category::onlyTrashed()->count()}})</a>
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
        <div class="col-md-7 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">لیست دسته های اصلی</h4>
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
                                                <th scope="col">تصویر دسته</th>
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
                                                <td>
                                                    @if($cat->image)
                                                        <img src="{{asset('storage')}}/{{$cat->image}}" width="50px">
                                                    @else
                                                    <img src="{{asset('back/no-image-product.png')}}" width="50px">
                                                    @endif
                                                </td>
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
                                                        <span wire:click="updateStatus({{$cat->id}})" class="badge badge-success">فعال</span>
                                                    @else
                                                        <span wire:click="updateStatus({{$cat->id}})" class="badge badge-danger">غیرفعال</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a wire:click="deleteCategory({{$cat->id}})" class="fa fa-trash"></a>
                                                    <a href="{{route('admin.categories.update',$cat->id)}}" class="fa fa-edit"></a>
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
        <div class="col-md-5 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">دسته جدید</h4>
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
                                                    <input type="text" wire:model.lazy="category.title" id="fname-icon" class="form-control" name="fname-icon" placeholder="نام دسته">
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
                                                    <input type="text" wire:model.lazy="category.en_name" id="email-icon" class="form-control" name="email-id-icon" placeholder="نام لاتین">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>تصویر دسته</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="custom-file">
                                                    <input wire:model.lazy="image" type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">انتخاب فایل</label>
                                                </div>
                                                <br>
                                                <span class="mt-2 text-danger" wire:loading wire:target="image">درحال اپلود عکس ...</span>
                                                <div style="display: none" wire:ignore id="progressbar" class="progress progress-bar-success progress-lg">
                                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div>
                                                </div>
                                            </div>
                                            @if($image)
                                                <img class="form-control" src="{{$image->temporaryUrl()}}" style="width: 200px; margin: auto; height: 200px">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <fieldset>
                                            <div class="custom-control custom-checkbox">
                                                <input wire:model.lazy="category.status" type="checkbox" class="custom-control-input" checked="" name="customCheck" id="customCheck1">
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
@section('scripts')
    <script>
        document.addEventListener('livewire:load', () => {
            let progressSection = document.querySelector('#progressbar'),
                progressBar = progressSection.querySelector('.progress-bar');

            document.addEventListener('livewire-upload-start', () => {
                console.log('شروع آپلود');
                progressSection.style.display = 'flex';
            });
            document.addEventListener('livewire-upload-finish', () => {
                console.log('اتمام آپلود');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-error', () => {
                console.log('ارور موقع آپلود');
                progressSection.style.display = 'none';
            });
            document.addEventListener('livewire-upload-progress', (event) => {
                console.log(`${event.detail.progress}%`);
                progressBar.style.width = `${event.detail.progress}%`;
                progressBar.textContent = `${event.detail.progress}%`;
            });

        });
    </script>
@endsection
