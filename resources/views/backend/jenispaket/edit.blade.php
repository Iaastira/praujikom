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

                       <div class="card-header">Edit Data Paket</div>

                <div class="card-body">
                <form action="{{ route('jenispaket.update',$jenispaket->id) }}" method="post">
                <input type="hidden" name="_method" value="PATCH">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Jenis_Paket</label>
                    <input class="form-control" type="text" value="{{ $jenispaket->nama_paket }}" name="nama_paket">
                </div>
                <div class="form-group">
                    <label for="">Jenis Paket</label>
                    <input class="form-control{{ $error ->has('nama_paket') ? 'has-error' : '' }}" type="text"
                    name="nama_paket" value="{{ $jenispaket ->nama_paket}}" required>
                    @if ( $errors->first('nama_paket'))
                    <span class="help-block">
                        <strong>{{ $error->first('nama_paket') }}</strong>
                    </span>
                    @endif
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
