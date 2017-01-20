define([
	
	'jquery',
	'underscore',
	'backbone',
	'text!app/modules/customers/subnav/template.html'

],	function($,_,Backbone,template){



	  $("#breadcrumbs").html("");

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
