@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('js')
<script src="{{ asset('assets/backend/assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('assets/backend/assets/js/components/datatables-init.js')}}"></script>
@endsection
@section('content')
<section class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Data Tables</h5>
                <div class="card-body">
                <center>
                <a href="{{ route('jenispaket.create') }}"
                class="la la-plus-circle btn btn-primary btn-rounded btn-outline">
                </a>
                </center><br>
                <table id="bs4-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>jenispaket</th>
                            <th>slug</th>
                            <th width="71px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jenispaket as $data)
                        <tr>
                        <td> {{ $data->nama_paket}} </td>
                        <td> {{ $data->slug }} </td>
                        <td>
                        <form action="{{ route('jenispaket.destroy',$data->id) }}" method="post">
                                {{ csrf_field() }}
                        <a href="{{ route('jenispaket.edit',$data->id) }}"
                            class="la la-pencil btn btn-info btn-rounded btn-outline">
                        </a>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="la la-trash btn btn-danger btn-rounded btn-outline" type="submit"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
