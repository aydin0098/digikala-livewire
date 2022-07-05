<div class="content-header row">
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-left mb-0">{{$title}}</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">پیشخوان</a>
                    </li>
                    @if(isset($data)&& is_array($data))
                        @if(isset($data)&& is_array($data))
                        @foreach($data as $key=>$value)
                    <li class="breadcrumb-item"><a href="{{$value['url']}}">{{$value['title']}}</a>
                    </li>
                        @endforeach
                    @endif
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
</div>
