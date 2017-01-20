define([
	
	'jquery',
	'underscore',
	'backbone',
	'text!app/subnav/template.html'

],	function($,_,Backbone,template){


	  return Backbone.View.extend({

	    el: "#subnav",

	    template: _.template(template),

	    initialize: function(){

		this.render();
	    },

	    render: function(){


		var that = this; 

		this.collection.fetch({

		  success: function(collection){
	
		
		    that.$el.html(that.template({collection}));
	    
		 



		    $(".modal").modal();

                  $("#startDate").pickadate({

                    format: 'mm/dd/yyyy'

                  });

		  $(".dropdown-button").dropdown();

                  $("#startTime").pickatime();

                  $("#service").material_select();
                  $("#status").material_select();
                  $("#customer").material_select();
	   	  $("#color").material_select();

               } 

	     });
	}	

      });
});
