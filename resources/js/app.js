

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)
Vue.forceUpdate ;


// ckeditor
 


// ------------- for validation --------------------
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)



// ------------- progressbar ---------
import VueProgressBar from 'vue-progressbar'


// -------------- sweet alert2 --------------
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.Toast = Toast;
// -------------- sweet alert2 --------------


let Fire = new Vue();
window.Fire = Fire;
// window.Fire = new Vue();





Vue.component(
  'not-found' , 
  require('./components/NotFound.vue')
);


//   without default doesn't render the component
let routes = [
  { path: '/home', component: require('./components/Dashboard.vue').default},
  { path: '/images/ajax-loader.gif', component: require('./components/Dashboard.vue').default},
  { path: '/slider', component: require('./components/Slider.vue').default},
  { path: '/team', component: require('./components/Team.vue').default },
  { path: '/user', component: require('./components/User.vue').default },
  { path: '/contact', component: require('./components/Contact.vue').default },
  { path: '/service', component: require('./components/Service.vue').default },
  { path: '/gallery', component: require('./components/Gallery.vue').default },
  { path: '/info', component: require('./components/Info.vue').default },
  { path: '/testimonial', component: require('./components/Testimonial.vue').default },
  { path: '*', component: require('./components/NotFound.vue').default },
]

const router = new VueRouter({
	mode:'history',
	routes
})



// --------------- global filters --------------

	// ------------ text filter -------------------
Vue.filter('capitalWhole', function (text) {
	return text.toUpperCase();
})

Vue.filter('capitalText', function (text) {
  if (!text) return ''
  text = text.toString()
  return text.charAt(0).toUpperCase() + text.slice(1)
})


Vue.filter('striphtml', function (value) {
  var div = document.createElement("div");
  div.innerHTML = value;
  var text = div.textContent || div.innerText || "";
  return text;
});




// --------------- progress bar --------------
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '4px'
})





const app = new Vue({
	el:"#app" ,
    router
});
