@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img src="{{ auth()->user()->avatar ? asset('storage/avatars/' . auth()->user()->avatar) : asset('images/default-avatar.png') }}"
                             class="rounded-circle img-fluid mb-3" 
                             style="width: 150px; height: 150px;" 
                             alt="Avatar">
                    </div>

                    <h3 class="profile-username text-center">{{ auth()->user()->nama }}</h3>
                    <p class="text-muted text-center">{{ auth()->user()->level->level_nama }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <form action="{{ url('/profil/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="file" name="avatar" id="avatar" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ganti Foto Profil</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Profile Settings Section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Profile Settings') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/profil/update') }}" enctype="multipart/form-data">
                        @csrf
                    
                        <!-- User Level -->
                        <div class="form-group">
                            <label for="level">{{ __('Level Pengguna') }}</label>
                            <input type="text" id="level" name="level" class="form-control" value="{{ auth()->user()->level->level_nama }}" readonly>
                        </div>
                    
                        <!-- Username -->
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input type="text" id="username" name="username" class="form-control" value="{{ auth()->user()->username }}" readonly>
                        </div>
                    
                        <!-- Name -->
                        <div class="form-group">
                            <label for="nama">{{ __('Nama') }}</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ auth()->user()->nama }}" required>
                        </div>
                    
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Abaikan jika tidak ingin ubah password">
                        </div>
                    
                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password_confirmation">{{ __('Konfirmasi Password') }}</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Masukkan kembali password jika ingin mengubah">
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                        </div>
                    
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('scripts')
<script>
    document.getElementById('avatar').onchange = function () {
        this.nextElementSibling.innerHTML = this.files[0].name;
    };
</script>
@endsection