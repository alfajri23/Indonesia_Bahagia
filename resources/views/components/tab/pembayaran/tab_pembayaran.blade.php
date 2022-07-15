{{-- <ul class="nav nav-tabs xs-p-4 d-flex align-items-center product-info-tab border-bottom-0" id="pills-tab" role="tablist">
    <li class="{{Request::segment('1') == 'riwayat-pembayaran' ? 'active' : ''}} list-inline-item mx-2">
        <a class="fw-700 pb-sm-5 pt-sm-5 xs-mb-2 ml-sm-5 font-xssss text-grey-500 ls-3 d-inline-block text-uppercase {{Request::segment('1') == 'riwayat-pembayaran' ? 'active' : ''}}" href="{{route('pembayaranRiwayat')}}" >
            Pembayaran
        </a>
    </li>
    <li class="{{Request::segment('2') == 'event' ? 'active' : ''}} list-inline-item mx-2">
        <a class="fw-700 pb-sm-5 pt-sm-5 xs-mb-2 font-xssss text-grey-500 ls-3 d-inline-block text-uppercase {{Request::segment('2') == 'event' ? 'active' : ''}}" href="{{route('eventRiwayat')}}" >
            Event saya
        </a>
    </li>
    <li class="{{Request::segment('2') == 'kelas' ? 'active' : ''}} list-inline-item mx-2">
        <a class="fw-700 pb-sm-5 pt-sm-5 xs-mb-2 font-xssss text-grey-500 ls-3 d-inline-block text-uppercase {{Request::segment('2') == 'kelas' ? 'active' : ''}}" href="{{route('kelasRiwayat')}}" >
            Kelas saya
        </a>
    </li>
    <li class="{{Request::segment('2') == 'konsultasi' ? 'active' : ''}} list-inline-item mx-2">
        <a class="fw-700 pb-sm-5 pt-sm-5 xs-mb-2 font-xssss text-grey-500 ls-3 d-inline-block text-uppercase {{Request::segment('2') == 'konsultasi' ? 'active' : ''}}" href="{{route('konsultasiRiwayat')}}" >
            Jadwal Konsultasi Saya
        </a>
    </li>
</ul> --}}

<div class="row p-2">

    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link {{Request::segment('1') == 'riwayat-pembayaran' ? 'active' : ''}}" href="{{route('pembayaranRiwayat')}}">Riwayat pembayaran</a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link {{Request::segment('2') == 'event' ? 'active' : ''}}" href="{{route('eventRiwayat')}}">Event saya</a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link {{Request::segment('2') == 'kelas' ? 'active' : ''}}" href="{{route('kelasRiwayat')}}">Kelas saya</a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link {{Request::segment('2') == 'konsultasi' ? 'active' : ''}}" href="{{route('konsultasiRiwayat')}}">Konsultasi saya</a>
        </li>
    </ul>
</div>