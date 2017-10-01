@extends('layouts.auth_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-2">
                <div class="card-block p-2">
                    <h1>Register</h1>
                    <p class="text-muted">Buat akun Anda</p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <div class="input-group mb-1">
                                <span class="input-group-addon">@</span>
                                <input id="nip" type="text" class="form-control" name="nip" placeholder="NIP" required value="{{ old('nip') }}">
                            </div>
                            <div>
                                @if ($errors->has('nip'))
                                    <span class="help-block font-italic">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('is_permission') ? ' has-error' : '' }}">
                            <div class="input-group mb-1">
                                <span class="input-group-addon">@</span>
                                <input id="is_permission" type="text" class="form-control" name="is_permission" placeholder="Permission" required value="{{ old('is_permission') }}">
                            </div>
                            <div>
                                @if ($errors->has('is_permission'))
                                    <span class="help-block font-italic">
                                        <strong>{{ $errors->first('is_permission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                            <div>
                                @if ($errors->has('password'))
                                    <span class="help-block font-italic">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Ulangi Password" required>
                            </div>
                            <div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block font-italic">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-block btn-success"><i class="fa fa-btn fa-user"></i> Buat Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection