@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Status Pembelian Barang</h4>
        </div>
        <form action="{{ route('aprove.barang', $pembelian->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="belum diproses"
                            {{ old('status', $pembelian->status) == 'belum diproses' ? 'selected' : '' }}>Belum diproses
                        </option>
                        <option value="telah diproses"
                            {{ old('status', $pembelian->status) == 'telah diproses' ? 'selected' : '' }}>Sudah diproses
                        </option>
                        <option value="dalam pengiriman"
                            {{ old('status', $pembelian->status) == 'dalam pengiriman' ? 'selected' : '' }}>Dalam Pengiriman
                        </option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer bg-whitesmoke">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ route('view.aprove.barang') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection
