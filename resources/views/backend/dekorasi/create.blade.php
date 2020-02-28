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
                                <div class="card-header">Tambah Data Paket</div>
                            </center>

                                <div class="card-body">
                                <form action="{{route('dekorasi.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input class="form-control{{ $errors->has('judul') ? ' has-error' : '' }}" type="text"
                                        name="judul" id="" required>
                                       @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                                    </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input class="form-control{{ $errors->has('foto') ? ' has-error' : '' }}" type="file"
                                        name="foto" id="" required>
                                       @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                                    </div>


                                        </select>
                                        @if ($errors->has('dekorasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dekorasi') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                    <div class="form-group">
                                            <label for="">Deskripsi</label>
                                            <textarea class="form-control{{ $errors->has('deskripsi') ? ' has-error' : '' }}" type="text"
                                            name="deskripsi" id="editor1" required>
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
