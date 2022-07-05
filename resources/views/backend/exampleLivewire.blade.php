@extends('backend.backend_master')

@section('content')


<div class="page-wrapper">

    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Livewire example: {{ ucwords(str_replace('_',' ',Route::currentRouteName()))}}</h4>
        </div>
      </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        @if(Route::currentRouteName() == 'unique_slug')
                          @livewire('posts')
                        @elseif(Route::currentRouteName() == 'dependent_dropdown')
                          @livewire('companies')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


