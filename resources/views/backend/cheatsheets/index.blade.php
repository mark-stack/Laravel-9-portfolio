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
        <div class="col-md-5">
          <div class="card" style="height:100%">

            @if (session('success'))
                <div class="alert alert-success">
                    <center>
                      {{ session('success') }}
                    </center>
                </div>
            @endif

            <form class="form-horizontal" action="{{route('cheatsheets.store')}}" method="post">
              @csrf
              <div class="card-body">
                <h3 class="card-title">Create Cheatsheet</h3>
                <div class="form-group row">
                  <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name <span style="color:red"><strong>*</strong></span></label>
                  <div class="col-sm-9">
                    <input required type="text" class="form-control" name="name" placeholder="e.g Install Laravel">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="body" class="col-sm-3 text-end control-label col-form-label">
                    Body <span style="color:red"><strong>*</strong></span>
                    <br><small>Write in HTML</small>
                  </label>
                  <div class="col-sm-9">
                    @php 
                      $template = "some introduction \r\n <br> \r\n <ul> \r\n <li>one</li> \r\n <li>two</li> \r\n <li>three</li> \r\n </ul>";
                    @endphp 
                    <textarea required type="text" rows="7" minlength="20" class="form-control" name="body" placeholder="A list or paragraph etc">{{$template}}</textarea>
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

        <div class="col-md-7">
          <div class="card" style="height:100%">
            <div class="card-body">
              @if (session('success_delete'))
                <div class="alert alert-success">
                    <center>
                      {{ session('success_delete') }}
                    </center>
                </div>
              @endif

              <center>
                <h3 class="card-title">Cheatsheets</h3>
              </center>

              <a href="{{route('cheatsheets')}}" class="btn btn-primary btn-sm">Visit cheatsheet page</a>
              <br><br>

              @if($all_cheatsheets->count() > 0)
                <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($all_cheatsheets as $c)
                      <tr>
                        <td>{{ ucfirst($c->name)}}</td>
                        <td>
                          
                          <form action="/admin/cheatsheets/{{$c->id}}" method="post">
                            <a href="/admin/cheatsheets/{{$c->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            
                            @csrf 
                            @method('delete') 
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>

                  </table>
                </div>

                @else 
                <br><br>
                <p>
                  No cheatsheets created...
                </p>
                @endif
                
           
            </div>
       
          </div>
        </div>

      </div>
    </div>


@endsection


