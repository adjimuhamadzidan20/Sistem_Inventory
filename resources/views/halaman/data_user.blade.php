@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3">Data Profile</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card rounded h-100">
                                    <div class="card-body box-profile py-4 d-flex justify-content-center align-items-center">
                                        <div>
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid rounded-circle mb-4" src="<?= url('template'); ?>/assets/img/profile.jpg" alt="User profile picture">
                                            </div>
                                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                                            <p class="text-muted text-center">Administrator</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card rounded h-100">
                                    <div class="card-header">
                                        Informasi Profile
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <span class="fw-bold">Nama Anda</span>
                                            <span data-id="{{ $user->id }}" data-nama="{{ $user->name }}">{{ $user->name }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <span class="fw-bold">Email</span>
                                            <span data-email="{{ $user->email }}"> {{ $user->email }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <span class="fw-bold">Jenis Kelamin</span>
                                            <span data-gender="{{ $user->jenis_kelamin }}">{{ $user->jenis_kelamin }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-bold">Username</span>
                                            <span data-username="{{ $user->username }}">{{ $user->username }}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end py-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfil">
                                            Edit Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit data profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control" id="id" name="id" hidden>
                        <div class="mb-3">
                            <label for="nama_user" class="form-label">Nama Anda</label>
                            <input type="text" class="form-control" id="nama_user" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Ganti Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
