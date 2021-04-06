@extends('layouts.admin')


{{-- For Title --}}
@section('title')  Store  @endsection



{{-- Main Content --}}
@section('content')
<div class="wrapper wrapper-content">

    <div class="row">
        @foreach ($brands as $brand)
                
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Avalible Stock</span>
                    <h5>{{$brand->brand_name}}</h5>
                </div>
                <div class="ibox-content">
                        @if($brand->stock !== Null)
                            <h3 class="no-margins">{{number_format($brand->stock->totalstock)}}</h3>
                            @else
                            <h3 class="no-margins">0</h3>
                        @endif
                        <br>
                    <a href="{{route('articalstock',['store' => $store->id,'brand' => $brand->id])}}" class="btn btn-info btn-xs">Artical Record</a></a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
    
@endsection


{{-- Contact End --}}


