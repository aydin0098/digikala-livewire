@section('title','ویرایش زیردسته ')
@section('styles')
    <style>
        #default-breadcrumb .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
            content: ''!important;
        }
    </style>
@endsection
<div>
    @include('layouts.admin.includes.breadcrumb',['title'=> 'زیردسته ها','data' => [['title' => ' دسته ها','url' => url('admin/categories')],['title' => 'زیردسته ها','url' => url('admin/sub-categories')]]])
    <div class="row match-height">

        <div class="col-md-12 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">ویرایش زیردسته {{$subCategory->title}}</h4>
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
                                        <button type="submit" class=" btn btn-primary mr-1 mb-1 waves-effect waves-light">بروزرسانی</button>
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

