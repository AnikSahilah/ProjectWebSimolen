@extends('layout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Tambah Montir</h4>
        </div>

        <form action="{{ route('montir.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" tabindex="1">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror" tabindex="3">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" tabindex="5">
                                <button class="btn btn-outline-secondary" type="button" id="btn-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" tabindex="2">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" value="{{ old('no_hp') }}" tabindex="4">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <div class="input-group">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" value="{{ old('password_confirmation') }}" tabindex="6">
                                <button class="btn btn-outline-secondary" type="button" id="btn-password-konfirmasi">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" tabindex="8">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
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
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('montir.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

    </div>
@endsection

@push('script')
    <script>
        var btnPassword = document.getElementById('btn-password');
        var passwordInput = document.getElementById('password');

        btnPassword.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                btnPassword.innerHTML =
                    '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = 'password';
                btnPassword.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });

        var btnPasswordConfirmation = document.getElementById('btn-password-konfirmasi');
        var passwordInputConfirmation = document.getElementById('password_confirmation');

        btnPasswordConfirmation.addEventListener('click', function() {
            if (passwordInputConfirmation.type === 'password') {
                passwordInputConfirmation.type = 'text';
                btnPasswordConfirmation.innerHTML =
                    '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInputConfirmation.type = 'password';
                btnPasswordConfirmation.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
@endpush
