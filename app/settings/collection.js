define([

	'backbone'
], 

		function(Backbone){


		return Backbone.Collection.extend({

		  url: "/app/api/settings.php"
		});

});
