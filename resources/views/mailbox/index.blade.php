@extends('layouts.app')

@section('contentheader_title')
   Mailbox
@endsection
@section('contentheader_description')
13 new messages
@endsection


@section('main-content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        @include('mailbox.navigation')
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages" id="mail-table">
                <table class="table table-hover table-striped" >
                  <tbody>
                  <!--
                  @foreach($emails as $email)
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa 
                    @if( $email->is_starred )
                    fa-star 
                    @else
                    fa-star-o
                    @endif
                    text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="{{action('InboxController@read',['message'=>$email->id])}}">{{$email->from}}</a></td>
                    <td class="mailbox-subject"><b>{{$email->subject}}</b> - {{{ str_limit($email->body_plain,20) }}}
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{$email->date->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                  -->
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">28 mins ago</td>
                  </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Email</h3>
            </div>
            <div class="box-body" id="email-form">
            </div>            
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection
@section('pagescripts')
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
   });
 
</script>
<script src="/socket.io/socket.io.js"></script>
<script>
  
  console.log('setting up listener');
  var app = app || {};
  app.listener = io.connect('http://dougmail.app:6001');
  


</script>

<script type="text/jsx">

  var EmailData = React.createClass({
            getInitialState: function() {
                return {
                    
                        emails : [{
                            id: 1,
                            from: 'Bob <bob@bob.com>',
                            subject: 'Subject 1',
                            body: 'Body 1',
                            date: '2016-01-01'
                          },
                          {
                            id: 1,
                            from: 'Fred <fred@bob.com>',
                            subject: 'Subject 2',
                            body: 'Body 2',
                            date: '2016-02-01'
                          }
                        ]
                    
                }
            },
            componentDidMount: function() {
              console.log('didmount, binding socket');
              app.listener.on('approved-email:App\\Events\\NewEmail',this._newEmail)
              this.serverRequest = $.get(this.props.source, function (result) {
                //console.log(result);
                this.setState({
                  emails: result
                });
              }.bind(this));
            },
            _newEmail: function(email)
            {
              //console.log('new email'+email);
              this.setState({
                emails: this.state.emails.concat(email.email)
              })
              
            },
            render: function() {

                var displayEmailListing = function(email)
                {
                    return (<tr>
                        <td><input type="checkbox"/></td>
                        <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                        <td class="mailbox-name"><a href='{email.id}'>{email.from}</a></td>
                        <td class="mailbox-subject"><b>{email.subject}</b> - {email.body}</td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date">{email.date}</td>
                    </tr>)
                };

                return(
                    <tbody>
                        {this.state.emails.map(displayEmailListing)}
                    </tbody>

                    )
            }

        });

    var EmailListing = React.createClass({
        getDefaultProps: function() {
            return {class: 'table table-hover table-striped'}
        },
        render: function() {
            return (
                <table className={this.props.class}>
                    <EmailData source="http://dougmail.app/inbox/data"/>    
                </table>
                );
        }
    });

    var EmailForm = React.createClass({
      getDefaultProps: function()
      {
        return {foo:'bar'}
      },      
      render: function() {
        return (
          <p>Hello</p>
          );
      }
    });

    React.render(<EmailListing/>,document.getElementById('mail-table'));

    React.render(<EmailForm/>,document.getElementById('email-form'));
    

</script>
@endsection
