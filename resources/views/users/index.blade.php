@extends('layouts.global')
@section('title')
User List
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <h4 class="card-title">User List</h4>
        {{-- <p class="card-description"> Add class <code>.table-hover</code> </p> --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="py-1">@if($user->gambar)
                        <img src="{{url('storage/', $user->gambar)}}" alt="image" style="margin-right: 10px;" />
                        @else
                        <img src="{{url('storage/gambar/default.png')}}" alt="image" style="margin-right: 10px;" />

                        @endif<a href="{{route('users.show', ['id' => $user->id])}}">
                            {{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                <a class="dropdown-item" href="{{route('users.edit', ['id'=>$user->id])}}"> Edit </a>
                                <form action="{{ route('users.destroy', ['id'=>$user->id]) }}" class="pull-left"
                                    method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="dropdown-item"
                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                                    </button>
                                </form>

                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection