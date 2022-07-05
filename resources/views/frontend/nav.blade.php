<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="/images/mark_logo.png" style="width:50px;" class="mobileshow">
          <img src="/images/mark_logo.png" style="width:30px;" class="mobilehide">
        </a>
  
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2" style="color:white">Home</a></li>
          @if(Route::currentRouteName() == 'landing')
            <li><a href="/#examples" class="nav-link px-2" style="color:white">Live Samples</a></li>
          @endif
          <li><a href="/cheatsheets" class="nav-link px-2" style="color:white">Cheatsheets</a></li>
          <li><a href="/#hire" class="nav-link px-2" style="color:white">Hire Me</a></li>
        </ul>
  
        <div class="text-end">
          @if (auth()->check())
            @if(Auth::user()->isAdmin())
              <a href="/admin" class="btn btn-outline-light me-2">Admin</a>
            @else 
              <a href="/user" class="btn btn-outline-light me-2">Dashboard</a>
            @endif
          @else 
            <a href="/auth/redirect/google" class="btn btn-primary" style="background-color:#4285F4;"><i class="fa-brands fa-google"></i> Google</a>
            <a href="/auth/redirect/linkedin" class="btn btn-primary" style="background-color:#0a66c2;padding-top: 3px;padding-bottom: 4px;"><span style="font-size:20px"><i class="fa-brands fa-linkedin"></i></span> Linkedin</a>
          @endif
  
        </div>
      </div>
    </div>
  </header>
      