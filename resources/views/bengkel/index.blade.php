@extends('layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Profil Bengkel</h4>
            <div class="card-header-action">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-update">
                    Edit
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center">{{ $user->bengkel->nama_bengkel }}</h3>
                            <hr />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('storage/' . $user->bengkel->photo) }}" height="300px"
                                style="object-fit: cover" width="100%" alt="Gambar Bengkel">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pemilik</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Bengkel</label>
                                <input type="text" class="form-control" value="{{ $user->bengkel->nama_bengkel }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" class="form-control" value="{{ $user->bengkel->no_hp }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" disabled>{{ $user->bengkel->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('modal')
        <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="bengkel-title"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bengkel-title">Update Profil Bengkel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('update-bengkel') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama_bengkel">Nama Bengkel</label>
                                        <input id="nama_bengkel" type="text"
                                            class="form-control @error('nama_bengkel') is-invalid @enderror"
                                            name="nama_bengkel"
                                            value="{{ old('nama_bengkel', $user->bengkel->nama_bengkel) }}">
                                        @error('nama_bengkel')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="no_hp">No HP</label>
                                        <input id="no_hp" type="text"
                                            class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                            value="{{ old('no_hp', $user->bengkel->no_hp) }}">
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $user->bengkel->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="photo">Foto</label>
                                        <input id="photo" type="file"
                                            class="form-control @error('photo') is-invalid @enderror" name="photo">
                                        @error('photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endpush
