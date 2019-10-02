@extends('frontend.layout.app')

@section('title','Contact Us')
    
   
    @section('content')

      <!-- Breadcrumbs -->
      <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
          <div class="container">
            <h3 class="breadcrumbs-custom-title">Contact Us</h3>
            <div class="breadcrumbs-custom-decor"></div>
          </div>
          <div class="box-transform" style="background-image: url({{asset('images/featured/main2.jpg')}});"></div>

        </div>
        <div class="container">
          <ul class="breadcrumbs-custom-path">
            <li><a href="{{route('front')}}">Home</a></li>
            <li class="active">Contacts</li>
          </ul>
        </div>
      </section>

       @if(session()->has('success_message'))
            <div class="alert alert-success alert-dismissible bg-primary" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Thank You!</strong> {{ session()->get('success_message') }}
            </div>
       @endif

      <!-- Contacts-->
      <section class="section section-lg bg-default text-md-left">
        <div class="container">
          <div class="row row-60 justify-content-center">
            <div class="col-lg-8">
              <h4 class="text-spacing-25 text-transform-none">Get in Touch</h4>

              <form class="rd-form" method="post" action="{{route('contact.send')}}">
                 {{csrf_field()}}
                <div class="row row-20 gutters-20">
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-your-name-5">Your Name*</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="contact-email-5">Your E-mail*</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <!--Select 2-->
                      <select class="form-input" data-minimum-results-for-search="Infinity" data-constraints="@Required" name="service">
                        <option value="1">Select a Service</option>
                        @foreach($services as $service)
                        <option value="{{ $service->title }}">{{ $service->title }}</option>
                        @endforeach
                      
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-phone-5" type="text" name="phone" data-constraints="@Numeric">
                      <label class="form-label" for="contact-phone-5">Your Phone*</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message-5">Message</label>
                      <textarea class="form-input textarea-lg" id="contact-message-5" name="message" data-constraints="@Required"></textarea>
                    </div>
                  </div>
                </div>
                <button class="button button-secondary button-winona" type="submit">Contact us</button>
              </form>
            </div>
            <div class="col-lg-4">
              <div class="aside-contacts">
                <div class="row row-30">
                  <div class="col-sm-6 col-lg-12 aside-contacts-item">
                    <p class="aside-contacts-title">Get social</p>
                    <ul class="list-inline contacts-social-list list-inline-sm">
                      <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                      <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                      <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                      <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                    </ul>
                  </div>
                  <div class="col-sm-6 col-lg-12 aside-contacts-item">
                    <p class="aside-contacts-title">Phone</p>
                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                      <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                      <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->telephone }}</a></div>
                    </div>
                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start mt-1">
                       <div class="unit-left"><span class="icon mdi mdi-cellphone"></span></div>
                      <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->mobile }}</a></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12 aside-contacts-item">
                    <p class="aside-contacts-title">E-mail</p>
                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                      <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                      <div class="unit-body"><a class="mail" href="#">
                       {{ $company_info->mail }}
                      </a></div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-12 aside-contacts-item">
                    <p class="aside-contacts-title">Address</p>
                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                      <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                      <div class="unit-body"><a class="address" href="#">{{ $company_info->location }}
                         <br class="d-md-none"></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    @endsection


    @section('script')
        <!-- <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script> -->

      <script type="text/javascript">
         $(document).ready(function(){
           
             $(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
                 $(".alert-success").slideUp(500);
             });

         });
      </script>
    @endsection
