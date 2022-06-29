@extends('layouts.layout_user')
@section('content')

<div class="page-nav pt-lg--7 pb-lg--7 pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 mx-auto">
                <div class="order-details pt-5 pt-sm-0">
                    <div class="table-content table-responsive mb-5 card border border-dark p-2 p-sm-5">
                       <table class="table order-table order-table-2 mb-0">
                           <thead>
                               <tr>
                                   <th class="border-0 font-lg text-grey-800">Detail Transaksi</th>
                               </tr>
                           </thead>
                           <tbody>
                                <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Tanggal 
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">{{$data->updated_at}}</td>
                                </tr>
                                <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Nama 
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">{{$data->nama}} </td>
                                </tr>
                               <tr>
                                   <th class="text-grey-700 fw-600 font-xss">Harga
                                   </th>
                                   <td class="text-right text-grey-700 fw-600 font-xss">Rp. {{number_format($data->harga)}}</td>
                               </tr>
                               <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Metode Bayar
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">Transfer bank</td>
                                </tr>
                                @if(isset($data->bukti))
                                <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Bukti
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">
                                        <a target="_blank" href="{{asset($data->bukti)}}">Lihat</a>
                                    </td>
                                </tr>
                                @endif
                               <tr>
                                    <th class="text-grey-700 fw-600 font-xss">Status
                                    </th>
                                    <td class="text-right text-grey-700 fw-600 font-xss">{{$data->status}}</td>
                                </tr>
                                
                                
                           </tbody>
    
                       </table>
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection