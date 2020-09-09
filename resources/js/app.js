/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';

// datetime formatting api
import moment from 'moment'

//message toasting api
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast
window.Fire = new Vue();

import VueProgressBar from 'vue-progressbar'

const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    height: '5px',
    transition: {
      speed: '0.2s',
      opacity: '0.6s',
      termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
  }
Vue.use(VueProgressBar, options)

// Vue Form 
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/departments', component: require('./components/Departments.vue').default },
    { path: '/sites', component: require('./components/MineSites.vue').default },
    { path: '/medical-history', component: require('./components/MedicalHistory.vue').default },
    { path: '/concerns', component: require('./components/WorkersConcerns.vue').default },
    { path: '/leaves', component: require('./components/Leaves.vue').default },
    { path: '/add-employee', component: require('./components/AddEmployee.vue').default },
    { path: '/employees-list', component: require('./components/EmployeesList.vue').default },
    { path: '/employees-contacts', component: require('./components/EmployeesContacts.vue').default },
    { path: '/employees-dependants', component: require('./components/EmployeesDependants.vue').default },
    { path: '/employees-nextofkins', component: require('./components/EmployeesNextOfKins.vue').default },
    { path: '/employees-education', component: require('./components/EmployeesEducation.vue').default },
    { path: '/employees-salary', component: require('./components/EmployeesSalary.vue').default },
    { path: '/employees-transfer-history', component: require('./components/EmployeesTransferHistory.vue').default },
    { path: '/employees-change-of-status', component: require('./components/EmployeesChangeOfStatus.vue').default },
    { path: '/employees-upgrade-history', component: require('./components/EmployeesUpgradeHistory.vue').default },
    { path: '/disciplinary-actions', component: require('./components/DisciplinaryActions.vue').default },
    { path: '/employees-accounts-details', component: require('./components/EmployeesAccountsDetails.vue').default },
    { path: '/attendance', component: require('./components/Attendance.vue').default },
    { path: '/payroll', component: require('./components/Payroll.vue').default },
    { path: '/employment-history', component: require('./components/EmploymentHistory.vue').default },
    { path: '/calender', component: require('./components/Calender.vue').default },
    { path: '/employee-beneficiary', component: require('./components/Beneficiary.vue').default },
  ]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

//   Vue.filter('capitalize', function(text){
//     return text.charAt(0).toUpperCase() + text.slice(1);
// });

Vue.filter('formatDate', function(date){
    return moment(date).format('MMMM Do YYYY');
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('dashboard', require('./components/Dashboard.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
})
