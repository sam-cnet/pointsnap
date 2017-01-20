require([

	'jquery',
	'backbone',
	'app/view',
	'app/navbar/view',
	'app/subnav/view',
	'app/breadcrumbs/view',
	'app/collection'

], 	function($,Backbone,mainView,navbarView,subnavView,breadcrumbsView,Collection){


	var router = Backbone.Router.extend({

	  routes: {


		"main"   : "main",
		""	     : "empty"
	  },
	

	  initialize: function(){

	    new navbarView();
	    new subnavView();
	    //new breadcrumbsView();

	  },

	  main: function(){
	

	    var collection = new Collection();
	
	    collection.fetch({

		success: function (collection){

		new mainView({collection: collection});

		}
	    });


      	   }


	});


	var appRouter = new router();


	appRouter.on('route:main', function(){

            this.navigate('main',{trigger:true})

        });

	appRouter.on('route:empty', function(){
	
	    this.navigate('main',{trigger:true})

	});

	Backbone.history.start();

});
