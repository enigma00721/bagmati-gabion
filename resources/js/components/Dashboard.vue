<template>
    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{count.user}}</h3>

                    <p>User</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user"></i>
                  </div>
                  <router-link to="/user" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </router-link>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{count.slider}}</h3>

                    <p>Slider</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-photo-video"></i>
                  </div>
                  <router-link to="/slider" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </router-link>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{count.contact}}</h3>

                    <p>Contact</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <router-link to="/contact" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </router-link>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{count.service}}</h3>

                    <p>Service</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-shipping-fast"></i>
                  </div>
                  <router-link to="/servicec" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </router-link>
                </div>
            </div>

        </div>
        <!-- <not-found></not-found> -->
    </div>
</template>

<script>
    export default {
     
      data(){
        return{

          count: []

        }
      } ,

      mounted() {
        axios.get("api/getDashboardData")
          .then((data) => {
            console.log(data);
            this.count = data.data;
          });
      }

    } // export default end
</script>
