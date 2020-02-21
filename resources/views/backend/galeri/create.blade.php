@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                     @if (session ('status'))
                     <div class="alert alert-success" role="alert">
                          {{session('status') }}
                     </div>
                     @endif

                       <div class="card-header">Tambah Data Jenis Paket</div>

                <div class="card-body">
                <form action="{{ route('jenispaket.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Nama </label>
                    <input class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" type="text" name="nama_jenispaket">
                    @if ($errors->has('nama_jenispaket'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nama_jenispaket') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="la la-send btn btn-info btn-rounded btn-outline">
                    </button>
                 </div>
                 <form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
