 <!-- Page Footer-->
      <footer class="section footer-classic context-dark footer-classic-2">
        <div class="footer-classic-content">
          <div class="container">
            <div class="row row-50 row-lg-0 no-gutters">

              <!-- first box -->
              <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
                <div class="footer-classic-header">
                  <h6 class="footer-classic-title">Quick links</h6>
                </div>
                <div class="footer-classic-body">
                  <ul class="footer-classic-list d-inline-block d-sm-block">
                    <li><a href="#">Our History</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Latest News</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                  <ul class="list-inline footer-social-list">
                    <li><a class="icon mdi mdi-facebook" href="{{ $company_info->fb_link }}" target="_blank"></a></li>
                    <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                    <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                    <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                  </ul>
                </div>
              </div>
              <!-- first box end-->

              <!-- second box -->
              <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".1s">
                <div class="footer-classic-header">
                  <div class="box-width-230">
                    <h6 class="footer-classic-title">Get in touch</h6>
                  </div>
                </div>
                <div class="footer-classic-body">
                  <div class="box-width-230">
                    <div class="footer-classic-contacts">
                      <div class="footer-classic-contacts-item">
                        <div class="unit unit-spacing-sm align-items-center">
                          <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                          <div class="unit-body"><a class="phone" href="#">{{ $company_info->telephone }}</a></div>
                        </div>
                      </div>
                      <div class="footer-classic-contacts-item">
                        <div class="unit unit-spacing-sm align-items-center">
                          <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                          <div class="unit-body"><a class="mail" href="#">{{ $company_info->mail }}</a></div>
                        </div>
                      </div>
                    </div><a class="button button-sm button-primary button-winona" href="{{route('contactus')}}">Request a quotation</a>
                  </div>
                </div>
              </div>
              <!-- second box end-->

              <!-- third box start map -->
              <div class="col-lg-4 position-static">
                <div class="footer-classic-gmap">
                  <iframe src="http://maps.google.com/maps?q=27.9596726,85.1717601&z=13&output=embed" width="500px" height="350px"></iframe>
                </div>
              </div>
              <!-- third box end -->

            </div>
          </div>
        </div>
        <div class="footer-classic-panel">
          <div class="container">
            <!-- Rights-->
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Bagmati Gabion Box Pvt. Ltd.</span></a></p>
          </div>
        </div>
      </footer>

     