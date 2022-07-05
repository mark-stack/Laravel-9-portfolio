<div>
    <div class="album py-2 bg-light" id="examples">
        <div class="container">
            <div>
                <center>
                    <h4 style="padding-top:15px">
                        @if($jobs != null)
                            <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                            <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                            @if($current_tag != "")
                                <strong>{{count($jobs)}} {{ucwords($current_tag)}}</strong> Job{{count($jobs) == 1 ? '' : 's'}} below
                            @else 
                                <strong>{{count($jobs)}} Jobs </strong> below
                            @endif
                            <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                            <i class="fa-solid fa-hand-point-down" style="color:green"></i>
                        @endif
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
                        <span class="badge rounded-pill bg-primary" style="cursor: pointer;font-size:16px" wire:click="tag('javascript')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            Javascript
                        </span>
                        <span class="badge rounded-pill bg-primary" style="cursor: pointer;font-size:16px" wire:click="tag('api')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            API
                        </span>
                        <span class="badge rounded-pill bg-primary" style="cursor: pointer;font-size:16px" wire:click="tag('react')"  x-on:click="window.scrollTo({top: 500, behavior: 'smooth'})">                 
                            React
                        </span>
                        <span style="color:green">                 
                            More tags below...
                        </span>
                    </div>


                </center>


                
                <div class="row row-cols-1 g-3" style="margin-top:2px">
                    <div class="col">
                        
                        @forelse(array_reverse($jobs) as $job)
                        
                            <div class="d-flex flex-row comment-row" style="margin-bottom:5px;background-color:#d7eedf;padding:6px;border-radius:10px">
                                <div class="p-2" style="margin-right:5px">

                                    @if ($job['company_logo'] == "")
                                        <img src="/images/mark_logo.png" style="width:80px;">
                                    @else 
                                        <img src="{{$job['company_logo']}}" alt="user" width="80" style="border-radius:20%"> <!-- class="rounded-circle"--> 
                                    @endif

                                </div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium" style="margin-bottom:0px">{{$job['position']}} ({{$job['company']}})</h6>
                                    <small style="color:grey">{{$job['location']}}</small>
                                    @php 
                                        $a = strtotime($job['date']);
                                        $b = \Carbon\Carbon::parse($a)->diffForHumans();
                                    @endphp
                                    <span class="mb-3 d-block">
                                        {{$b}}
                                    </span>
                                    <div class="comment-footer">

                                    
                                    <span class="text-muted float-end" style="margin: 0px 10px 0px 0px">
                                        <a href="{{$job['apply_url']}}" class="btn btn-primary">View Job</a>
                                    </span>
                                    
                                    @php 
                                        $tags_raw = (array) $job['tags'];
                                        $tags = array_slice($tags_raw, 0, 5, true);
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

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning " role="alert">
                                <center>
                                    The API failed to load. Try again in a few seconds.
                                </center>
                            </div>
                        @endforelse
                    </div>
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





