require([

	'jquery',
	'backbone',
	'app/view',
	'app/navbar/view',
	'app/subnav/view',
	'app/breadcrumbs/view',
	'../../../app/services/collection',
	'../../../app/customers/collection'

], 	function($,Backbone,calendarView,navbarView,subnavView,breadcrumbsView,Services,Customers){


	var services;
	var customers;

	var router = Backbone.Router.extend({

	  routes: {


		"main"   : "main",
		""	     : "empty"
	  },
	

	  initialize: function(){

	    
	    services = new Services();
	    services.fetch();
	    customers = new Customers();

	    customers.services = services;
	     
	    new navbarView();
	    new subnavView({collection:customers});	    

	  },

	  main: function(){

            new calendarView();

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
