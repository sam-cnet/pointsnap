define([

	'backbone'

],	function(Backbone){
	
	  return Backbone.Collection.extend({

	     url: "http://pointsnap.ca/app/api/customers.php"
	  });

	});
