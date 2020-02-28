@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/assets/vendor/select2/select2.min.css')}}">
@endsection

@section('js')
    <script src="{{asset('assets/backend/assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/backend/assets/js/components/select2-init.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection

@section('content')
<section class="page-content container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                        <center>
                                <div class="card-header">Tambah dekorasi</div>
                            </center>

                            <div class="card-body">
                                <form action="{{route('dekorasi.update',$dekorasi->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                     <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input class="form-control{{ $errors->has('judul') ? ' has-error' : '' }}" type="text"
                                        name="judul" value="{{ $dekorasi->judul }}" required>
                                       @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        @if (isset($dekorasi) && $dekorasi->foto)
                                        <p>
                                           <img src="{{ asset('assets/img/dekorasi/'
                                           .$dekorasi->foto.'') }}"
                                           style="margin-top:15px;margin-bottom:15px;
                                           max-height:100px; border:1px; border-color:black;">
                                           </p>
                                         @endif
                                        <input class="form-control{{ $errors->has('foto') ? ' has-error' : '' }}" type="file"
                                        name="foto" id="" value="{{ $dekorasi->foto }}">
                                       @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group">
                                            <label for="">deskripsi</label>
                                            <textarea class="form-control{{ $errors->has('deskripsi') ? ' has-error' : '' }}" type="text"
                                            name="deskripsi" id="editor1" required>
                                            {{ $dekorasi->deskripsi }}
                                            </textarea>
                                           @if ($errors->has('deskripsi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('deskripsi') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-info btn-rounded btn-block">
                                            Simpan Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
