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
                    {{-- @php
                        $stock=0;
                        $assign=0;
                    @endphp
                    @if(!$brand->shoedetails == null)
                        @php $stock = $brand->shoedetails->totalstock @endphp
                    @endif
                    @if(!$brand->order == null)
                        @php $assign = $brand->order->saleStock @endphp
                        @endif --}}
                        @if($brand->stock !== Null)
                            <h3 class="no-margins">{{number_format($brand->stock->totalstock)}}</h3>
                            @else
                            <h3 class="no-margins">0</h3>
                        @endif
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
    
@endsection


{{-- Contact End --}}


