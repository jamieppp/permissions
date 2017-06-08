@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>
                <div class="panel-body">
                    <div class="row">
                      @foreach ($data as $user)
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-4">
                                      <p>{{ $user["name"] }}</p>

                                  </div>
                                  <div class="col-md-8">
                                      <form class="form-horizontal" role="form" method="POST" action="{{ route('userupdate') }}">
                                          {{ csrf_field() }}

                                          <input type="hidden" name="id" value="{{ $user["id"] }}" />

                                          <div class="col-md-8">
                                              <div class="form-group">
                                                  <select id="role" class="form-control" name="role" required>
                                                      <option value="Subscriber">Subscriber</option>
                                                      <option value="Editor">Editor</option>
                                                      <option value="Administrator">Administrator</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="col-md-4">
                                              <div class="form-group">
                                                  <button type="submit" class="btn btn-primary">
                                                      Update
                                                  </button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
