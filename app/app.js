require([

	'jquery',
	'backbone',
	'app/modules/navbar/view',
	'app/modules/calendar/view',
	'app/modules/customers/view',
	'app/modules/subnav/view',
	'app/modules/appController/controller'

], 	function($,Backbone,navbarView,calendarView,customersView,subnavView,appController){


	var router = Backbone.Router.extend({

	  routes: {


		"main"   : "calendar",
		"customers"  : "customers",
		""	     : "empty"
	  },
	

	  initialize: function(){

	 	new navbarView();	 

		new subnavView();
 
	  },

	  calendar: function(){

            new calendarView();

      	   },


	  customers: function(){
         
	    new customersView();

	 }

	});


	var appRouter = new router();


	appRouter.on('route:empty', function(){
	
	    this.navigate('main',{trigger:true})

	});

	Backbone.history.start();

});
