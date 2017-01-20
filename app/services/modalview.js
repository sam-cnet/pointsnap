define([

	'backbone',
	'jquery',
	'underscore',
	'text!app/modal.html'],


	function(Backbone,$,_,template){

	return Backbone.View.extend({

	  el: "#calModal",

	  template: _.template(template),	 

	  initialize: function(){


	  },

	  events: {
	
	      "click #save":"save"

	  },

	   render: function(){

		this.$el.html(this.template(this.model));

		$(".modal").modal({

		  starting_top: '20%'

		});

		$("#modal2btn").click();

		console.log(this.model);
	   },

	   save: function(){

	
	   }

	});


});
