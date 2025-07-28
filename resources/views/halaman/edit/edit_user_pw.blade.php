@extends('main_layout.main')

@section('container')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h3 class="fw-bold mb-3"><i class="fas fa-edit me-1"></i> Ganti Password</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('edit_userpw_proses', ['id' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="exampleFormControlPwlama" class="form-label">Password Lama</label>
                                        <input type="password" class="form-control" id="exampleFormControlPwlama" name="pw_lama" placeholder="Masukkan Password Lama">
                                        @error('pw_lama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror 
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlPwbaru" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" id="exampleFormControlPwbaru" name="pw_baru" placeholder="Masukkan Password Baru">
                                        @error('pw_baru')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror   
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('profil') }}" class="btn btn-primary btn-sm">Kembali</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Ganti</button>
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
