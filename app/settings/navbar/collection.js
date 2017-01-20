define([

	'backbone'

], 	function(Backbone){

	  var model = Backbone.Model.extend({});
	
	  return Backbone.Collection.extend({

	    model: model

	  });

	});
