@extends('layouts.admin')


{{-- For Title --}}
@section('title') Store @endsection



{{-- Main Content --}}
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-4">
        <h2>Add Store</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a>Store</a>
            </li>
            <li class="active">
                <strong>Add Store</strong>
            </li>
        </ol>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-8 col-md-offset-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Store</h5>
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

                    <form action="{{route('stock.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input  type="date" name="date" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Select Store</label>
                                    <select name="store_id" class="form-control" id="">
                                        <option value="">--Select Store--</option>
                                        @foreach ($stores as $store)
                                            <option value="{{$store->id}}">{{$store->store_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
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

                           
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>Artical</th>
                                            <th>Quanity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td width="300">
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
                                        </tr> --}}
                                    </tbody>
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

    document.getElementById('brand').addEventListener('change',shoedetails);
  

    function shoedetails(){
        var brand = document.getElementById('brand').value;     

            $.ajaxSetup({

                headers:{
                    'X_CSRF_TOKEN':$('meta[name="csrf-token"]').attr('contant')
                }
            });

            $.ajax({
                type:"POST",
                url:'{{url("takeshoesstock")}}',
                data:{
                    brand_id:brand,
                    _token:'{{ csrf_token() }}'
                },
                success:function(data){
                    // console.log(data);
                    var html ='';
                    data.forEach(element => {
                    //   html +='<option value='+element.id+'>'+element.artical+' / '+element.color+'</option>';
                      html +=' <tr><td width="300"><div class="form-group"><select name="shoe_id[]" class="form-control"><option value='+element.id+'>'+element.artical+' / '+element.color+'</option></select> </div></td><td><div class="form-group"><input type="text" name="quantity[]" class="form-control" value="0"></div> </td> </tr>';
                    });

                    document.querySelector('table tbody').innerHTML=html;

                }
            });
    }

</script>
    
@endsection