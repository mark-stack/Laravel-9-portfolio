@extends('frontend.frontend_master')

@section('content')


    <div class="b-example-divider"></div>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
            <div class="col-lg-12" style="margin-top: 0px;">
                <center>
                    <h2 class="display-4 fw-bold lh-1 mb-3">Cheatsheets</h2>  
                    <br> 
                </center> 
                
                @forelse($all_cheatsheets as $c) 
                   
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading{{$loop->index}}">
                            <button class="accordion-button {{$loop->index == 0 ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$loop->index}}">
                                {{ucfirst($c->name)}}
                            </button>
                          </h2>
                          <div id="collapse{{$loop->index}}" class="accordion-collapse collapse {{$loop->index == 0 ? 'show' : ''}}" aria-labelledby="heading{{$loop->index}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {!! $c->body !!}
                            </div>
                          </div>
                        </div>
                      </div>
                @empty
                    <center>
                        <br><br>
                        <h6>Currently no cheatsheets</h6>
                    </center>
                @endforelse 



            </div>
        </div>

  
    </div>

@endsection


