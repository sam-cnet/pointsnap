define([

	'backbone',
	'jquery',
	'underscore',
	'text!app/modal.html',
	'text!app/modaledit.html',
	'../../../app/customers/collection',
	'../../../app/services/collection'
	],


	function(Backbone,$,_,template,template_edit,Customers,Services){

	return Backbone.View.extend({

	  el: "#calModal",

	  template: _.template(template),	 

	  template_edit: _.template(template_edit),

	  events: {
	
	     "click #edit" : "edit"

	  },	

	   render: function(){

		this.$el.html(this.template({model:this.model}));

		$(".modal").modal({

		  starting_top: '20%'
	

		});

		$("#modal2btn").click();

				
		Materialize.updateTextFields();

	   },

	   edit: function(){


		$('.modal').modal('close');

		this.$el.empty();

		var services = new Services();
		services.fetch();
		this.model.services = services.models; 

		this.$el.html(this.template_edit({model:this.model}));
		
		$('.modal').modal();
		
	        $("#modal2btn").click();
	
		$("select").material_select();
	
		Materialize.updateTextFields();	
		
		console.log(this.model);
		
	   }

	});


});
