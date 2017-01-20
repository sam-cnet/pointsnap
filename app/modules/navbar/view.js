define([

	'jquery',
	'backbone',
	'underscore',
        'text!app/modules/navbar/template.html',
	'materialize'

], 	function($,Backbone,_,template){


	return Backbone.View.extend({

	  el: "#navbar",

	  template: _.template(template),


	  initialize: function(){
	
	    this.render();

	  },

	  events: {

	    "click #calendar" : "calendar"

	  },

	  calendar: function(e){

		
		if($(e.target).parent().attr('id') == "calendar"){

		    //$("#calendar").addClass("active");

		} 

	  },

	  render: function(){

	
	    this.$el.html(this.template);	


            // Initialize collapse button
            $("#sidenav").sideNav({

                edge: 'right'
            });


            $("#sidenav-mobile").sideNav({

               edge: 'right'
            });


	  }


	});


});
