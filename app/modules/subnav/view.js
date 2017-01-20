define([

	'jquery',
	'backbone',
	'underscore',
	'text!app/modules/subnav/template.html',
	'materialize'

],	function($,Backbone, _, template){


	  var model = Backbone.Model.extend({

	     default: {

		"name" : "default"
	     }

	  });


	  return Backbone.View.extend({

	   el: "#breadcrumbs",

	   template: _.template(template),

	   initialize: function(){
	
		this.render();

	   },

	
	   render: function(){
		
		this.$el.html(this.template);

	   }

	  });

});
