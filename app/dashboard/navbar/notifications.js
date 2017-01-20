define([
	
	'backbone'

],	function(Backbone){


		var model = Backbone.Model.extend({

		  url: "http://pointsnap.ca/app/api/notifs.php"
	
		});

		return Backbone.Collection.extend({

		  url: "http://pointsnap.ca/app/api/notifs.php"
		
		, model: model

		});

});
