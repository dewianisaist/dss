@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-2">
                    <div class="card-block">
                        <h1>Pilih <dfn>Role</dfn></h1>
                        <p class="text-muted">Masuk sebagai</p>
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    @foreach($user->roles as $v)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="auth_role"> {{ $v->display_name }}
                                            </label>
                                        </div>
							        @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-2"><i class="fa fa-btn fa-sign-in"></i> Lanjutkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection