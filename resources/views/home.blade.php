@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $data['role'] }} Dashboard</div>

                <div class="panel-body">
                    Welcome {{ $data['name'] }}, You are logged in!
                </div>
                @if ($data['role'] == 'Administrator')
                <div class="panel-body">
                    <a href="{{ url('/admin/registeruser') }}">Register New User</a><br />
                    <a href="{{ url('/admin/edituser') }}">Edit New User Privileges</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
