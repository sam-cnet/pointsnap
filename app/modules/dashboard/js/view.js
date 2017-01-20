define(['backbone', 'text!app/modules/dashboard/templates/dash.html'], function(Backbone,template){


	return Backbone.View.extend({

          el: "#main",

          template: _.template(template),

          initialize: function(){
   
            this.render();
          },

          render: function(){
       
            this.$el.html(this.template);

          }

       });


});
