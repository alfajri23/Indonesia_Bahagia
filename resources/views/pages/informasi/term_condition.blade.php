@extends('layouts.layout_user')
@section('content')

<div class="page-content bg-gray">
    <div class="dlab-bnr-inr overlay-black-middle bg-pt">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">{{$data->nama}}</h1>
            </div>
        </div>
    </div>

    <div class="container p-3">
        <div class="">
            <h2 class="fw-700 text-grey-800 display2-size display3-md-size lh-3 pt-lg--5 text-center mb-5"></h2>
        </div class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-0 pl-3 w-100 w-xs-90 rich-list">
            {!!$data->isi!!}
        <div>

        </div>
    </div>
</div>

@endsection