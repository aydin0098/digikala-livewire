@section('title','گزارشات سیستم ')
@section('styles')
    <style>
        #default-breadcrumb .breadcrumb .breadcrumb-item+.breadcrumb-item:before{
            content: ''!important;
        }
    </style>
@endsection
<div>
    @include('layouts.admin.includes.breadcrumb',['title'=> 'گزارشات سیستم','data' => [['title' => ' گزارشات سیستم','url' => url('admin/logs')]]])
    <section id="default-breadcrumb">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex">
                                        <div style="margin-right: 18px">
                                            <form action="" >
                                                <input wire:model.debounce.1000="search" type="text" id="fname-icon" class="form-control" name="fname-icon" placeholder="جستجو گزارش...">
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
        <div class="col-md-12 col-12">
            <div class="card" style="height: auto">
                <div class="card-header">
                    <h4 class="card-title">گزارشات سیستم</h4>
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
                                                    <th scope="col">کاربر</th>
                                                    <th scope="col">لینک</th>
                                                    <th scope="col">وضعیت</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($logs as $log)
                                                    <tr>
                                                        <th scope="row">{{$log->id}}</th>
                                                        <td>{{$log->users->name}}</td>
                                                        <td>
                                                            {{$log->url}}
                                                        </td>
                                                        <td>
                                                            @if($log->actionType == 'ایجاد')
                                                                <span class="badge badge-success">ایجاد</span>
                                                            @elseif($log->actionType == 'حذف')
                                                                <span class="badge badge-danger">حذف</span>
                                                            @elseif($log->actionType == 'بروزرسانی')
                                                                <span class="badge badge-info">بروزرسانی</span>
                                                            @elseif($log->actionType == 'فعالسازی')
                                                                <span class="badge badge-primary">فعالسازی</span>
                                                            @elseif($log->actionType == 'غیرفعالسازی')
                                                                <span class="badge badge-light">غیرفعالسازی</span>
                                                            @elseif($log->actionType == 'بازیابی')
                                                                <span class="badge badge-warning">بازیابی</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$logs->render()}}
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

