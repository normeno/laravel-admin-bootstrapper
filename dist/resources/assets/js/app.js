'use strict';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// preview avatar
$(document).on('change', 'input[name=avatar]', function () {
  if ($("input[name=avatar]").val()) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#avatar-preview').attr('src', e.target.result);
    };

    reader.readAsDataURL($("input[name=avatar]")[0].files[0]);
  }
});

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

var app = new Vue({
  el: '#app'
});
//# sourceMappingURL=app.js.map