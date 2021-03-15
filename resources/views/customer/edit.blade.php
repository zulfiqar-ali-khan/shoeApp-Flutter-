@extends('layouts.admin')


{{-- For Title --}}
@section('title')  Users @endsection



{{-- Main Content --}}
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit User</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}">Home</a>
            </li>
            <li>
                <a>Users</a>
            </li>
            <li class="active">
                <strong>Edit User</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox float-e-margins">
                {{--  --}}
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>  
                    <div class="ibox-content">
                        <form role="form" id="form" action="{{route('user.update',$user->id)}}" method="POST">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                        <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                       
                                    </div>
                                </div>
    
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>  
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Select Role</label>
                                        <select name="role" id="" class="form-control" required>
                                            <option >--Select Role--</option>
                                            @foreach ( $roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>   

                            <div class="row">
                    
                                <div class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-primary btn-block">
                                                {{ __('Update') }}
                                            </button>
                                </div>
                                </div>
    
                            </div>

                        </form>
                       
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_code')

@endsection