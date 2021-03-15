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
    <div class="col-lg-2">
        <a class="btn btn-info btn-outline" data-toggle="modal" data-target="#myModal6" style="margin-top:40px;">Add Order</a>
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
                                    <th>Brand Name</th>
                                    <th>Color</th>
                                    <th>Artical</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    {{-- <th>Action</th> --}}
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
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                    {{-- <td>
                                        <div class="btn-group btn-group-xs">
                                            <a href="" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This..?')" title="Delete"><i class="fa fa-trash"></i></a>
                                            <a href="" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-primary" title="View Profile"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td> --}}
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




<div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Order</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('order.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Customer</label>
                                <select name="customer_id" class="form-control" id="">
                                    <option value="">--Select Customer--</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Brand</label>
                                <select name="brand_id" class="form-control" id="brand">
                                    <option value="">--Select Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Store</label>
                                <select name="store_id" class="form-control" id="store">
                                    <option value="">--Select Store--</option>
                                    @foreach ($stores as $store)
                                        <option value="{{$store->id}}">{{$store->store_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Shoe</label>
                                <select name="artical" class="form-control" id="shoes">
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Avalible Qty</label>
                                <input type="text" name="" class="form-control" readonly>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" name="quantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total Amount</label>
                                <input type="text" name="total_amount" class="form-control">
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit" class="btn btn-info  btn-block" name="submit" value="Save">
                    </div>
             
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>

    document.getElementById('brand').addEventListener('click',shoedetails);
  

    function shoedetails(){

        var brand = document.getElementById('brand').value;     

            $.ajaxSetup({

                headers:{
                    'X_CSRF_TOKEN':$('meta[name="csrf-token"]').attr('contant')
                }
            });

            $.ajax({
                type:"POST",
                url:'{{url("takeshoes")}}',
                data:{
                    brand_id:brand,
                    _token:'{{ csrf_token() }}'
                },
                success:function(data){
                    // console.log(data);
                    var html ='';
                    data.forEach(element => {
                      html +='<option value='+element.artical+'>'+element.artical+'</option>';
                    });

                    document.querySelector('#shoes').innerHTML=html;

                }
            });
    }

    // document.getElementById('shoes').addEventListener('click',stoke);
  

    // function stoke(){

    //     var store = document.getElementById('store').value;     
    //     var shoes = document.getElementById('shoes').value;     

    //         $.ajaxSetup({

    //             headers:{
    //                 'X_CSRF_TOKEN':$('meta[name="csrf-token"]').attr('contant')
    //             }
    //         });

    //         $.ajax({
    //             type:"POST",
    //             url:'{{url("takeshoes")}}',
    //             data:{
    //                 store:store,
    //                 shoes:shoes,
    //                 _token:'{{ csrf_token() }}'
    //             },
    //             success:function(data){
    //                 document.querySelector('#shoes').innerHTML=html;

    //             }
    //         });
    // }
</script>
    
@endsection