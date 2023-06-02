@extends('layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Edit Barang</h4>
        </div>

        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input id="kode_barang" type="text"
                                class="form-control @error('kode_barang') is-invalid @enderror" name="kode_barang"
                                value="{{ old('kode_barang', $barang->kode_barang) }}">
                            @error('kode_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror"
                                name="harga" value="{{ old('harga', $barang->harga) }}">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <input id="spesifikasi" type="text"
                                class="form-control @error('spesifikasi') is-invalid @enderror" name="spesifikasi"
                                value="{{ old('spesifikasi', $barang->spesifikasi) }}">
                            @error('spesifikasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input id="nama_barang" type="text"
                                class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
                                value="{{ old('nama_barang', $barang->nama_barang) }}">
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="merek">Merek</label>
                            <input id="merek" type="text" class="form-control @error('merek') is-invalid @enderror"
                                name="merek" value="{{ old('merek', $barang->merek) }}">
                            @error('merek')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror"
                                name="stok" value="{{ old('stok', $barang->stok) }}" min="0">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group mt">
                            <label for="photo">Foto</label>
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
                                name="photo">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                </div>

            </div>

            <div class="card-footer bg-whitesmoke">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </div>
@endsection
