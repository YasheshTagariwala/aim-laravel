@extends('layouts.master')
@section('title','Notifications')
@section('pagebody')

<!-- Start Inner Contents -->         
    
    <section class="myaccount-header">
      <div class="container">
        <h1>Admin Notifications</h1>
        <p></p>
      </div>
    </section>  
    <section class="myaccount-body"> 
      <div class="inner-wrapper"  id="main-content">
        <div class="register-wrapper">
          <div class="container">
            <div class="row">
        <div class="col-xs-12 col-md-3" id="external-events">
            <div class="panel panel-default">
                <div class="panel-heading">Draggable Events</div>
                <div class="panel-body">
                    <div class="fc-event">My Event 1</div>
                    <div class="fc-event">My Event 2</div>
                    <div class="fc-event">My Event 3</div>
                    <div class="fc-event">My Event 4</div>
                    <div class="fc-event">My Event 5</div>
                    <input type="checkbox" data-icheck id="drop-remove" />
                    <label class="icheck-label" for="drop-remove">Remove event after drop</label>
                </div>
            </div>
            <p>
            </p>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
          </div>
        </div>
      </div>
    </section>
    <script>
    var ajaxurl = '';

    jQuery(document).ready(function($) {
      

    $('#sendmessagebtn').on('closed.bs.alert', function () {
      window.location.href = "";

    })  
      
    $('#sendmessagebtn').click(function(){
        $('.formmessage').hide();
        if($('#message').val()=='' && $('#subject').val()==''){
        $('.formmessage').html('Alll fields are required, please enter the details.').removeClass('alert alert-danger alert-success').show().addClass('alert alert-danger');
       return false;
       
       }
          
          var button=$(this);
          button.addClass('disabled');
        $.ajax({
        url: ajaxurl,
        data: {
          'action':'gybi_send_message',
          'message' : $('#message').val(),
          'title':$('#subject').val(),
          'to_user':1,
          'message_category':1
        },
        success:function(data) {
          //todo error handling
          if(data!="0"){
            button.removeClass('disabled');
            $('#message').val('');
            $('#subject').val('');
          $('.formmessage').html('Your message sent to Admin').removeClass('alert alert-danger alert-success').show().addClass('alert alert-success');
          }
        },
        error: function(errorThrown){
        }
      });  
      
      return false;
        })
        
    });

    </script>
    <!-- End Inner Contents -->         
    
    

@endsection