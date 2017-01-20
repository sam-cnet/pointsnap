define([
	
	'jquery',
	'underscore',
	'backbone',
	'text!app/subnav/template.html',
	'app/maps/view'

],	function($,_,Backbone,template){


	  return Backbone.View.extend({

	    el: "#subnav",

	    template: _.template(template),

	    initialize: function(){

		this.render();
	    },

	    render: function(){

		this.$el.html(this.template);

		$(".modal").modal();
		
		$("#start").pickadate();

		$("#startTime").pickatime();	
	
	        $("#service").material_select();
		$("#status").material_select(); 
		$("#customer").material_select();     


	    } 

	  });
	

	});
