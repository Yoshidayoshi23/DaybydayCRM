/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('graphline', require('./components/Example.vue'));


$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".sidebar-brand").toggleClass("shownone");
    });
        
        $(document).ready( function() {
$('.dropdown-toggle').dropdown();
});
        
$('.dropdown.keep-open').on({
    "shown.bs.dropdown": function() { this.closable = false; },
    "click":             function() { this.closable = true; },
    "hide.bs.dropdown":  function() { return this.closable; }
});


$("#collapse1").click(function() {

	$(".box-body1").toggleClass("hide");
});

$(function () {
     $('.panel-collapse').collapse('show');
     $("#collapse1").click(function(){
     $("#toggler1").toggleClass("fa fa-minus fa fa-plus") 
    });
    $("#collapse2").click(function(){
     $("#toggler2").toggleClass("fa fa-minus fa fa-plus") 
    });
   $("#collapse3").click(function(){
     $("#toggler3").toggleClass("fa fa-minus fa fa-plus") 
    });
    $("#collapse4").click(function(){
     $("#toggler4").toggleClass("fa fa-minus fa fa-plus") 
    });
    var active = false;
  
    $('#collapse-init').click(function () {
        if (active) {
            active = false;
            $('.panel-collapse').collapse('show');
            $('.panel-title').attr('data-toggle', '');
            $(this).text('Hide all');
        } else {
            active = true;
            $('.panel-collapse').collapse('hide');
            $('.panel-title').attr('data-toggle', 'collapse');
            $(this).text('Show All');
        }
    });
    
    $('#accordion').on('show.bs.collapse', function () {
        if (active) $('#accordion .in').collapse('hide');
    });

});


$('.notification-warning').delay(5000).fadeOut(2500);
$('.notification-success').delay(5000).fadeOut(2500);

$('.search-select')
  .dropdown({
    direction: 'upward'
  })
;
var app = new Vue({
    el: '#wrapper',
    components: ['graphbar', 'graphline']
});