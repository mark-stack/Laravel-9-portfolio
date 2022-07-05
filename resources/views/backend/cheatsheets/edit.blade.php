@extends('backend.backend_master')

@section('content')


<div class="page-wrapper">

    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <center>
            <h4 class="page-title">Cheatsheets</h4>
          </center>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="height:100%">

            @if (session('success'))
                <div class="alert alert-success">
                    <center>
                      {{ session('success') }}
                    </center>
                </div>
            @endif

            <form class="form-horizontal" action="/admin/cheatsheets/{{$cheatsheet->id}}" method="post">
              @csrf 
              @method('put')

              <div class="card-body">
                <h3 class="card-title">Edit Cheatsheet</h3>
                <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name <span style="color:red"><strong>*</strong></span></label>
                  <div class="col-sm-9">
                    <input required type="text" class="form-control" name="name" placeholder="e.g Install Laravel" value="{{ old('name',$cheatsheet->name)}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="body" class="col-sm-3 text-end control-label col-form-label">
                    Body <span style="color:red"><strong>*</strong></span>
                    <br><small>Write in HTML</small>
                  </label>
                  <div class="col-sm-9">
                    <textarea required type="text" rows="12" minlength="20" class="form-control" name="body" placeholder="A list or paragraph etc">{{ old('body',$cheatsheet->body)}}</textarea>
                  </div>
                </div>
              </div>
              <div class="border-top">
                <div class="card-body">
                  <button type="submit" class="btn btn-primary" style="width:100%">
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

    

      </div>
    </div>


@endsection


