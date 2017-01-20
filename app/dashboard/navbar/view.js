define([

	'jquery',
	'backbone',
	'underscore',
        'text!app/navbar/template.html',
	'materialize',
	'app/navbar/notifications'

], 	function($,Backbone,_,template,materialize,Notifications){


	return Backbone.View.extend({

	  el: "#navbar",

	  template: _.template(template),


	  initialize: function(){
	
	    this.render();

	  },

	  events: {

	    "click #calendar" : "calendar",
	    "click #save"     : "save"
	  },

	  calendar: function(e){

		
		if($(e.target).parent().attr('id') == "calendar"){

		    //$("#calendar").addClass("active");

		} 

	  },


	  render: function(){


	    //fetch notifications
	    var notifications = new Notifications();	    
	
	    var that = this;

	    notifications.fetch({
		
    	      success: function(notifications) {

		that.$el.html(that.template({notifications:notifications}));	

            // Initialize collapse button
            $("#sidenav").sideNav({

                edge: 'right'
            });


            $("#sidenav-mobile").sideNav({

               edge: 'right'
            });


                $("#sidenav").on("click", function(){

		var unseen = false;

		_.each(notifications.models, function(notif){

			if(notif.get('seen') < 1){

			  unseen = true;

			  notif.set('seen', 1);
		
		          notif.save();

			}

		});

		if(unseen){

		   $("#notifs-icon").addClass("shake");
		   
		   	
		   console.log(notifications);		   
		}

		});


		$(".userView a").on("click", function(){


			$("#notifs-icon").removeClass("shake");
		
		});

	      }
	      
	   });

		return this;

	  },

	  save: function(){

	    console.log("saved");
	  }


	});


});
