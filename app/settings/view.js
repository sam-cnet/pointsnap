define([

	'jquery',
	'backbone',
	'underscore',
	'text!app/template.html'
],	function($,Backbone, _,template){

	  return Backbone.View.extend({


	   el: "#main",

	   template: _.template(template),

	   initialize: function(){

	     this.render();

	   },

	   events: {

		"click #submit" : "submit"

	   },
	
	   submit: function(e) {


		e.preventDefault();
	
		console.log($("company_name").val());

	   },

	   render: function(){

		$(".preload").fadeOut("fast");

		console.log(this.collection);
	
		this.$el.html(this.template({collection: this.collection}));
	   }

	  });

});
