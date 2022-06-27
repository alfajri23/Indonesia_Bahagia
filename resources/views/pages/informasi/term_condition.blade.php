@extends('layouts.layout_user')
@section('content')


<style>
    ol li{
        list-style:circle;
        margin-left : 1rem;
        margin-bottom: 2rem;
        color:black;
    }

    ul li{
        list-style:circle;
        margin-left : 1rem;
        margin-bottom: 2rem;
        color:black;
    }

    p{
        color:black;
    }
    
</style>


    <div class="container p-5">
        <div class="">
            <h2 class="fw-700 text-grey-800 display2-size display3-md-size lh-3 pt-lg--5 text-center mb-5">{{$data->nama}}</h2>
        </div class="fw-400 font-xss lh-28 text-grey-700 mt-0 ml-0 pl-3 w-100 w-xs-90">
            {!!$data->isi!!}
        <div>

        </div>
    </div>

@endsection