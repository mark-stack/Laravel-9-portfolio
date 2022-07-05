<div>
    <div class="album py-2 bg-light" id="examples">
        <div class="container">
            <div>
                <center>
                    <h4 style="padding-top:15px">
                        <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                        <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                        
                        @if($current_tag != "")
                            <strong>{{$projects->count()}} <u>Live</u></strong> {{ucwords($current_tag)}} Sample{{$projects->count() == 1 ? '' : 's'}} below
                        @else 
                            <strong>{{$projects->count()}} <u>Live</u></strong> Project Samples below
                        @endif
                        
                        <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                        <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                    </h4>
                    
                    <span style="color:rgb(71 135 94);">
                        This page uses <strong>Livewire</strong> & <strong>Alpine.js</strong> for SPA functionality (similar to Vue.js). <strong>Try the category tags!</strong>
                    </span>
                
                    <div style="margin-top:13px">
                        @if($current_tag != "")
                            <span class="badge rounded-pill bg-success" style="cursor: pointer;font-size:16px;margin-right:5px" wire:click="tag('all')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                                All
                            </span> 
                        @endif
                        <span class="badge rounded-pill bg-success" style="cursor: pointer;font-size:16px" wire:click="tag('project')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            Projects
                        </span> 
                        <span class="badge rounded-pill bg-success" style="cursor: pointer;font-size:16px" wire:click="tag('component')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            Components
                        </span>
                        <span class="badge rounded-pill bg-primary" style="cursor: pointer;font-size:16px" wire:click="tag('api')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            API
                        </span>
                        <span class="badge rounded-pill bg-primary" style="cursor: pointer;font-size:16px" wire:click="tag('payments')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            Payments
                        </span>
                        <span class="badge rounded-pill bg-primary" style="cursor: pointer;font-size:16px" wire:click="tag('blockchain')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            Blockchain
                        </span>
                        <span style="color:green">                 
                            More tags below...
                        </span>
                    </div>


                </center>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="margin-top:2px">
                    @foreach($projects as $project)
                        <div class="col">
                            <div class="card shadow-sm" style="height:100%">
                                @if($project->external == 1)
                                    <a href="{{$project->external_url}}" target="_blank">
                                        <img width="100%" src="/images/{{$project->image}}" role="img" aria-label="Thumbnail" focusable="false">
                                    </a>
                                @else 
                                    <img width="100%" src="/images/{{$project->image}}" role="img" aria-label="Thumbnail" focusable="false">
                                @endif
                                
                                <div class="card-body">
                                    @php 
                                        $tags = explode(',',$project->category);
                                    @endphp
                                    @if($current_tag != "")
                                        <span class="badge rounded-pill bg-success" style="cursor: pointer;margin-right:3px" wire:click="tag('all')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                                            All
                                        </span> 
                                    @endif
                                    @foreach($tags as $t)   
                                        @if($t == "project" || $t == "component" ) 
                                        <span class="badge rounded-pill bg-success" style="cursor: pointer" wire:click="tag('{{$t}}')" x-data @updated.window="scrollTo({top: 500, behavior: 'smooth'})">                 
                                            {{ ucwords($t)}}
                                        </span> 
                                        @else                             
                                            <span class="badge rounded-pill bg-primary" style="cursor: pointer" wire:click="tag('{{$t}}')" x-data @updated.window="scrollTo({top: 500, behavior: 'smooth'})">                 
                                                {{ ucwords($t)}}
                                            </span> 
                                        @endif
                                    @endforeach

                                    
                                    <h4 style='margin-top:8px'>{{ ucwords($project->name)}}</h4>
                                    <p class="card-text">
                                        {{ ucfirst($project->description) }}
                                    </p>
                                    
                                </div>
                                <div class="card-footer bg-transparent border-success">
                                    @if($project->external == 1)
                                        <a href="{{$project->external_url}}" class="btn btn-primary" style="width:100%" target="_blank">Open in new tab</a>
                                    @else 
                                        @auth 
                                            <a href="/user/projects/{{ strtolower(str_replace(' ','-',$project->name))}}" class="btn btn-primary" style="width:100%">Open in Dashboard</a>
                                        @endauth 
                                        @guest 
                                        <button type="button" onclick="location.href='/remember-project/{{ strtolower(str_replace(' ','-',$project->name))}}/google';" class="btn btn-primary" style="background-color:#4285F4;width:49%"><i class="fa-brands fa-google"></i> Google</button>
                                        <button type="button" onclick="location.href='/remember-project/{{ strtolower(str_replace(' ','-',$project->name))}}/linkedin';" class="btn btn-primary" style="background-color:#0a66c2;padding-top: 3px;padding-bottom: 4px;width:49%"><span style="font-size:20px"><i class="fa-brands fa-linkedin"></i></span> Linkedin</button>
                                        @endguest
                                    @endif
                                </div>
                                @auth
                                    @if(Auth()->user()->isAdmin()) 
                                    <div class="card-footer bg-transparent border-success">
                                        <a href="/admin/project-position/up/{{$project->id}}" class="btn btn-primary" style="width:49%">UP</a>
                                        @if($loop->remaining > 0)
                                            <a href="/admin/project-position/down/{{$project->id}}" class="btn btn-info" style="width:49%">DOWN</a>
                                        @endif
                                    </div>
                                    @endif 
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($current_tag != "")
                    <center>
                        <br>
                        <a class="btn btn-success" wire:click="tag('all')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">
                            <i class="fa-solid fa-rotate-left"></i> Back to all results
                        </a>
                    </center>
                @endif
            </div>
        </div>
</div>




