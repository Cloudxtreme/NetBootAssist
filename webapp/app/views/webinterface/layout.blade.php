
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>NetBootAssist</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css">
            .navbar-static-top {
			  margin-bottom:20px;
			}

			i {
			  font-size:16px;
			}

			.nav > li > a {
			  color:#787878;
			}
			  
			footer {
			  margin-top:20px;
			  padding-top:20px;
			  padding-bottom:20px;
			  background-color:#efefef;
			}

			/* count indicator near icons */
			.nav>li .count {
			  position: absolute;
			  bottom: 12px;
			  right: 6px;
			  font-size: 10px;
			  font-weight: normal;
			  background: rgba(51,200,51,0.55);
			  color: rgba(255,255,255,0.9);
			  line-height: 1em;
			  padding: 2px 4px;
			  -webkit-border-radius: 10px;
			  -moz-border-radius: 10px;
			  -ms-border-radius: 10px;
			  -o-border-radius: 10px;
			  border-radius: 10px;
			}

			/* indent 2nd level */
			.list-unstyled li > ul > li {
			   margin-left:10px;
			   padding:8px;
			}
        </style>
    </head>
    

    <body>
        
        <!-- Header -->
		<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="icon-toggle"></span>
			  </button>
			  <a class="navbar-brand" href="#">NetBootAssist</a>
			</div>
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
				  <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->username }}</a>
				</li>
				<li><a href="logout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
			  </ul>
			</div>
		  </div><!-- /container -->
		</div>
		<!-- /Header -->

<!-- Main -->
<div class="container">
<div class="row">
	<div class="col-md-3">
      <!-- Left column -->
      <!--<a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>  -->
      
      <hr>
      
      <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu1">
          <h5>Systems <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="menu1">
                <li> <a href="/dashboard/assign"><i class="glyphicon glyphicon-home"></i> Assign <span class="badge badge-info">{{ System::wherePending(1)->count() }}</span></a></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Log</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Overview</a></li>

            </ul>
        </li>
        
        <li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Account management <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
            </ul>
        </li>
		<li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5>Configuration <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu3">
                <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
            </ul>
        </li>
      </ul>
           
  	</div><!-- /col-3 -->
    <div class="col-md-9">
      	

      <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> Overview</strong></a>  
      
      	<hr>
      
		<div class="row">
           
          
            <!-- center left-->	
         	<div class="col-md-12">

              <!--<div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-primary col-sm-3">
                  <i class="glyphicon glyphicon-plus"></i><br>
                  Service
                </a>
                <a href="#" class="btn btn-primary col-sm-3">
                  <i class="glyphicon glyphicon-cloud"></i><br>
                  Cloud
                </a>
                <a href="#" class="btn btn-primary col-sm-3">
                  <i class="glyphicon glyphicon-cog"></i><br>
                  Tools
                </a>
                <a href="#" class="btn btn-primary col-sm-3">
                  <i class="glyphicon glyphicon-question-sign"></i><br>
                  Help
                </a>
              </div>-->
				{{ $content }}

			</div><!--/col-span-6-->
     
      </div><!--/row-->
      

  	</div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->

<footer class="text-center"><a href="#" target="_blank">NetBootAssist</a> - Layout by <a href="http://www.bootply.com/85850" target="_blank"> Bootply.com</a></footer>

<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->



  
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>





        
        <!-- JavaScript jQuery code from Bootply.com editor -->
        
        <script type='text/javascript'>
        
        $(document).ready(function() {
        
            $(".alert").addClass("in").fadeOut(4500);

/* swap open/close side menu icons */
$('[data-toggle=collapse]').click(function(){
  	// toggle icon
  	$(this).find("i").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
});
        
        });
        
        </script>
        
    </body>
</html>