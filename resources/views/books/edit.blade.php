@section('js')

<script type="text/javascript">
    $(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
    function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
</script>
@stop

@extends('layouts.global')

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Buku <b>{{$book->judul}}</b> </h4>
                            <form class="forms-sample">
                                <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                                    <label for="judul" class="col-md-4 control-label">Judul</label>
                                    <div class="col-md-6">
                                        <input id="judul" type="text" class="form-control" name="judul"
                                            value="{{ $book->judul }}" required>
                                        @if ($errors->has('judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
                                    <label for="isbn" class="col-md-4 control-label">ISBN</label>
                                    <div class="col-md-6">
                                        <input id="isbn" type="text" class="form-control" name="isbn"
                                            value="{{ $book->isbn }}" required>
                                        @if ($errors->has('isbn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('isbn') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pengarang') ? ' has-error' : '' }}">
                                    <label for="pengarang" class="col-md-4 control-label">Pengarang</label>
                                    <div class="col-md-6">
                                        <input id="pengarang" type="text" class="form-control" name="pengarang"
                                            value="{{ $book->pengarang }}" required>
                                        @if ($errors->has('pengarang'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pengarang') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                                    <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                                    <div class="col-md-6">
                                        <input id="penerbit" type="text" class="form-control" name="penerbit"
                                            value="{{ $book->penerbit }}" required>
                                        @if ($errors->has('penerbit'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('penerbit') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                                    <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                                    <div class="col-md-6">
                                        <input id="tahun_terbit" type="number" maxlength="4" class="form-control"
                                            name="tahun_terbit" value="{{ $book->tahun_terbit }}" required>
                                        @if ($errors->has('tahun_terbit'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                                    <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                                    <div class="col-md-6">
                                        <input id="jumlah_buku" type="number" maxlength="4" class="form-control"
                                            name="jumlah_buku" value="{{ $book->jumlah_buku }}" required>
                                        @if ($errors->has('jumlah_buku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                                    <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                                    <div class="col-md-12">
                                        <input id="deskripsi" type="text" class="form-control" name="deskripsi"
                                            value="{{ $book->deskripsi }}">
                                        @if ($errors->has('deskripsi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                                    <label for="lokasi" class="col-md-4 control-label">Lokasi</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="lokasi" required="">
                                            <option value="rak1" {{$book->lokasi === "rak1" ? "selected" : ""}}>Rak 1
                                            </option>
                                            <option value="rak2" {{$book->lokasi === "rak2" ? "selected" : ""}}>Rak 2
                                            </option>
                                            <option value="rak3" {{$book->lokasi === "rak3" ? "selected" : ""}}>Rak 3
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">Cover</label>
                                    <div class="col-md-6">
                                        <img width="200" height="200" @if($book->cover)
                                        src="{{ asset('storage/'.$book->cover) }}" @endif />
                                        <input type="file" class="uploads form-control" style="margin-top: 20px;"
                                            name="cover">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                                </button>
                                <button class="btn btn-light pull-right"><a href="{{route('books')}}">Back</a></button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection