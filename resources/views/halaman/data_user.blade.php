@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3"><i class="far fa-user me-1"></i> Data Profile</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="card rounded h-100">
                                    <div class="card-body box-profile py-4 d-flex justify-content-center align-items-center">
                                        <div>
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid rounded-circle mb-4" src="<?= url('template'); ?>/assets/img/user.png" alt="User profile picture" width="128">
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
                                            <span data-id="" data-nama="{{ $user->name }}">{{ $user->name }}</span>
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
                                        <a href="{{ route('user_edit_pw', ['id' => $user->id]) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="fas fa-edit me-1"></i> Ganti Password
                                        </a>
                                        <a href="{{ route('user_edit', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit me-1"></i> Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
