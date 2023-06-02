@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-7 col-12">
            <h4>Riwayat Pemesanan Montir</h4>
            <hr>
            @foreach ($dataPemesanan as $item)
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $item->customer->user->name }}</h4>
                    </div>
                    <div class="card-body">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: {{ $item->tanggal_pemesanan }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>: {{ $item->customer->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>:
                                        {{ $item->customer->kendaraan->isNotEmpty() ? $item->customer->kendaraan->first()->jenis : 'N/A' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: {{ $item->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer bg-whitesmoke">
                        montir yang dipesan :
                        <a href="">{{ $item->montir->user->name }}</a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-lg-5 col-12">
            <h4>Riwayat Pemesanan Barang</h4>
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPembelian as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->customer->user->name }}</td>
                                        <td>
                                            @if ($item->status == 'belum diproses')
                                                <span class="badge badge-danger">{{ $item->status }}</span>
                                            @elseif ($item->status == 'telah diproses')
                                                <span class="badge badge-info">{{ $item->status }}</span>
                                            @elseif ($item->status == 'dalam pengiriman')
                                                <span class="badge badge-warning">{{ $item->status }}</span>
                                            @elseif ($item->status == 'selesai')
                                                <span class="badge badge-info">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
