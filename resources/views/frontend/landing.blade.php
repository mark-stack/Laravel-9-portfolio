@extends('frontend.frontend_master')

@section('content')


    <div class="b-example-divider"></div>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
            <div class="col-lg-12" style="margin-top: 0px;">
                <center>
                    <h1 class="display-3 fw-bold lh-1 mb-3">Laravel Developer</h1> 
                    <h3 style="font-size:25px;position:relative;bottom:10px">(+ API + Blockchain)</h3>  
                </center>      
            </div>
            <div class="col-lg-4">
                <center>
                    <img src="/images/myface2.png" class="d-block mx-lg-auto img-fluid" style="max-width:160px;width:100%;border-radius: 10px" alt="Bootstrap Themes"  loading="lazy">
                    
                    <i style="font-size:23px;margin-top:8px">
                        "Close enough is not<br> good enough"
                    </i> - Mark
                </center>
            </div>
            <div class="col-lg-8">
                <table style="width:100%;margin-bottom:5px">
                    <tr class="topalign">
                        <th><h4>Best at:</h4></th>
                        <th class="mobilehide"><h4>Dabble:</h4></th>
                        <th style="width:250px"><h4>Enjoy creating:</h4></th>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa-brands fa-laravel" style="color:#ff372a;margin:0px 2px 0px 2px"></i> Laravel 9<br>
                            <span style="margin:0px 2px 0px 2px"><svg style="width:17px;color: rgb(251, 112, 169);" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Livewire</title><path d="M12.001 0C6.1735 0 1.4482 4.9569 1.4482 11.0723c0 2.0888.5518 4.0417 1.5098 5.709.2492.2796.544.4843.9649.4843 1.3388 0 1.2678-2.0644 2.6074-2.0644 1.3395 0 1.4111 2.0644 2.75 2.0644 1.3388 0 1.2659-2.0644 2.6054-2.0644.5845 0 .9278.3967 1.2403.8398-.2213-.2055-.4794-.3476-.8203-.3476-1.1956 0-1.3063 1.6771-2.2012 2.1406v4.5097c0 .9145.7418 1.6563 1.6562 1.6563.9145 0 1.6563-.7418 1.6563-1.6563v-5.8925c.308.4332.647.8144 1.2207.8144 1.3388 0 1.266-2.0644 2.6055-2.0644.465 0 .7734.2552 1.039.58-.1294-.0533-.2695-.0878-.4297-.0878-1.1582 0-1.296 1.574-2.1171 2.0937v2.4356c0 .823.6672 1.4902 1.4902 1.4902s1.4902-.6672 1.4902-1.4902V16.371c.3234.4657.6684.8945 1.2774.8945.7955 0 1.093-.7287 1.4843-1.3203.6878-1.4704 1.0743-3.1245 1.0743-4.873C22.5518 4.9569 17.8284 0 12.001 0zm-.5664 2.877c2.8797 0 5.2148 2.7836 5.2148 5.8066 0 3.023-1.5455 5.1504-5.2148 5.1504-3.6693 0-5.2149-2.1274-5.2149-5.1504S8.5548 2.877 11.4346 2.877zM10.0322 4.537a1.9554 2.1583 0 00-1.955 2.1582 1.9554 2.1583 0 001.955 2.1582 1.9554 2.1583 0 001.9551-2.1582 1.9554 2.1583 0 00-1.955-2.1582zm-.3261.664a.9777.9961 0 01.9785.9962.9777.9961 0 01-.9785.996.9777.9961 0 01-.9766-.996.9777.9961 0 01.9766-.9961zM6.7568 15.6935c-1.0746 0-1.2724 1.3542-1.9511 1.9648v1.7813c0 .823.6672 1.4902 1.4902 1.4902s1.4902-.6672 1.4902-1.4902v-3.1817c-.2643-.3237-.5767-.5644-1.0293-.5644Z" fill="#fb70a9"></path></svg></span> Livewire & Alpine.js<br>
                            <i class="fa-brands fa-js" style="color:#F0DB4F;margin:0px 3px 0px 2px"></i> Javascript & JQuery<br>
                            <i class="fa-brands fa-bootstrap" style="color:#864fd0;margin:0px 1px 0px 1px"></i> CSS / Bootstrap 5<br>
                            <i class="fa-brands fa-ethereum" style="color:#828385;margin:0px 4px 0px 5px"></i> Ethers.js & Plutus<br>
                            <i class="fa-solid fa-database" style="color:#F29111;margin:0px 2px 0px 3px"></i> MySQL
                        </td>
                        <td class="mobilehide">
                            <i class="fa-brands fa-node-js" style="color:#339933;margin:0px 4px 0px 2px"></i></i> Node.js<br>
                            <i class="fa-brands fa-vuejs" style="color:#41B883;margin:0px 4px 0px 2px"></i> Vue.js<br>
                            <i class="fa-solid fa-code" style="color:#49b0f1;margin:0px 0px 0px 0px"></i></i> Tailwind
                        </td>
                        <td>
                            <i class="fa-solid fa-thumbs-up" style="color:#acd3ac"></i> REST API create & consume<br>
                            <i class="fa-solid fa-thumbs-up" style="color:#acd3ac"></i> SAAS with SPA functionality<br>
                            <i class="fa-solid fa-thumbs-up" style="color:#acd3ac"></i> Payments, billing, invoicing.<br>
                            <i class="fa-solid fa-thumbs-up" style="color:#acd3ac"></i> Email and SMS automation<br>
                            <i class="fa-solid fa-thumbs-up" style="color:#acd3ac"></i> Blockchain integrations<br>
                        </td>
                    </tr>
    
                </table>
    
                <p class="lead">
                    <i style="font-size:16px">
                        My sites have <strong>120,000 clicks</strong>, I scraped and imported <strong>25,000 NFTs</strong> for fun, made and sold an <strong>18,000</strong> page business directory, and accumulated 100's of users in various ventures.
                    </i>
                </p>
            </div>
        </div>

        @livewire('samples')
            
    </div>

@endsection


