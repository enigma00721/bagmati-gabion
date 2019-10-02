<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    
   <title>@yield('title')</title>
   @include('frontend.partial.head')
   <style type="text/css">
     @yield('css')
   </style>
  </head>
  <body>

    <!-- preloader start -->
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- preloader end -->

    <div class="page">

      
      @include('frontend.partial.header')

      @yield('content')

      
      @include('frontend.partial.footer')

    </div>
    <!-- div page end -->


    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>

    @include('frontend.partial.script')



      @yield('script')
	
</html>