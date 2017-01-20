define([
	'jquery',
	'backbone',
	'underscore',
        'text!app/modules/customers/template.html'
], 	


	function($,Backbone,_,template){

	return Backbone.View.extend({

	  el: "#main",

	  template: function(){

	    return _.template(template)
	
	  },

	  initialize: function(){
	
	    this.render();

	  },

	  render: function(model){

	    $(".preload").fadeOut("fast");
	
	    this.$el.html(this.template);	

	  }

	});

});
