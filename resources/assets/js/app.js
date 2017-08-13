
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./bootstrap-tagsinput.js');
require('./material.js');
require('./ripples.js');
require('./bootstraptypehead.js');
require('./custom.js');


// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


$.material.init()

// $( function() {
//   $( "#datepicker" ).datepicker();
// });


$( document ).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({'placement': 'right'});
});

// Let create


$("#clientNaziv", "#staffsID").tagsinput('items');

$('form').on('keypress', function(e) {
    return e.which !== 13;
});
