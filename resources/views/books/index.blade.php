@section('js')
<script type="text/javascript">
    $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.global')
@section('title')

@endsection
@section('content')

<div class="row">
    @if (Auth::user()->level == 'admin')
    <div class="col-lg-2">
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>
            Tambah Buku</a>
    </div>
    @endif


    {{-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <form action="{{ url('import_buku') }}" method="post" class="form-inline" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="input-group {{ $errors->has('importBuku') ? 'has-error' : '' }}">
        <input type="file" class="form-control" name="importBuku" required="">

        <span class="input-group-btn">
            <button type="submit" class="btn btn-success" style="height: 38px;margin-left: -2px;">Import</button>
        </span>
    </div>
    </form>
</div> --}}

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
</div>

<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title pull-left">Data Buku</h4>
                @if (Auth::user()->level == 'admin')
                <a href="{{url('format_buku')}}" class="btn btn-xs btn-info pull-right">Format Buku</a>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>ISBN</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Stok</th>
                                <th>Rak</th>
                                @if (Auth::user()->level == 'admin')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                            <tr>
                                <td class="py-1">
                                    @if($book->cover)
                                    <img src="{{url('storage/'. $book->cover)}}" alt="image"
                                        style="margin-right: 10px;" />
                                    @else
                                    <img src="{{url('images/buku/default.png')}}" alt="image"
                                        style="margin-right: 10px;" />
                                    @endif
                                    <a href="{{route('books.show', $book->id)}}">
                                        {{$book->judul}}
                                    </a>
                                </td>
                                <td>{{$book->isbn}}</td>

                                <td>{{$book->pengarang}}</td>
                                <td>{{$book->penerbit}}</td>
                                <td>
                                    {{$book->tahun_terbit}}
                                </td>
                                <td>
                                    {{$book->jumlah_buku}}
                                </td>
                                <td>
                                    {{$book->lokasi}}
                                </td>
                                @if (Auth::user()->level == 'admin')
                                <td>
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="{{route('books.edit', $book->id)}}"> Edit
                                            </a>
                                            <form action="{{route('books.destroy',['id' => $book->id])}}"
                                                class="pull-left" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--  {!! $datas->links() !!} --}}
            </div>
        </div>
    </div>
</div>
@endsection