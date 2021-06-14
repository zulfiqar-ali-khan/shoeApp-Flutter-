@extends('layouts.admin')


{{-- For Title --}}
@section('title')  Orders @endsection



{{-- Main Content --}}
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Item List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a>Orders</a>
            </li>
            <li class="active">
                <strong>Item List</strong>
            </li>
        </ol>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Item List</h5>
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
                                    <th>Store Name</th>
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
                                    @foreach ($order->store as $store)
                                    <td>{{$store->store_name}}</td>
                                    @endforeach

                                    @foreach ($order->shoedetails as $shoe)
                                    <td>{{$shoe->color}}</td>
                                    <td>{{$shoe->artical}}</td>
                                    @endforeach
                                    <td>{{$order->quantity}}</td>
                                   <td>
                                        @if($order->date == NULL)
                                            {{$order->created_at->format('d-m-Y')}}
                                        @else
                                            {{ date('d-m-Y', strtotime($order->date))}}
                                        @endif
                                    </td>
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
