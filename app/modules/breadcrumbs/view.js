define([

	'jquery',
	'backbone',
	'underscore',
	'text!app/modules/breadcrumbs/template.html',
	'materialize'

],	function($,Backbone, _, template){



	  return Backbone.View.extend({


	   el: "#breadcrumbs",

	   template: _.template(template),

	   initialize: function(){

		
	     this.render();

	   },

	
	   render: function(){
		
		this.$el.html(this.template);

		$(".modal").modal();

	   }

	  });

});
