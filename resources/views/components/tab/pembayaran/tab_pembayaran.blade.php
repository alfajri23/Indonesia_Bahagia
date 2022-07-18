<div class="row p-2">

    <ul class="nav nav-pills nav-fill">
        <li class="nav-item wr-100">
          <a class="nav-link {{Request::segment('1') == 'riwayat-pembayaran' ? 'active' : 'text-pink'}}" href="{{route('pembayaranRiwayat')}}">Riwayat pembayaran</a>
        </li>
    
        <li class="nav-item wr-100">
          <a class="nav-link {{Request::segment('2') == 'event' ? 'active' : 'text-pink'}}" href="{{route('eventRiwayat')}}">Event saya</a>
        </li>
    
        <li class="nav-item wr-100">
          <a class="nav-link {{Request::segment('2') == 'kelas' ? 'active' : 'text-pink'}}" href="{{route('kelasRiwayat')}}">Kelas saya</a>
        </li>
    
        <li class="nav-item wr-100">
          <a class="nav-link {{Request::segment('2') == 'konsultasi' ? 'active' : 'text-pink'}}" href="{{route('konsultasiRiwayat')}}">Konsultasi saya</a>
        </li>
    </ul>
</div>