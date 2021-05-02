@extends('layouts.admin')


{{-- For Title --}}
@section('title')  Dashboard @endsection



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

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Order List</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-Brand">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Brand Name</th>
                                    <th>Color</th>
                                    <th>Artical</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    @foreach ($order->customer as $customer)
                                    <td>{{$customer->name}}</td>
                                    @endforeach

                                    @foreach ($order->brand as $item)
                                    <td>{{$item->brand_name}}</td>
                                    @endforeach

                                    @foreach ($order->shoedetails as $shoe)
                                    <td>{{$shoe->color}}</td>
                                    <td>{{$shoe->artical}}</td>
                                    @endforeach
                                    <td>{{$order->quantity}}</td>
                                    <td> @if($order->date == NULL)
                                        {{$order->created_at->format('d-m-Y')}}
                                    @else
                                        {{ date('d-m-Y', strtotime($order->date))}}
                                    @endif</td>
                                </tr>
                                    
                                @endforeach
                               
                        
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
    
@endsection


{{-- Contact End --}}


{{-- Java Script link --}}
@section('script')
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
@endsection
{{-- Java Script link end --}}