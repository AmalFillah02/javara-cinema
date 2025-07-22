<div class="container">
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="mt-0 mb-0 text-white">Edit Profil</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center text-white">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6 class="text-white">Upload foto profil</h6>

                <input type="file" class="form-control">
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info text-white">
            <h3 class="mt-0 text-white">Informasi Pribadi</h3>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama Depan:</label>
                    <div class="col-lg-8">
                        <input name="first_name" class="form-control" style="background-color: #1e1e1e; color: white;" type="text" value="{{ $user->first_name }}">
                        @include('components.error-message',['field_name' => 'first_name'])
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama Belakang:</label>
                    <div class="col-lg-8">
                        <input name="last_name" class="form-control" style="background-color: #1e1e1e; color: white;" type="text" value="{{ $user->last_name }}">
                        @include('components.error-message',['field_name' => 'last_name'])
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input name="email" class="form-control" style="background-color: #1e1e1e; color: white;" type="text" value="{{ $user->email }}">
                        @include('components.error-message',['field_name' => 'email'])
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input readonly class="form-control" style="background-color: #1e1e1e; color: white;" type="text" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input name="password" class="form-control" style="background-color: #1e1e1e; color: white;" type="password">
                        @include('components.error-message',['field_name' => 'password'])
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Konfirmasi Password:</label>
                    <div class="col-md-8">
                        <input name="password_confirmation" class="form-control" style="background-color: #1e1e1e; color: white;" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>