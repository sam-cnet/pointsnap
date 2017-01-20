require([

	'jquery',
	'backbone',
	'app/view',
	'app/navbar/view',
	'app/subnav/view',
	'app/breadcrumbs/view'

], 	function($,Backbone,mainView,navbarView,subnavView,breadcrumbsView){


	var router = Backbone.Router.extend({

	  routes: {


		"main"   : "main",
		""	     : "empty"
	  },
	

	  initialize: function(){

	    new navbarView();
	    new subnavView();

	  },

	  main: function(){

	    
            new mainView({collection: "asdasdA"});

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
