@extends('layouts.layout_user')
@section('content')


    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h4 class="text-white mb-1">Hasil</h4>
                    <h1 class="text-white">Work Life Balance</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Career -->
            <div class="section-full content-inner bg-gray">
				<div class="container">
					<div class="row">
						
						<div class="col-10 mx-auto m-b30">
							<div class="">
								<div class="icon-sm m-b20"> 
                                    <i class="ti-gift"></i>
                                </div>
								<div class="icon-content">
									<h3 class="dlab-tilte text-uppercase fw-bold">{{$tipe}}</h3>
									<p>{{$desc}}</p>
                                    <p>Terima kasih sudah mengikuti kuis ini. Semoga Bermanfaat</p>
									<a href="{{route('tipeKonsultasi')}}" class="site-button">Konsultasikan masalahmu sekarang</a>
								</div>
							</div>
							
						</div>

					</div>
				</div>
			</div>
            <!-- Career END -->
		</div>
    </div>



@endsection