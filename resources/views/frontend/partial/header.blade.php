<!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="150px" data-xl-stick-up-offset="150px" data-xxl-stick-up-offset="150px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                  @isset($company_info)

            <div class="rd-navbar-inner-outer">
              <div class="rd-navbar-aside">
                <div class="rd-navbar-aside-inner">
                  <ul class="rd-navbar-contacts-2">
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                        <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->telephone }}</a></div>
                        
                        <div class="unit-left ml-5"><span class="icon mdi mdi-cellphone"></span></div>
                        <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->mobile }}</a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                        <div class="unit-body"><a class="address" href="#"> {{ $company_info->location }} </a></div>
                      </div>
                    </li>
                  </ul>
                  <ul class="list-share-2">
                    <li><a class="icon mdi mdi-facebook" href="{{ $company_info->fb_link }}" target="_blank"></a></li>
                    <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                    <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                    <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                  </ul>
                </div>
              </div>
              <div class="rd-navbar-inner">

                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="{{route('front')}}"><img class="brand-logo-dark" src="{{asset('images/logo/logo.png')}}" alt="" width="210px" height="60px"/></a></div>
                </div>
                <div class="rd-navbar-right rd-navbar-nav-wrap">
                  <div class="rd-navbar-aside d-xl-none">
                    <div class="rd-navbar-aside-inner">
                      <ul class="rd-navbar-contacts-2">
                        <li>
                          <div class="unit unit-spacing-xs">
                            <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                            <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->telephone }}</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-xs">
                            <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                            <div class="unit-body"><a class="address" href="#">{{ $company_info->location }}</a></div>
                          </div>
                        </li>
                      </ul>
                      <ul class="list-share-2">
                        <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                        <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                        <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                        <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="rd-navbar-main">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav ml-auto">
                      <li class="rd-nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="rd-nav-link" href="{{route('front')}}">Home</a>
                      </li>
                     
                      <li class="rd-nav-item {{ request()->is('aboutus*') ? 'active' : '' }}">
                        <a class="rd-nav-link" href="{{route('aboutus')}}">About us</a>
                      </li>

                      <li class="rd-nav-item {{ request()->is('our-service*') ? 'active' : '' }}">
                        <a class="rd-nav-link" href="{{route('ourservice','gabion-box')}}">Our Products</a>
                      </li>
                      
                      <li class="rd-nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                        <a class="rd-nav-link" href="{{route('contactus')}}">Contact Us</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1" data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate="data-multitoggle-isolate">
                </div>

              </div>
            </div>
              @endisset
            
          </nav>
        </div>
      </header>
      <!-- page header navbar end -->