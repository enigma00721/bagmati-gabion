@extends('frontend.layout.app')

@section('title','Bagmati Gabion')

@section('content')

	<!-- Breadcrumbs -->
	<section class="bg-gray-7">
	  <div class="breadcrumbs-custom box-transform-wrap context-dark">
	    <div class="container">
	      <h3 class="breadcrumbs-custom-title">About Us</h3>
	      <div class="breadcrumbs-custom-decor"></div>
	    </div>
        <div class="box-transform" style="background-image: url({{asset('images/featured/main2.jpg')}});"></div>
        
	  </div>
	  <div class="container">
	    <ul class="breadcrumbs-custom-path">
	      <li><a href="{{route('front')}}">Home</a></li>
	      <li class="active">About Us</li>
	    </ul>
	  </div>
	</section>


	<!-- About-->
	<section class="section section-lg bg-default">
	  <div class="container">
	    <div class="tabs-custom row row-50 justify-content-center flex-lg-row-reverse text-center text-md-left" id="tabs-4">
	      <div class="col-lg-4 col-xl-3">
	        <h5 class="text-spacing-200 text-primary">10 years of experience</h5>
	        <ul class="nav list-category list-category-down-md-inline-block">
	          <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay="0s"><a class="active" href="#tabs-4-1" data-toggle="tab">MESSAGE FROM CEO</a></li>
	          <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay=".1s"><a href="#tabs-4-2" data-toggle="tab">About Us</a></li>
	          <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay=".2s"><a href="#tabs-4-3" data-toggle="tab">OUR MISSION & Philosophy</a></li>
	          <li class="list-category-item wow fadeInRight" role="presentation" data-wow-delay=".3s"><a href="#tabs-4-4" data-toggle="tab">OUR Products</a></li>
	        </ul><a class="button button-lg button-primary button-winona" href="{{route('contactus')}}">Contact us</a>
	      </div>
	      <div class="col-lg-8 col-xl-9">
	        <!-- Tab panes-->
	        <div class="tab-content tab-content-1">
	          <div class="tab-pane fade show active" id="tabs-4-1">
	            <h4>RABINDRA BUDHATHOKI</h4>
	            	
	            <p>{!! $company_info->message !!}</p>
				
	            <img src="images/about-1-835x418.jpg" alt="" width="835" height="418"/>
	          </div>
	          <div class="tab-pane fade" id="tabs-4-2">
	            <h4>Providing quality services</h4>
	            <p>{!! $company_info->aboutus !!}</p>
	          </div>
	          <div class="tab-pane fade" id="tabs-4-3">
	            <h4>creating Better Infrastructure</h4>
	            <p>Being the biggest GI wire mesh manufacturers in Nepal, our mission is to create
					relationships of trust with our customers by being a recognized company that is
					through the acceptance and preference of our products. We are committed to
					fulﬁlling the 100% satisfaction of the needs and demands of all our local and
					global clients. Bagmati Gabion Box does this by oﬀering high-quality products,
					timely deliveries, continuous improvements in its processes.</p>
					<p>
						Philosophy at Bagmati Gabion Box Pvt. Ltd. has always allowed us to have very
						clear goals, to satisfy the needs of our local and national client by delivering the
						best Nepal GI wire mesh products, in the given time and at a fair price. It is for
						this reason we have stick to business philosophy, with the aim of maintaining
						leadership by supplying the quality and prices that no one else in the market
						can oﬀer.
					</p>
	          </div>
	          <div class="tab-pane fade" id="tabs-4-4">
	            <h4>VARIETY OF PRODUCTS</h4>
	           	<p>Bagmati Gabion Box oﬀers the most suitable products for the type of enclosure
				you need, starting with the advantage that all the materials used in the
				installation. We provide excellent quality and very competitive price to all our
				new and old customers. Some of the products that our clients love are Gabion
				Wire Box, Fencing Chain Fence & Nails that are ideal for industrial, construction,
				decorative and security use.</p>
				<p>
					We focus our attention on high quality raw materials as a specialized company,
					with technical personnel trained in the proper installation of these products,
					resulting in work with well-installed ﬁnishes and guaranteed security. All our GI
					wire mesh PIONEER WIRES products comply with NS quality. Also, our
					professional and technical staﬀ have safety equipment and accident insurance
					supplementary for risky work.
				</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>


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