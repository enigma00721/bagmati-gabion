@extends('frontend.layout.app')

@section('title','Bagmati Gabion')
@section('css')
	.single-service p {
		text-align:left;
		width:100%;
	}
@endsection

@section('content')
	
	<!-- Breadcrumbs -->
	  <section class="bg-gray-7">
	    <div class="breadcrumbs-custom box-transform-wrap context-dark">
	      <div class="container">
	        <h3 class="breadcrumbs-custom-title">{{$row->title}}</h3>
	        <div class="breadcrumbs-custom-decor"></div>
	      </div>
	      <div class="box-transform" style="background-image: url({{asset('images/featured/main2.jpg')}});"></div>
	    </div>
	    <div class="container">
	      <ul class="breadcrumbs-custom-path">
	        <li><a href="index.html">Home</a></li>
	        <li class="active">{{$row->title}}</li>
	      </ul>
	    </div>
	  </section>

	  @if(session()->has('success_message'))
	       <div class="alert alert-success alert-dismissible bg-primary" role="alert">
	         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	         <strong>Thank You!</strong> {{ session()->get('success_message') }}
	       </div>
	  @endif


      <!-- Services-->
      <section class="section section-sm section-first bg-default text-left">
        <div class="container">
          <div class="row row-60">
            <div class="col-md-7 col-xl-8">
              <div class="single-service">
              	<img src="{{ asset('images/service/'.$row->image) }}" alt="" width="770" height="426" class="mb-5" />
                <!-- <h4>Value engineering</h4> -->
                <p>{!! $row->text !!}</p>
               
              </div>
            </div>
            <div class="col-md-5 col-xl-4">
              <div class="aside aside-services">
                <div class="row row-60">
                  <div class="aside-item col-12">
                    <h5 class="aside-services-title text-primary" style="font-weight: bolder;">Our Major Products</h5>
                    <ul class="list-category">

                      @foreach($rows as $service)
                      <li class="list-category-item">
                      	<a class="{{ (request()->is('our-service/'.$service->slug)) ? 'active' : '' }}" 
                      		href="{{route('ourservice',$service->slug)}}">{{$service->title}}
                      	</a>
                      </li>
                      @endforeach
                     
                    </ul>
                  </div>
                  <div class="aside-item col-sm-6 col-md-12">
                    <h5 class="aside-services-title">Our contacts</h5>
                    <!-- Box contacts-->
                    <div class="box-contacts">
                      <div class="box-contacts-item">
                        <div class="box-contacts-title mb-2">Free consultation</div>
                        <div class="unit unit-spacing-xs flex-column flex-md-row">
                          <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                          <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->telephone }}</a></div>
                        </div>
                        <div class="unit unit-spacing-xs flex-column flex-md-row mt-2">
                          <div class="unit-left"><span class="icon icon-24 mdi mdi-cellphone"></span></div>
                          <div class="unit-body"><a class="phone" href="tel:#">{{ $company_info->mobile }}</a></div>
                        </div>
                      </div>
                      <div class="box-contacts-item">
                        <div class="box-contacts-title">Office</div>
                        <div class="unit unit-spacing-xs flex-column flex-md-row">
                          <div class="unit-left"><span class="icon icon-28 mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="address" href="#">{{ $company_info->location }}</a></div>
                        </div>
                      </div>
                      <div class="box-contacts-item">
                        <div class="box-contacts-title">E-mail</div>
                        <div class="unit unit-spacing-xs flex-column flex-md-row">
                          <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                          <div class="unit-body">
                          	<a class="mail" href="#">
                          		<span>{{ $company_info->mail }}</span></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="aside-item col-sm-6 col-md-12">
                    <h5 class="aside-services-title">Our brochure</h5>
                    <a href="{{route('download.brochure')}}" target="_blank" 
                      class="button button-lg button-icon button-icon-left button-secondary button-winona" >
                      <span class="icon mdi mdi-download"></span>
                      <span>Download</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

	      <!-- Contact us-->
	      <section class="section section-sm section-last bg-default text-left">
	        <div class="container">
	          <div class="row">
	            <div class="col-lg-10 col-xl-8">
	              <h4>Any questions? Contact us</h4>
                  <form class="rd-form" method="post" action="{{route('contact.send')}}">
                  	{{csrf_field()}}
                  	<input type="hidden" name="service" value="{{$row->title}}">

	                <div class="row row-20 gutters-20">
	                  <div class="col-md-6">
	                    <div class="form-wrap">
	                      <input class="form-input" id="contact-your-name-4" type="text" name="name" data-constraints="@Required">
	                      <label class="form-label" for="contact-your-name-4">Your Name*</label>
	                    </div>
	                  </div>
	                  <div class="col-md-6">
	                    <div class="form-wrap">
	                      <input class="form-input" id="contact-email-4" type="email" name="email" data-constraints="@Email @Required">
	                      <label class="form-label" for="contact-email-4">Your E-mail*</label>
	                    </div>
	                  </div>
	                  
	                  <div class="col-12">
	                    <div class="form-wrap">
	                      <input class="form-input" id="contact-phone-4" type="text" name="phone" data-constraints="@Numeric">
	                      <label class="form-label" for="contact-phone-4">Your Phone*</label>
	                    </div>
	                  </div>
	                  <div class="col-12">
	                    <div class="form-wrap">
	                      <label class="form-label" for="contact-message-4">Your message</label>
	                      <textarea class="form-input textarea-lg" id="contact-message-4" name="message" data-constraints="@Required"></textarea>
	                    </div>
	                  </div>
	                </div>
	                <button class="button button-secondary button-winona" type="submit">Send request</button>
	              </form>
	            </div>
	          </div>
	        </div>
	      </section>

@endsection



@section('script')
  <script type="text/javascript">
     $(document).ready(function(){
       
         $(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
             $(".alert-success").slideUp(500);
         });

     });
  </script>
@endsection