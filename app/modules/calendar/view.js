define([

	'jquery',
	'backbone',
	'underscore',
	'moment',
	'fullcalendar',
	'text!app/modules/calendar/template.html'
],	function($,Backbone, _,moment,fullcalendar,template){

	  return Backbone.View.extend({


	   el: "#main",

	   template: _.template(template),

	   initialize: function(){

	     this.render();

	   },

	
	   render: function(){

		$(".preload").fadeOut("fast");
	
		this.$el.html(this.template);

		$("#fullcalendar").fullCalendar({
	
	  	  events: "api/index.php?action=getEvents"		
		
		});

	   }

	  });

});
