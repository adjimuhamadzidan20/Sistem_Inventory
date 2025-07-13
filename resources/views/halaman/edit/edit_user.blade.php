@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Edit Profile</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('edit_user_proses', ['id' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleFormControlNama" class="form-label">Nama Anda</label>
                                        <input type="text" class="form-control" id="exampleFormControlNama" name="nama" value="{{ $user->name }}">
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleFormControlEmail" value="{{ $user->email}}" name="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlJenisKelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="exampleFormControlJenisKelamin" name="jenis_kelamin"> 
                                            <option value="{{ $user->jenis_kelamin }}" selected>{{ $user->jenis_kelamin }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleFormControlUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleFormControlUsername" value="{{ $user->username }}" name="username">
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('profil') }}" class="btn btn-primary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
