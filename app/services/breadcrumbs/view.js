define([
	
	'jquery',
	'underscore',
	'backbone',
	'text!app/breadcrumbs/template.html'

],	function($,_,Backbone,template){


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
