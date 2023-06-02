@extends('layout')
@section('content')
    <div>
        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i>
            Tambah Barang
        </a>

        <div class="row mt-5">
            @foreach ($data as $item)
                <div class="col-lg-3 col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('barang.show', $item->id) }}">
                                <h4 class="text-capitalize">{{ $item->nama_barang }}</h4>
                            </a>
                        </div>
                        <div class="card-body">
                            <img alt="image" src="{{ asset('storage/' . $item->photo) }}" class="img-fluid"
                                width="100%" height="150px" alt="Foto Barang">
                            <div>
                                <table class="table table-bordered mt-3">
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>{{ $item->kode_barang }}</td>
                                        </tr>
                                        <tr>
                                            <td>Merek</td>
                                            <td>{{ $item->merek }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>{{ $item->harga }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>{{ $item->stok }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div>
                                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $data->links() }}

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.btn-hapus').on('click', function(e) {
                e.preventDefault();

                var form = $(this).parents('form');
                swal({
                        title: 'Konfirmasi Hapus',
                        text: 'Apakah anda ingin menghapus barang?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((result) => {
                        if (result) {
                            form.submit();
                        }
                    });
            });
        });
    </script>
@endpush
