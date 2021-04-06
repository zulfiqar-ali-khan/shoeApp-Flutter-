@extends('layouts.admin')


{{-- For Title --}}
@section('title')  Artical Stock @endsection



{{-- Main Content --}}
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Artical Stock</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a>Artical Stock</a>
            </li>
            <li class="active">
                <strong>Artical Stock</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Artical Stock</h5>
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
                                    {{-- <th>Image</th> --}}
                                    <th>Artical</th>
                                    <th>Color</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articals as $key => $artical)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    @foreach ($artical->shoedetails as $shoe)
                                        <td>{{$shoe->artical}}</td>
                                        <td>{{$shoe->color}}</td>
                                    @endforeach
                                    
                                    <td>
                                        {{$artical->articalStock}}
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

@section('script_code')
    
@endsection