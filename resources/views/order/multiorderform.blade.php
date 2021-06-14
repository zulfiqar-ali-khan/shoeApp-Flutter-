@extends('layouts.admin')


{{-- For Title --}}
@section('title') Orders @endsection



{{-- Main Content --}}
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-4">
        <h2>Add Order</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a>Orders</a>
            </li>
            <li class="active">
                <strong>Add Order</strong>
            </li>
        </ol>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Order</h5>
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

                    <form action="{{route('orderinv.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
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

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Total Amount</label>
                                    <input type="text" name="total_amount" class="form-control">
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Store</th>
                                            <th>Brand</th>
                                            <th>Artical</th>
                                            <th colspan="2">Quanity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <select name="store_id[]" class="form-control" id="store">
                                                        <option value="">--Select Store--</option>
                                                        @foreach ($stores as $store)
                                                            <option value="{{$store->id}}">{{$store->store_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select name="brand_id[]" class="form-control brand">
                                                        <option value="">--Select Brand--</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="form-group">
                                                    <select name="shoe_id[]" class="form-control shoe">
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="quantity[]" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger btn-sm removetr"><i class="fa fa-times"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm addrow"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for=""></label>
                            <input type="submit" class="btn btn-info  btn-block" name="submit" value="Save">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

<script>

    // document.querySelector('.addrow').addEventListener('click', addtr);

    // function addtr(){
        //     document.querySelector('tbody').innerHTML = str;
        // }
        
        $(document).ready(function(){

            const str = '<tr><td><div class="form-group"><select name="store_id[]" class="form-control" id="store"><option value="">--Select Store--</option> @foreach ($stores as $store)<option value="{{$store->id}}">{{$store->store_name}}</option> @endforeach </select></div></td><td><div class="form-group">    <select name="brand_id[]" class="form-control brand"><option value="">--Select Brand--</option>        @foreach ($brands as $brand) <option value="{{$brand->id}}">{{$brand->brand_name}}</option> @endforeach </select></div></td><td width="200"><div class="form-group">    <select name="shoe_id[]" class="form-control shoe"></select></div></td><td><div class="form-group">    <input type="text" name="quantity[]" class="form-control"></div></td><td><div class="form-group"><button type="button" class="btn btn-danger btn-sm removetr"><i class="fa fa-times"></i></button></div></td></tr>';
            $('.addrow').click(function(){
                $('tbody').append(str);

                // Remove Row
                    $(".removetr").click(function(){
                        $(this).closest('tr').remove();
                    });
            });


            $("body").on("change keyup","td .brand",function(){
                calcluateRow($(this).parents('tr'));
            });

            function calcluateRow(row){

                var brand = row.find('.brand').val();

                $.ajaxSetup({

                    headers: {
                        'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('contant')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{{url("takeshoes")}}',
                    data: {
                        brand_id: brand,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        // console.log(data);
                        var html = '';
                        data.forEach(element => {
                            html += '<option value=' + element.id + '>' + element.artical + ' / ' + element
                                .color + '</option>';
                        });
                        row.find('.shoe').html(html);

                    }
                });

            }




        });




    // document.getElementById('brand').addEventListener('click', shoedetails);


    // function shoedetails() {

    //     var brand = document.getElementById('brand').value;

    //     $.ajaxSetup({

    //         headers: {
    //             'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('contant')
    //         }
    //     });

    //     $.ajax({
    //         type: "POST",
    //         url: '{{url("takeshoes")}}',
    //         data: {
    //             brand_id: brand,
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success: function (data) {
    //             // console.log(data);
    //             var html = '';
    //             data.forEach(element => {
    //                 html += '<option value=' + element.id + '>' + element.artical + ' / ' + element
    //                     .color + '</option>';
    //             });

    //             document.querySelector('#shoes').innerHTML = html;

    //         }
    //     });
    // }

</script>

@endsection
