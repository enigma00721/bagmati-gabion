@extends('frontend.layout.app')

@section('title','Bagmati Gabion')

@section('content')

  <!-- Carousel slider-->
  <section class="section swiper-container swiper-slider swiper-slider-2" data-loop="true" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
    <div class="swiper-wrapper text-sm-left">
      
      @isset($sliders)

      @foreach($sliders as $slider)
      <div class="swiper-slide context-dark" data-slide-bg="{{asset('images/slider/'.$slider->image)}}">
        <div class="swiper-slide-caption section-md">
          <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-8 col-xl-6 offset-lg-1 offset-xxl-0">
                <h3 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInDown" data-caption-delay="0">{{ $slider->text }}</span></h3>
                <h5 class="swiper-subtitle" data-caption-animate="fadeInRight" data-caption-delay="300">
                  {{ $slider->caption }}
                </h5>
                <div class="button-wrap oh"><a class="button button-lg button-primary button-winona button-shadow-2" href="{{route('ourservice','gabion-box')}}" data-caption-animate="slideInUp" data-caption-delay="0">View more</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
@endisset

     
    </div>
    <!-- Swiper Pagination-->
    <div class="swiper-pagination" data-bullet-custom="true"></div>
    <!-- Swiper Navigation-->
    <div class="swiper-button-prev">
      <div class="preview">
        <div class="preview__img"></div>
      </div>
      <div class="swiper-button-arrow"></div>
    </div>
    <div class="swiper-button-next">
      <div class="swiper-button-arrow"></div>
      <div class="preview">
        <div class="preview__img"></div>
      </div>
    </div>
  </section>
  <!-- Carousel slider end-->


  <!-- About Company-->
  <section class="section section-md bg-gray-100 text-md-left section-relative">
    <div class="container">
      <div class="row row-40 row-lg-50 row-xl-60">
        <div class="col-sm-6 col-lg-4">
          <article class="box-icon-classic">
            <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
              <div class="unit-left">
                <div class="box-icon-classic-icon linearicons-hammer-wrench"></div>
              </div>
              <div class="unit-body">
                <h5 class="box-icon-classic-title"><a href="single-service.html">Modern Technology</a></h5>
                <p class="box-icon-classic-text">With the advancement of technology & market demand of gabion products, we started manufacturing gabion box by machine i.e machine fabricated gabion box.</p>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-lg-4">
          <article class="box-icon-classic">
            <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
              <div class="unit-left">
                <div class="box-icon-classic-icon linearicons-apartment"></div>
              </div>
              <div class="unit-body">
                <h5 class="box-icon-classic-title"><a href="single-service.html">Powerful Equipment</a></h5>
                <p class="box-icon-classic-text">We use modern &amp; powerful equipment and machine to create efficient and reliable infrastructure according to the market demand .</p>
              </div>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-lg-4">
          <article class="box-icon-classic">
            <div class="unit unit-spacing-lg flex-column text-center flex-md-row text-md-left">
              <div class="unit-left">
                <div class="box-icon-classic-icon linearicons-pencil-ruler"></div>
              </div>
              <div class="unit-body">
                <h5 class="box-icon-classic-title"><a href="single-service.html">Quality Materials</a></h5>
                <p class="box-icon-classic-text">We focus our attention on high quality raw materials as a specialized company, with technical personnel trained in the proper installation of these products</p>
              </div>
            </div>
          </article>
        </div>
      
      </div>
    </div>
  </section>
  <!-- About Company end-->


  <!-- What we offer-->
  <section class="section section-lg bg-default">
    <div class="container">
      <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">What we offer</span></h3>
      <div class="owl-carousel owl-style-3 dots-style-2" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-autoplay="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut">

        <!-- Services Creative-->
        @foreach($services as $row)
        <article class="services-creative">
          <a class="services-creative-figure" href="{{ route('ourservice',$row->slug) }}">
          <img src="{{asset('images/service/small/'.$row->image)}}" alt="" width="370" height="230"/></a>
          <div class="services-creative-caption">
            <h5 class="services-creative-title">
              <a href="{{ route('ourservice',$row->slug) }}">{{ $row->title }}</a>
            </h5>
            <p class="services-creative-text">
              {!! str_limit($row->text,84,'&nbsp;.....') !!}
            </p>
            <span class="services-creative-counter box-ordered-item">0{{$row->id}}</span>
          </div>
        </article>
        @endforeach
       
        
      </div>
    </div>
  </section>

  <!-- Section CTA parallax -->
  <section class="section parallax-container" 
    data-parallax-img="{{asset('images/featured/main.jpg')}}">
    <div class="parallax-content section-lg context-dark text-md-left">
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-sm-7 col-md-6 col-lg-5">
            <div class="cta-classic">
              <h4 class="cta-classic-title wow fadeInLeft">Creating efficient infrastructure since 2011</h4>
              <p class="cta-classic-text wow fadeInRight" data-wow-delay=".1s">We provide efficient civil engineering solutions.</p><a class="button button-lg button-primary button-winona wow fadeInUp" 
              href="{{route('ourservice','gabion-box')}}" data-wow-delay=".2s">Our services</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section CTA parallax end -->


  <!-- Gallery start -->
  <section class="section section-xl bg-default text-center">
    <div class="container">
      <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Bagmati Gabion At A Glance</span></h3>
    </div>
    <div class="container-fluid container-inset-0">
      <div class="row row-30 row-desktop-8 gutters-8 hoverdir" data-lightgallery="group">

        @foreach($galleries as $gallery)
        <div class="col-sm-6 col-lg-4 col-xxl-3">
          <div class="oh-desktop">
            <!-- Thumbnail Modern-->
            <article class="thumbnail thumbnail-modern wow slideInUp hoverdir-item" data-hoverdir-target=".thumbnail-modern-caption"><a class="thumbnail-modern-figure" href="{{asset('images/gallery/'.$gallery->image)}}" data-lightgallery="item">
              <img src="{{asset('images/gallery/small/'.$gallery->image)}}" /></a>
              <div class="thumbnail-modern-caption">
                <h5 class="thumbnail-modern-title"><a href="project-page.html">{{$gallery->title}}</a></h5>
              </div>
            </article>
          </div>
        </div>
        @endforeach
      
      </div>
    </div>
  </section>
  <!-- Gallery end -->


  <!-- testimonials and clients section-->
  <section class="section section-xl bg-gray-100 text-md-left">
    <div class="container">
      <div class="row row-60 justify-content-center flex-lg-row-reverse">
        <!-- testimonials start -->
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="offset-left-xl-70">
            <h3 class="oh-desktop"><span class="d-inline-block wow slideInLeft">Our clients</span></h3>
            <div class="slick-quote">
              <!-- Slick Carousel-->
              <div class="slick-slider carousel-parent" data-autoplay="true" data-swipe="true" data-items="1" data-child="#child-carousel-2" data-for="#child-carousel-2" data-slide-effect="true">

                @foreach($testimonials as $testimonial) 
                <div class="item">
                  <!-- Quote Modern-->
                  <article class="quote-modern">
                    <h5 class="quote-modern-text"><span class="q"> {!! $testimonial->message !!} </span></h5>
                    <h5 class="quote-modern-author">{{$testimonial->name}},</h5>
                    <p class="quote-modern-status">“{{$testimonial->company}}” &nbsp;,&nbsp; {{$testimonial->position}}</p>
                  </article>
                </div>
                @endforeach

              </div>
              <div class="slick-slider child-carousel ml-auto" id="child-carousel-2" data-arrows="true" data-for=".carousel-parent" data-items="4" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-slide-to-scroll="1">

                @foreach($testimonials as $testimonail) 
                <div class="item">
                  <img class="img-circle" src="{{asset('images/testimonial/'.$testimonail->image)}}" alt="" width="83" height="83"/>
                </div>
                @endforeach

              </div>
            </div>
          </div>
        </div>
        <!-- testimonials end -->


        <!-- partners logo section -->
        <div class="col-lg-6 col-xl-7">
          <!-- Clients Classic-->
          <div class="clients-classic-wrap">
            <div class="row no-gutters">
              <div class="col-sm-6 wow fadeInLeft">
                <div class="clients-classic"><a class="clients-classic-figure" href="#">
                  <img src="{{asset('images/clients-1-200x90.png')}}" alt="" width="200" height="90"/></a></div>
              </div>
              <div class="col-sm-6 wow fadeInRight">
                <div class="clients-classic"><a class="clients-classic-figure" href="#">
                  <img src="{{asset('images/clients-2-200x90.png')}}" alt="" width="200" height="90"/></a></div>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-sm-6 wow fadeInLeft">
                <div class="clients-classic"><a class="clients-classic-figure" href="#">
                  <img src="{{asset('images/clients-3-200x90.png')}}" alt="" width="200" height="90"/></a></div>
              </div>
              <div class="col-sm-6 wow fadeInRight">
                <div class="clients-classic"><a class="clients-classic-figure" href="#">
                  <img src="{{asset('images/clients-4-200x90.png')}}" alt="" width="200" height="90"/></a></div>
              </div>
            </div>
            <div class="row no-gutters">
              <div class="col-sm-6 wow fadeInLeft">
                <div class="clients-classic"><a class="clients-classic-figure" href="#">
                  <img src="{{asset('images/clients-5-200x90.png')}}" alt="" width="200" height="90"/></a></div>
              </div>
              <div class="col-sm-6 wow fadeInRight">
                <div class="clients-classic"><a class="clients-classic-figure" href="#">
                  <img src="{{asset('images/clients-6-200x90.png')}}" alt="" width="200" height="90"/></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- partners logo section end -->

      </div>
    </div>
  </section>
  <!-- testimonials and clients section end-->


  <!-- cta project complete number section -->
  <section class="section parallax-container" data-parallax-img="{{asset('images/featured/main2.jpg')}}">
    <div class="parallax-content section-inset-9 context-dark">
      <div class="container">
         @isset($company_info)
        <div class="row row-30 justify-content-center justify-content-xl-between align-items-lg-end">
          <div class="col-sm-6 col-md-4">
            <div class="counter-classic">


             

              <h3 class="counter-classic-number"><span class="counter">{{ $company_info->projects }}</span>
              </h3>
              <h6 class="counter-classic-title">projects</h6>
              <div class="counter-classic-decor"></div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="counter-classic">
              <h3 class="counter-classic-number"><span class="counter">{{ $company_info->partners }}</span>
              </h3>
              <h6 class="counter-classic-title">partners</h6>
              <div class="counter-classic-decor"></div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="counter-classic">
              <h3 class="counter-classic-number"><span class="counter">{{ $company_info->clients }}</span>
              </h3>
              <h6 class="counter-classic-title">new clients</h6>
              <div class="counter-classic-decor"></div>
            </div>
          </div>
        </div>
              @endisset
        
      </div>
    </div>
  </section>
  <!-- cta project complete number section end -->


  <!-- team section-->
  <section class="section section-xl bg-default text-md-left">
    <div class="container">
      <div class="row row-30">
        <div class="col-md-5 col-lg-4 col-xl-3">
          <div class="box-team">
            <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Our team</span></h3>
            <h6 class="title-style-1 wow fadeInLeft" data-wow-delay=".1s">Professional Manufacturing Team</h6>
            <p class="wow fadeInRight" data-wow-delay=".2s">We are a team of dedicated professionals and project managers ready to help.</p>
            <div class="group-sm oh-desktop">
              <div class="button-style-1 wow slideInLeft"><span class="icon mdi mdi-email-outline"></span><span class="button-style-1-text"><a href="{{route('contactus')}}">Contact us</a></span></div>
              <div class="wow slideInRight">
                <div class="owl-custom-nav" id="owl-custom-nav-1"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-lg-8 col-xl-9">
          <div class="owl-carousel owl-style-5" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-autoplay="false" data-animation-in="fadeIn" data-animation-out="fadeOut" data-navigation-class="#owl-custom-nav-1">
            <!-- Team Modern-->

            @foreach($teams as $team)
            <article class="team-modern"><a class="team-modern-figure" href="#">
              <img src="{{asset('images/team/'.$team->image)}}" alt="" width="270" 
                  height="236"/></a>
              <div class="team-modern-caption">
                <h6 class="team-modern-name"><a href="#">{{ $team->name }}</a></h6>
                <div class="team-modern-status">{{ $team->position }}</div>
                <ul class="list-inline team-modern-social-list">
                  <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                  <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                  <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                  <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                </ul>
              </div>
            </article>
            @endforeach
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- team section-->


  <!-- quotation parallax-->
  <section class="section parallax-container" data-parallax-img="{{asset('images/bg-forms-1.jpg')}}">
    <div class="parallax-content section-md context-dark text-md-left">
      <div class="container">
        <div class="row row-30 justify-content-center align-items-center">
          <div class="col-lg-8 col-xl-6 justify-content-center align-items-center">
            <h5 class="oh-desktop text-center"><a class="d-inline-block wow slideInDown" href="{{route('contactus')}}">Contact Us For Quotation</a></h5>
          </div>
        </div>
      </div>
    </div>
  </section>




@endsection
