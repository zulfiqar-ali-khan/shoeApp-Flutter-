@extends('layouts.admin')


{{-- For Title --}}
@section('title')  Orders @endsection



{{-- Main Content --}}
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Order List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a>Orders</a>
            </li>
            <li class="active">
                <strong>Order List</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 ">
        <a class="btn btn-info btn-outline" href="{{route('orderinv.create')}}" style="margin-top:40px;">Add Order</a>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
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
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Contact #</th>
                                    <th>Total Amount</th>
                                    <th>Inv #</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orderinvs !== '')
                                    @foreach ($orderinvs as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->customer[0]->name}}</td>
                                            <td>{{$item->customer[0]->contact}}</td>
                                            <td>{{$item->total_amount}}</td>
                                            <td>{{$item->inv}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>
                                                <a href="{{route('orderinv.show',$item->id)}}" onclick="return confirm('Are You Sure To Delete This..?')" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                                <a href="{{url('orderinvdelete',$item->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                               
                               
                        
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
