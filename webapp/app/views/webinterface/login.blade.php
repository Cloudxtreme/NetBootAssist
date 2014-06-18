
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
   <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span>
					Login
				</div>
                <div class="panel-body">
                    <!--<form class="form-horizontal" role="form">-->
					{{ Form::open(array('url'=>'/', 'class' => 'form-horizontal')) }}
						@if(Session::has('message'))
							<p class="alert">{{ Session::get('message') }}</p>
						@endif
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">
								Username</label>
							<div class="col-sm-9">
								{{ Form::text('username', null, array('class'=>'form-control','placeholder'=>'Username')) }}
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">
								Password</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group last">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-success btn-sm">
									Sign in</button>
							</div>
						</div>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer">
                    <a href="#">NetBootAssist</a>
            </div>
        </div>
    </div>
</div>
  
        
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