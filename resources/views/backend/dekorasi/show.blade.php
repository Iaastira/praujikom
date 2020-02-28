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
							<div class="col">
								<div class="tab-content">
									<div class="tab-pane fadeIn active" id="tab-1">
										<div class="card">
											<h5 class="card-header">Show </h5>
											 <i class ="zmdi zmdi-badge-check-zmdi-hc-fw"></i>


												</b>
											</h5>
											<div class ="card-body">
												<img src="{{ asset('assets/img/dekorasi/' .$dekorasi->foto.'') }}"
												style="width:300px;" class="float-left rounded m-r-30 m-b-30">
												<p>{!! $dekorasi->deskripsi !!}</p>
												<br>
												<p>
												   Tanggal : {{ $dekorasi->created_at->format('d M Y H:i') }}WIB
												</p>
												<p>
                                                <a href="{{route('dekorasi.index')}}"
												   class="btn btn-outline btn-block btn-rounded btn-info">
												       <i class="la la-paper-plane"></i>Home<i
													   class="zmdi zmdi-airplane zmdi-hc-fw"></i>
													</a>
												</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
@endsection
