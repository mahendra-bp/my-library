@extends('layouts.global')
@section('title') Edit User @endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<form action="{{route('users.update', ['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit user</h4>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $user->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-md-4 control-label">Username</label>
                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username"
                                        value="{{ $user->username }}" required readonly="">
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ $user->email }}" required readonly="">
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Gambar</label>
                                <div class="col-md-6">
                                    <img class="product" width="200" height="200" @if($user->gambar)
                                    src="{{ asset('storage/'.$user->gambar) }}"
                            @else
                            No avatar
                            @endif />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="gambar" class="col-md-4 control-label"></label>
                        <br>
                        <div class="col-md-6">
                            Current gambar:
                            <br>
                            @if($user->gambar)
                            <img class="product" src="{{asset('storage/'.$user->gambar)}}" width="200px" />
                            <br>
                            @else
                            No gambar
                            @endif
                            <br> <input type="file" class="uploads form-control" style="margin-top: 20px;"
                                name="gambar">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                            <hr class="my-3">
                        </div>

                    </div>


                    <div class="form-group{{$errors->has('level') ? ' has-error' : '' }}">
                        <label for="level" class="col-md-4 control-label">Level</label>
                        <div class="col-md-6">
                            <select class="form-control" name="level" required="">
                                <option value=""></option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>

                    @if(Auth::user()->level == 'admin')
                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                        <label for="level" class="col-md-4 control-label">Level</label>
                        <div class="col-md-6">
                            <select class="form-control" name="level" required="">
                                <option value="admin" @if($user->level == 'admin') selected @endif>Admin
                                </option>
                                <option value="user" @if($user->level == 'user') selected @endif>User</option>
                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" onkeyup='check();'
                                name="password">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="confirm_password" type="password" onkeyup="check()" class="form-control"
                                name="password_confirmation">
                            <span id='message'></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit">
                        Update
                    </button>
                    <a href="{{route('users.index')}}" class="btn btn-light pull-right">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
</form>
@endsection