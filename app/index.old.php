<?php 

session_start();

if(!$_SESSION['isloggedin']){

	header('Location: http://pointsnap.ca/login.html');

}

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <title></title>
  <link rel="stylesheet" href="app.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  
  


  <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a href="#" id="collapse-menu" class="navbar-brand"><i class="fa fa-bars"></i></a>
      </div>
    </div>
  </nav>

<div class="container">

  <div class="row">
  
    <div class="col-lg-12 col-sm-12">
      
      <h1 class="banner"><span>PointSnap</h1>
      <hr />
      <div id="scope">
        
        
      </div>
      
    </div>
    
  </div>
</div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>

  <!-- Bootstrap tooltip -->

  <script>
    
    $(document).ready(function() {
      $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });
    
  </script>
  
  <!-- Backbone view templates -->

  
  <script type="text/template" id="appsetup">
  
 
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Setup</li>
     </ol>
    

   <h3>Setup Your Account</h3>    

   <hr />   

   <form onsubmit='return false;'>

   <div class="input-group">
    <label class="form-label">Choose Your Timezone</label>

    <select id="timezone" class="form-control">
      <% timezone = model.get('timezone') %>
      <% if(timezone == "") {%>
         <option>AST</option>
         <option>CST</option>
         <option>EST</option>         
         <option>MST</option>
         <option>NST</option>
         <option>PST</option>

      <% } else if(timezone == "AST"){ %>
	 <option><%= timezone %></option>
         <option>CST</option>
         <option>EST</option>
         <option>MST</option>
         <option>NST</option>
         <option>PST</option>
     
      <%} else if(timezone == "CST"){ %>
         <option><%= timezone %></option>
         <option>AST</option>
         <option>EST</option>
         <option>MST</option>
         <option>NST</option>
         <option>PST</option>
     


      <%} else if(timezone == "EST"){ %>
         <option><%= timezone %></option>
         <option>AST</option>
         <option>CST</option>
         <option>MST</option>
         <option>NST</option>
         <option>PST</option>
   

      <% } else if(timezone == "MST"){ %>
         <option><%= timezone %></option>
         <option>AST</option>
         <option>CST</option>
         <option>EST</option>
         <option>NST</option>
         <option>PST</option>
     

      <% } else if(timezone == "NST"){ %>
         <option><%= timezone %></option>
         <option>AST</option>
         <option>CST</option>
         <option>EST</option>
         <option>MST</option>
         <option>PST</option>
      

      <% } else if(timezone == "PST"){ %>
         <option><%= timezone %></option>
         <option>AST</option>
         <option>CST</option>
         <option>EST</option>
         <option>MST</option>
         <option>NST</option>
      <% } %>


    </select>
   </div>
 
   <br />

   <div class="input-group"> 
    <button id="submit" style="border-radius:0px;" class="btn btn-lg btn-success" type="submit">Save</button>
   </div>
   </form>


  </script>
  



  <script type="text/template" id="template">
   
     <ol class="breadcrumb">
    
      <li><a href="#">Dashboard</a></li>
      <li class="active">Users</li>

    </ol> 
   
    <a href="#/users/new" class="btn btn-md btn-success">New</a>
      <hr />
   
   
    <table class="table table-hover table-striped">
      <thead>
        <th>Firstname</th>
        <th>Lastname</th>
        <th class="hidden-xs">Phone Number</th>
        <th class="hidden-xs">Email</th>
        <th class="hidden-xs">Last Modified</th>
        <th></th>
      </thead>
      <tbody>
      
   
    <%_.each(members, function(user){ %>
   
      <tr>
        <td> <%= user.get('firstname') %> </td>
        <td> <%= user.get('lastname') %> </td>
        <td class="hidden-xs"> <%= user.get('phone') %> </td>
        <td class="hidden-xs"> <%= user.get('email') %> </td>
        <td class="hidden-xs"> <%= user.get('lastModified') %> </td>
        <td align="right"><a href="#/users/edit/<%= user.get('myid') %>" class='btn btn-md btn-info'>edit</a></td>
      </tr>
      
   
   <% }); %>
   
      </tbody>
    </table>
     
    
   
  </script>

  <script type="text/template" id="addform">
    
      <ol class="breadcrumb">
    
    <li><a href="#">Home</a></li>
    <li><a href="#/users">Users</a></li>
    <li class="active">New</li>

  </ol> 
    
    <form class="addForm">
    
      <legend>New Member</legend>
      
      <div class="form-group">
        <label>Firstname</label>
      </div>
      <div class="form-group">
        <input id="firstname" name="firstname" type="text" class="form-control" />
      </div>
      
      <div class="form-group">
        <label>Lastname</label>
      </div>
      <div class="form-group">
        <input id="lastname" name="lastname" type="text" class="form-control" />
      </div>
      
      <div class="form-group">
        <label>Phone Number</label>
      </div>
      <div class="form-group">
        <input id="phone" name="phone" type="text" class="form-control" />
      </div>
      
      <div class="form-group">
        <label>Email Address</label>
      </div>
      <div class="form-group">
        <input id="email" name="email" type="email" class="form-control" />
      </div>
      
        <input id="myid" name="myid" type="hidden" class="form-control" value="<%= model.id %>" />
    
      <hr />
      <div class="form-group" align="right">
        <a href="#/users" class="btn btn-md btn-danger">Cancel</a>
        
        <input type="submit" class="btn btn-md btn-primary" />
      </div>
      
    </form>
  
    
  </script>
  
  <script type="text/template" id="editform">
    
    <form class="editForm">
    
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#/users">Users</a></li>
        <li class="active">Edit</li>
      </ol>
      
      <div class="form-group">
        <label>Firstname</label>
      </div>
      <div class="form-group">
        <input id="firstname" name="firstname" type="text" class="form-control" value="<%= user.firstname %>" />
      </div>
      
      
      
      <div class="form-group">
        <label>Lastname</label>
      </div>
      <div class="form-group">
        <input id="lastname" name="lastname" type="text" class="form-control" value="<%= user.lastname %>" />
      </div>
      
      <input type="hidden" name="id" id="id" value="<%= user.id %>" />
    
      <hr />
      <div class="form-group" align="right">
        <a href="#/users" class="btn btn-md btn-default">Cancel</a>
        <a href="#users/delete/<%= user.id %>" data-toggle="tooltip" title="Delete User" class="btn btn-md btn-danger"><i class="fa fa-eraser"></i></a>
        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>
       
       
      </div>
      
    </form>
  
    
  </script>
  
  <script type="text/template" id="homeview">
    
    <ol class="breadcrumb">
      <li class="active">Dashboard</li>
      <li class="active"></li>
    </ol>
    
    <div class="row">
      <div class="col-lg-4">
      
        <ul class="fa-ul">
         <li>
            <a href="#setup"><i class="fa-li fa fa-cog"></i>Setup Account</a>
         </li>
        </ul>
      
      </div>
      <div class="col-lg-4"></div>
      <div class="col-lg-4"></div>
    </div>
    
  </script>

  <script type="text/template" id="tickets">
   
     <ol class="breadcrumb">
    
      <li><a href="#">Home</a></li>
      <li class="active">Tickets</li>

    </ol> 
   
    <a href="#/tickets/new" class="btn btn-md btn-success">New</a>
      <hr />
  <div class="">
    <table class="table table-hover">
      <thead>
        <th>Title</th>
        <th class="hidden-xs">Requester</th>
        <th class="hidden-xs">Classification</th>
        <th class="hidden-xs">Priority</th>
        <th class="hidden-xs">Notes</th>  
        <th class="hidden-xs">Created</th>  
        <th></th>    
      </thead>
      <tbody>
      
   
    <%_.each(tickets, function(ticket){ %>
   
      <tr style="cursor:pointer;">
        <td><%= ticket.get('title') %></td>
        <td class="hidden-xs"><%= ticket.get('requester') %></td>
        <td class="hidden-xs"><%= ticket.get('classification') %></td>
        <td class="hidden-xs"><%= ticket.get('priority') %></td>
        <td class="hidden-xs"><%= ticket.get('notes').substring(0,50) %>...</td>
        <td class="hidden-xs"><%= ticket.get('created') %></td>
        <td><a href="#/tickets/edit/<%= ticket.get('id')%>" class="btn btn-md btn-info">edit</a></td>
      </tr>
      
   
   <% }); %>
   
      </tbody>
    </table>
  </div>  
  
  </script>
  
  <script type="text/template" id="newTicket">
    
    <ol class="breadcrumb">
    
      <li><a href="#">Home</a></li>
      <li><a href="#/tickets">Tickets</a></li>
      <li class="active">New</li>

    </ol> 
    
    <form class="newTicketForm">
  
      <legend>New Ticket: <small><%= model.id %></small></legend>

    
    <div class="row">
      <div class="col-lg-4">
        
        <div class="form-group">
          <label>Title</label>
        </div>
        <div class="form-group">
          <input id="title" name="title" type="text" class="form-control" />
        </div>
        
          <input id="myid" name="myid" type="hidden" value="<%= model.id %>" />
        
        <div class="form-group">
          <label>Client name</label>
        </div>
        <div class="form-group">
          <input id="requester" name="requester" id="requester" type="text" class="form-control" value="<%= model.fullname %>" />
        </div>

        <div class="form-group">
          <label>Classification</label>
        </div>
        <div class="form-group">
          <select class="form-control" id="classification" name="classification">
            <option>Incident</option>
            <option>Project</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Priority</label>
        </div>
        <div class="form-group">
          <select class="form-control" id="priority" name="priority">
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
          </select>
        </div>

      </div>


      <div class="col-lg-8">
      
        <div class="form-group">
          <label>Notes <i class="fa fa-caret-down" onclick="return false;"></i></label>
        </div>

        <div class="form-group">
          <textarea name="notes"></textarea>
        </div>
        
        <div class="form-group">
          <label>Attachments</label>
        </div>
        
        <div class="form-group">
          <input type="file" />
        </div>
        
      </div>
      
          <input id="myid" name="myid" type="hidden" class="form-control" value="" />
      
        <hr />
        
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group" align="right">
          <a href="#/tickets" class="btn btn-md btn-danger">Cancel</a>
          <input type="submit" class="btn btn-md btn-primary" />
        </div>
      </div>
    </div>
        
    </form>

    
  </script>
  
  <script type="text/template" id="editTicket">
    
    <ol class="breadcrumb">
    
      <li><a href="#">Home</a></li>
      <li><a href="#/tickets">Tickets</a></li>
      <li class="active">Edit</li>

    </ol> 
    
    <form class="editTicketForm">
  
      <legend>Edit Ticket: <%= ticket.id %> <small></small></legend>

    
    <div class="row">
      <div class="col-lg-4">
        
        <div class="form-group">
          <label>Title</label>
        </div>
        <div class="form-group">
          <input id="title" name="title" type="text" class="form-control" value="<%= ticket.title %>" />
        </div>
        
          <input id="id" name="id" type="hidden" value="<%= ticket.id %>" />
        
        <div class="form-group">
          <label>Client name</label>
        </div>
        <div class="form-group">
          <input id="requester" name="requester" id="requester" type="text" class="form-control" value="<%= ticket.requester %>"/>
        </div>

        <div class="form-group">
          <label>Classification</label>
        </div>
        <div class="form-group">
          <select class="form-control" id="classification" name="classification">
            <option>Incident</option>
            <option>Project</option>
          </select>
        </div>
        
        <div class="form-group">
          <label>Priority</label>
        </div>
        <div class="form-group">
          <select class="form-control" id="priority" name="priority">
            <option>Low</option>
            <option>Medium</option>
            <option>High</option>
          </select>
        </div>

      </div>


      <div class="col-lg-8">
      
        <div class="form-group">
          <label>Notes <i class="fa fa-caret-down" onclick="return false;"></i></label>
        </div>

        <div class="form-group">
          <textarea name="notes"><%= ticket.notes %></textarea>
        </div>
        
        <div class="form-group">
          <label>Attachments</label>
        </div>
        
        <div class="form-group">
          <input type="file" />
        </div>
        
      </div>
      
          <input id="myid" name="myid" type="hidden" class="form-control" value="" />
      
        <hr />
        
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="form-group" align="right">

        <a href="#/tickets" class="btn btn-md btn-default">Cancel</a>
        <a href="#tickets/delete/<%= ticket.id %>" data-toggle="tooltip" title="Delete Ticket" class="btn btn-md btn-danger"><i class="fa fa-eraser"></i></a>
        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>

        </div>
      </div>
    </div>
        
    </form>

    
  </script>
  
  <!-- End of Backbone view templates -->
  

  <!-- Start of Backbone app -->

  <script type="text/javascript">
  
  //Translate form into json encoded
  
  $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    
    
  
  // Backbone models
 
  var appsetupModel = Backbone.Model.extend({

    urlRoot: "http://pointsnap.ca/app/setup/"

  });
 
  var myModel = Backbone.Model.extend({
    
    urlRoot: "https://backbone-sambazargan.c9users.io/app/users/new"
    
  });

  var editModel = Backbone.Model.extend({
    
    urlRoot: "https://backbone-sambazargan.c9users.io/app/users/edit"
    
  });

  var deleteModel = Backbone.Model.extend({
    
    urlRoot: "https://backbone-sambazargan.c9users.io/app/users/delete"
    
  });
  
  var newTicketModel = Backbone.Model.extend({
    urlRoot: "https://backbone-sambazargan.c9users.io/app/tickets/new"
  });
  
  var editTicketModel = Backbone.Model.extend({
    
    urlRoot: "https://backbone-sambazargan.c9users.io/app/tickets/edit"
    
  });
  
  var deleteTicketModel = Backbone.Model.extend({
    
    urlRoot: "https://backbone-sambazargan.c9users.io/app/tickets/delete"
    
  });
  
  // Backbone collections  
  
  var ticketModel = Backbone.Collection.extend({
    url: "https://backbone-sambazargan.c9users.io/app/tickets"
  });

  var myCollection = Backbone.Collection.extend({
    
    url: "https://backbone-sambazargan.c9users.io/app/users"
    
  });
  
  
  // Backbone views
  
  var homeView = Backbone.View.extend({
    
    el: "#scope",
    
    
    render: function(){
      
      var template = _.template($("#homeview").html());
      
      this.$el.html(template);
      
    }
    
    
  });


  var appsetupView = Backbone.View.extend({

    el: "#scope",

    events: {
  
      "click #submit" : "submit"

    },

    submit: function(){

	window.setTimeout(doSave, 500);

        $("#submit").html("Save <i class='fa fa-spinner fa-spin'></i>");
	
//	this.model.set("timezone", $("#timezone").val());

	var timezone = $("#timezone").val();

	var model = new appsetupModel();

        model.set("timezone", timezone);

        function doSave(){	

        model.save();

	//approuter.navigate('/', {trigger:true});
        
        $("#submit").html("Save <i class='fa fa-check-square-o'></i>");
        }
    },

    render: function(){

      var that = this; 

      var model = new appsetupModel();

      model.fetch({
   
        success: function(timezone){

              var template = _.template($("#appsetup").html(), {model: timezone});

      	      that.$el.html(template);  
        }
      });
    }

  });


  var ticketView = Backbone.View.extend({
    
    el: "#scope",
    
    render: function() {
      
      var tickets = new ticketModel();
      
      var that = this;
      
      tickets.fetch({
        
        success: function(tickets){
          
          console.log(tickets);
          
          var template = _.template($("#tickets").html(), {tickets:tickets.models});
      
          that.$el.html(template);
          
        },
        
        error: function(model,res,opt){
          
          console.log(res);
        }
        
      });
      

    }
    
  });
  
  var addTicket = Backbone.View.extend({
    el: ("#scope"),
    render: function(){
      
      var newticketmodel = new newTicketModel();
      
      var that = this;
      
      newticketmodel.fetch({
        
        success: function(newticketmodel){
          console.log(newticketmodel.attributes);
          var template = _.template($("#newTicket").html(), {model: newticketmodel.attributes});
          that.$el.html(template);
          
        }
        
      })
      

    },
    
    events: {
      "submit .newTicketForm": "submit"
    },
    
    submit: function(evt){
      
      var request = $(evt.currentTarget).serializeObject();
      
      var newticketmodel = new newTicketModel({id: $("#myid").val()});
      
      newticketmodel.save(request, {
        type: "POST",
        
        complete: function(request){
          
          approuter.navigate('/tickets', {trigger:true});
          
        }
      });
      
      return false;
    }
  });
  
  var editTicket = Backbone.View.extend({
    
    el: "#scope",
    
    render: function(id){
          
          this.$el.html("<i class='fa fa-spinner fa-spin' style='position:relative;left:50%;top:50%;font-size:16pt;'></i>");
      
          var that = this;
          
          var ticket = new editTicketModel({id: id});

          ticket.fetch({
            
            success: function(ticket){
              
              var template = _.template($("#editTicket").html(), {ticket: ticket.attributes});
              
              that.$el.html(template);
              
            }
            
          });
    },
    
    events: {
      "submit .editTicketForm": "submit"
    },
    
    submit: function(evt){
      
      
      this.$el.html("<i class='fa fa-spinner fa-spin' style='position:relative;left:50%;top:50%;font-size:16pt;'></i>");
      
      
      var request = $(evt.currentTarget).serializeObject();
      
      
      var ticket = new editTicketModel({id: request.id});
      
      ticket.save(request, {
        
        type: "PUT",
        
        complete: function(ticket){
          
          approuter.navigate('/tickets', {trigger:true});
          
        }
        
      });
      
    }
    
  });

  var memberList = Backbone.View.extend({
    
    el: "#scope",
    
    render: function(){
      
      this.$el.html("<i class='fa fa-spinner fa-spin' style='position:relative;left:50%;top:50%;font-size:16pt;'></i>");
      
      var that = this;
      var members = new myCollection();
      members.fetch({
        
        success: function(members){
          
          console.log(members);
          
          var template = _.template($("#template").html(), {members: members.models});
          
          that.$el.html(template);
        }
        
      });
    }
    
  });
  
  var addMember = Backbone.View.extend({
    
    el: "#scope",
    
    render: function(){
      
      var that = this;
      var member = new myModel();
      member.fetch({
        
        success: function(member){
          
          var template = _.template($("#addform").html(), {model: member.attributes});
          
          that.$el.html(template);
        }
        
      });
    },
    
    events: {

      "submit .addForm": "add"
    },
    
    add: function(evt){
      
      console.log("form submitted");
      
      var request = $(evt.currentTarget).serializeObject();
      
      var mymodel = new myModel({id: $("#myid").val()});
      
      mymodel.save(request, {
        
        type: "POST",
        
        complete: function(request){
          approuter.navigate('/users', {trigger: true});
        }
        
      });
    
      return false;
    
    }
    
  });
  
  var editMember = Backbone.View.extend({
    
    el: "#scope",
    
    render: function(id){
  
          var member = new editModel({id: id});
          
          var that = this;
          
          member.fetch({
            
            dataType: "json",
            
            success: function(model){
    
              var template = _.template($("#editform").html(), {user: model.attributes});
          
              that.$el.html(template);
              
              approuter('', {trigger:true});
              
            }
            
          });
          
              //console.log(member);


    },
    
    events: {

      "submit .editForm": "edit"
    },
    
    edit: function(evt){
      
      console.log("form submitted");
      
            
      
      
      var request = $(evt.currentTarget).serializeObject();
      
      
      var member = new editModel({id: request.id});
      
      member.save(request, {
        
        complete: function(member){
          
          approuter.navigate('/users', {trigger: true});
          
        }
        
      });
      
      console.log(request);
    
          return false;
    
    }
    
  });
  
  var deleteMember = Backbone.View.extend({
    
    el: "#scope",
    
    render: function(id){
      
      var member = new deleteModel({id:id});
      
      member.destroy({
        
        complete: function(){
          approuter.navigate('/users', {trigger:true});
          
          console.log("destroy");
          
        }
        
      });
  
       
    }
  });
  
  var deleteTicket = Backbone.View.extend({
    
    el: "#scope",
    
    render: function(id){
      
      var member = new deleteTicketModel({id:id});
      
      member.destroy({
        
        complete: function(){
          approuter.navigate('/tickets', {trigger:true});
          
        }
        
      });
  
       
    }
  });
  
  
  // Initialize Backbone views

  var memberlist = new memberList();
  
  var editmember = new editMember();
  
  var addmember = new addMember();
  
  var deletemember = new deleteMember();
  
  var homeview = new homeView();
  
  var appsetupview = new appsetupView();

  var ticketview = new ticketView();
  
  var addticket = new addTicket();
  
  var editticket = new editTicket();
  
  var deleteticket = new deleteTicket();
  
  // Backbone router
  
  var appRouter = Backbone.Router.extend({
    routes: {
      "": "home",
      "setup": "setup",   
   
      "users": "users",
      "users/new": "newuser",
      "users/edit/:id": "edituser",
      "users/delete/:id": "deleteuser",
      
      "tickets": "tickets",
      "tickets/new": "newTicket",
      "tickets/edit/:id": "editTicket",
      "tickets/delete/:id": "deleteTicket"

    }
  });
  
  // Initialize Backbone router
  
  var approuter = new appRouter();
  
  // Backbone routes
  
  approuter.on('route:home', function(){
    
    homeview.render();
    
  });
  
  approuter.on('route:users', function(){
    
    memberlist.render();
    
  });  
  
  approuter.on('route:tickets', function(){
    
      ticketview.render();
  });
  
  approuter.on('route:newTicket', function(){
    
    addticket.render();
    
  });
  
  approuter.on('route:newuser', function(){
    
    addmember.render();
    
  });
  
  approuter.on('route:edituser', function(id){
    
    editmember.render(id);
    
  });
  
  approuter.on('route:deleteuser', function(id){
    
    deletemember.render(id);
    
  });
  
  approuter.on('route:editTicket', function(id){
    
    editticket.render(id);
    
  });
  
  approuter.on('route:deleteTicket', function(id){
    
  deleteticket.render(id);
    
  });

  approuter.on('route:setup', function(){

    appsetupview.render();

  });

  Backbone.history.start();
    
  </script>


</body>
</html> 
