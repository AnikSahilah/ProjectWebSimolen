@extends('layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Manajemen Montir</h4>
            <div class="card-header-action">
                <a href="{{ route('montir.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Montir
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="w-25">Nama Montir</th>
                                    <th>Nomor HP</th>
                                    <th class="w-25 text-center">Jenis Kelamin</th>
                                    <th class="w-25 text-center">Status</th>
                                    <th class="w-25 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->montir->no_hp }}</td>
                                        <td class="text-center">
                                            <span
                                                class="badge {{ $item->montir->jenis_kelamin === 'L' ? 'badge-primary' : 'badge-warning' }}">
                                                {{ $item->montir->jenis_kelamin }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{ $item->montir->status }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('montir.show', $item->montir->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('montir.edit', $item->montir->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('montir.destroy', $item->montir->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>

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
                        text: 'Apakah anda ingin menghapus montir?',
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
