<template>
	<div class="container">
		
		<div class="row pt-5">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							About Us
						</h3>
					</div>
					<div class="card-body">
						<div class="row">

							<div class="col-md">

								<vue-editor 
									v-model="value.aboutus"
									placeholder="About Company Info"
								>
										
								</vue-editor>
								<button @click="saveAboutUs" class="btn btn-primary">Save</button>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div> <!-- row end -->

		<div class="row pt-5">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							Message From CEO 
						</h3>
					</div>
					<div class="card-body">
						<div class="row">

							<div class="col-md">

								<vue-editor 
									v-model="value.message"
									placeholder="CEO Message"
								>
										
								</vue-editor>
								<button @click="saveMessage" class="btn btn-primary">Save</button>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div> <!-- row end -->

		<div class="row pt-5">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							Basic Company Info
						</h3>
					</div>
					<div class="card-body">
						<div class="row">

							<div class="col-md-6">
								<h4 class="text-purple">Basic Info</h4>
								<div class="form-group">
									<label>Location</label>
									<input type="text" name="location" placeholder="Location" class="form-control" v-model="value.location">
								</div>
								<div class="form-group">
									<label>Mail</label>
									<input type="mail" name="email" placeholder="Email" class="form-control" v-model="value.mail">
								</div>
								<div class="form-group">
									<label>Mobile Number</label>
									<input type="text" name="mobile" placeholder="Mobile Number" class="form-control" v-model="value.mobile">
								</div>
								<div class="form-group">
									<label>Telephone Number</label>
									<input type="text" name="telephone" placeholder="Phone Number" class="form-control" v-model="value.telephone">
								</div>
								<div class="form-group">
									<button @click="saveBasicInfo" class="btn btn-primary">Save</button>
								</div>

							</div>

							<div class="col-md-6">

								<h4 class="text-purple">Social Info</h4>

								
								<div class="form-group">
						          	<div>
						            	<label>Facebook Page Link</label>
						          	</div>
						          <div class="input-group input-group-md">
						            <div class="input-group-prepend">
						            <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
						            </div>
						              <input type="text" name="fb_link" placeholder="Facebook Page Link" class="form-control" v-model="value.fb_link">
						          </div>
						        </div>

								<div class="form-group">
							    	<div>
					           		 	<label>Twitter Page Link</label>
							    	</div>
								    <div class="input-group input-group-md">
							            <div class="input-group-prepend">
							            	<span class="input-group-text"><i class="fab fa-twitter"></i></span>
							            </div>
						           		 <input type="text" name="tw_link" placeholder="Twitter Page Link" class="form-control" v-model="value.tw_link">
						            </div>
								</div>
								
								<div class="form-group">
									<button @click="saveSocialInfo" class="btn btn-primary">Save</button>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div> <!-- row end -->

		<div class="row pt-5">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							Company Project Info 
						</h3>
					</div>
					<div class="card-body">
						<div class="row">

							<div class="col-md">

								<div class="form-group">
									<div>
										<label for="clients">Clients</label>
									</div>
									<input type="number" name="clients" placeholder="Number of Clients" class="form-control" v-model="value.clients">
								</div>
								<div class="form-group">
									<label>Projects</label>
									<input type="number" name="projects" placeholder="Number of Projects" class="form-control" v-model="value.projects">
								</div>
								<div class="form-group">
									<label>Partners</label>
									<input type="number" name="partners" placeholder="Number of Partners" class="form-control" v-model="value.partners">
								</div>
								
								<div class="form-group">
									<button @click="saveProjectInfo" class="btn btn-primary">Save</button>
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div> <!-- row end -->

	</div> <!-- container end -->
</template>

<script>



import { VueEditor } from 'vue2-editor';
 

	

	export default{

		components: { VueEditor },
		

		data() {
			return {

				value:
					{"id":undefined,"created_at":"","updated_at":"","aboutus":"","message":"","mobile":null,"telephone":null,"location":null,"mail":null,"fb_link":null,"tw_link":null,"projects":null,"partners":null,"clients":null}
				
			}
		} ,

		mounted(){

		    this.loadInfo();

		},

		
		methods: {

			loadInfo(){
				axios.get("api/company/info")
				    .then((response) => {
				        // console.log(response.data);
				        this.value = response.data;
				    })
				    .catch();

				    // console.log(this.data);
			},

			saveMessage(e){
				// console.log(this.info.company.message);
				// progressbar start
	               this.$Progress.start();
	               let data = this.value;

	               axios.post('api/about/message' , data)
	                      .then(() => {

	                           // progressbar finish
	                           this.$Progress.finish();


	                           // toast message is fired
	                           Toast.fire({
	                             type: 'success',
	                             title: 'Message Updated successfully'
	                           })


	                      })
	                      .catch(()=>{
	                           // progressbar fail
	                           this.$Progress.fail()
	                      })

			},

			saveAboutUs(e){
				// console.log(this.value);
				// progressbar start
	               this.$Progress.start();

	               axios.post('api/about/info' , this.value)
	                      .then(() => {

	                           // progressbar finish
	                           this.$Progress.finish();


	                           // toast message is fired
	                           Toast.fire({
	                             type: 'success',
	                             title: 'About Us Info Updated successfully'
	                           })


	                      })
	                      .catch(()=>{
	                           // progressbar fail
	                           this.$Progress.fail()
	                      })
			},

			saveBasicInfo(e){
				console.log(e);

				this.$Progress.start();

				axios.post('api/basic/info' , this.value)
				       .then(() => {

				            // progressbar finish
				            this.$Progress.finish();


				            // toast message is fired
				            Toast.fire({
				              type: 'success',
				              title: 'Basic Info Updated successfully'
				            })


				       })
				       .catch(()=>{
				            // progressbar fail
				            this.$Progress.fail()
				       })
			},

			saveSocialInfo(e){
				this.$Progress.start();

				axios.post('api/social/info' , this.value)
				       .then(() => {

				            // progressbar finish
				            this.$Progress.finish();


				            // toast message is fired
				            Toast.fire({
				              type: 'success',
				              title: 'Social Info Updated successfully'
				            })


				       })
				       .catch(()=>{
				            // progressbar fail
				            this.$Progress.fail()
				       })
			},

			saveProjectInfo(e){
				this.$Progress.start();

				axios.post('api/project/info' , this.value)
				       .then(() => {

				            // progressbar finish
				            this.$Progress.finish();


				            // toast message is fired
				            Toast.fire({
				              type: 'success',
				              title: 'Project Info Updated successfully'
				            })


				       })
				       .catch(()=>{
				            // progressbar fail
				            this.$Progress.fail()
				       })
			},
			
		}

	}
</script>