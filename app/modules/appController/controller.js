define([

	'jquery'

],	function($){


   	return Backbone.View.extend({


	  el: $("body"),

	  render: function(childView){

	   childView.remove(); 

	  },

	  initialize: function(){ this.render(); },

	});	


});
