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

	   },

	
	   render: function(){

		$(".preload").fadeOut("fast");
		
		var Collection = Backbone.Collection.extend({

		  url: "http://pointsnap.ca/app/api/index.php?action=getEvents"

		});
	
		var collection = new Collection();		

		var that = this; 

		collection.fetch({
		
		  success:function(collection){	

		    var start = [];

		    _.each(collection.models, function(appointment) {
			var date = new Date(appointment.get("start"));

			start.push(date);
		    });
	
		    for(var i = 0; i < start.length; i++){

			var today = new Date();
			//console.log(start[i].getMonth());
		    }

		    that.$el.html(that.template({collection:collection}));
		  }

		});

		
	     }

	  });

});
