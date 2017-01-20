define([

	'jquery',
	'backbone',
	'underscore',
	'text!app/template.html',
	'app/collection'
],	function($,Backbone, _,template,Collection){

	  return Backbone.View.extend({


	   el: "#main",

	   template: _.template(template),

	   initialize: function(){

	     this.render();
	   },

	   events: {

	    "click #delete" : "delete"	

	   },

	   render: function(){

		$(".preload").fadeOut("fast");

		var that = this;

	        var collection = new Collection();
		collection.fetch({

		  success: function(model){
		     that.$el.html(that.template({model:model}));

		     $(".dropdown-button").dropdown();
	
	
		  }
		});
	   },

	   delete: function(e){

		e.preventDefault();

	        var id = e.target.attributes.getNamedItem('data-customer_id').value;	

		var that = this;

		$.ajax({

		  url: "http://pointsnap.ca/app/api/customers.php?" + $.param({"id":id, "action":"delete"}),

		  type: "GET",

		  success: function(){

			that.render();
		  }

		});

	   }

	  });

});
