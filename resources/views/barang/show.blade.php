@extends('layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Detail Barang</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="w-25">Kode Barang</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Nama Barang</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Harga</td>
                                    <td>{{ $barang->harga }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Merek</td>
                                    <td>{{ $barang->merek }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Spesifikasi</td>
                                    <td>{{ $barang->spesifikasi }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Stok</td>
                                    <td>
                                        {{ $barang->stok }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25">Foto</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $barang->photo) }}" height="254px" width="172px"
                                            alt="Barang Photo" class="border m-2">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </div>
@endsection
