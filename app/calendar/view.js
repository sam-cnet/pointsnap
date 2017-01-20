define([

	'jquery',
	'backbone',
	'underscore',
	'moment',
	'fullcalendar',
	'app/modalview',
	'text!app/template.html'
],	function($,Backbone, _,moment,fullcalendar,modalView,template){

	  return Backbone.View.extend({


	   el: "#main",

	   template: _.template(template),

	   initialize: function(){

	     this.render();


		    
		     $(document).keypress(function(key){

			if(key.which == 109){

			   var editable = true; 
			}
			
	
		     });
 

	   },

	
	   render: function(){

		$(".preload").fadeOut("fast");
	
		this.$el.html(this.template);


	        setTimeout(function(){

		$("#fullcalendar").fullCalendar({

		  header: {

		    right: 'month basicWeek basicDay prev,next'
	
		  },

		  businessHours: {

		     start: '09:00',
		     end: '17:00'
		  },
	
		  contentHeight: 850,
		
	  	  events: "../api/index.php?action=getEvents",		
	
		  eventClick: function(calEvent){

		     var modalview = new modalView({model: calEvent});
		     modalview.render();

                  },
		
		  eventRender: function(event,element){

		     element.append(event.status);
		     $(document).find(".fc-title").remove();
		     
		  },

		  dayClick: function(date, jsEvent, view){

		     var newDate = new Date(date); 
		
		     var year = newDate.getFullYear();
		     
		     var month = newDate.getMonth() + 1;
		
		     var day = newDate.getDate() + 1;
 
		     $("#modal1btn").click();	  	  

		     $("#startDate").val(month + "/" + day + "/" + year);		     

		     //$("#newappointment h4").append(" On " + month + "/" + day + "/" + year);
	
		     Materialize.updateTextFields();
		  }
	
		});
		}, 100);

		$(".fc-scroller").css("overflow-y", "hidden");


		


	   }

	  });

});
