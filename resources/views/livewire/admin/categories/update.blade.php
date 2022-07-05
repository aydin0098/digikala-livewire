@section('title','ویرایش دسته ')
@section('styles')
    <style>
        #default-breadcrumb .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
            content: ''!important;
        }
    </style>
@endsection
<div>
    @include('layouts.admin.includes.breadcrumb',['title'=> 'دسته ها','data' => [['title' => ' دسته ها','url' => url('admin/categories')]]])
    <div class="row match-height">

        <div class="col-md-6 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">ویرایش دسته {{$category->title}}</h4>
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
