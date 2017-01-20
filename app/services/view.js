define([

	'jquery',
	'backbone',
	'underscore',
	'text!app/template.html',
	'app/collection',

],	function($,Backbone, _,template,Collection){

	  return Backbone.View.extend({


	   el: "#main",

	   template: _.template(template),

	   initialize: function(){

	     this.render();

	   },

	
	   render: function(){

		$(".preload").fadeOut("fast");
	
		var that = this;

		var collection = new Collection();			

		collection.fetch({

		  success: function(collection){
		
		    that.$el.html(that.template({collection:collection}));
			
		  }	

		});	
	   }

	  });

});
