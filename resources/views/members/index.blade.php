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

<div class="row">
    <div class="col-lg-2">
        <a href="{{ route('members.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>
            Tambah Anggota</a>
    </div>
</div>
<br>

<div class="card">
    <div class="card-body">
        <h4 class="card-title">User List</h4>
        {{-- <p class="card-description"> Add class <code>.table-hover</code> </p> --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>NPM</th>
                    <th>Tempat Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr>
                    <td class="py-1">
                        @if($member->user->gambar)
                        <img src="{{url('storage/', $member->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                        @else
                        <img src="{{url('storage/gambar/default.png')}}" alt="image" style="margin-right: 10px;" />
                        @endif
                        <a href="{{route('members.show',['id' => $member->id])}}">{{$member->nama}}</a>
                    </td>
                    <td>{{$member->npm}}</td>
                    <td>{{$member->tempat_lahir}}</td>
                    <td>@if ($member->jk == 'L')
                        Laki-Laki
                        @else
                        Perempuan
                        @endif</td>
                    <td>@if ($member->prodi == 'TI')
                        Teknik Informatika
                        @elseif ($member->prodi == 'SI')
                        Sistem Informasi
                        @else
                        Lain-Lain
                        @endif</td>
                    <td>
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                <a class="dropdown-item" href="{{route('members.edit', ['id'=>$member->id])}}"> Edit
                                </a>
                                <form action="{{ route('members.destroy', ['id' => $member->id]) }}" class="pull-left"
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