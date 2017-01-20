define([
    
    'backbone',
    'underscore',
    'jquery',  
    'text!app/modules/setup/templates/setup.html',
    'modules/setup/js/model.js'
    
], 


    function(Backbone,_,$,template,Model){
    
      return Backbone.View.extend({

    el: "#main",
 
    events: {
  
      "click #submit" : "submit"

    },

    template: _.template(template),

    initialize: function(){

      this.render();

    },

    submit: function(){

	window.setTimeout(doSave, 500);

        $("#submit").html("Save <i class='fa fa-spinner fa-spin'></i>");
	
//	this.model.set("timezone", $("#timezone").val());

	var timezone = $("#timezone").val();

	var model = new Model();

        model.set("timezone", timezone);

        function doSave(){	

        model.save();

	//approuter.navigate('/', {trigger:true});
        
        $("#submit").html("Save <i class='fa fa-check-square-o'></i>");
        }
    },

    render: function(){

      var that = this; 

      var model = new Model();

      model.fetch({
   
        success: function(timezone){

	
	  that.$el.html(that.template({model: timezone}));
 
        }
      });
    }

  });           
               
                
           
                
           
            
  });
    

