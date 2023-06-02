@extends('layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Detail Montir</h4>
        </div>



        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td class="w-25">Nama</td>
                                    <td>{{ $montir->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Email</td>
                                    <td>{{ $montir->user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Jenis Kelamin</td>
                                    <td>{{ $montir->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">No HP</td>
                                    <td>{{ $montir->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Alamat</td>
                                    <td>{{ $montir->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Status</td>
                                    <td>{{ $montir->status }}</td>
                                </tr>
                                <tr>
                                    <td class="w-25">Foto</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $montir->user->photo) }}" height="254px"
                                            width="172px" alt="User Photo" class="border m-2">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer bg-whitesmoke">
            <a href="{{ route('montir.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </div>
@endsection
