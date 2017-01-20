define([

	'backbone',
	'underscore',
	'text!app/maps/template.html'	

],	function(Backbone,_,template) {


		return Backbone.View.extend({

		  template: _.template(template),

		  initialize: function() {

		    
		  },
 
		  render: function() {

		     $("div[data-view='map']").html(template);

		     
		  } 		


		});

	});
