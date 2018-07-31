<html>
<head>
    
  <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
          <script src="JS/login.js">
        </script>
</head>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">View Report</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
									 <form id="login-form" method="post" action="loginProcess.php" role="form" style="display: block;">
                          <div class="form-group">
										    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username">
								    	</div>
								    	<div class="form-group">
										    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									    </div>
                                            <!--<input type="submit" value="Login" name="loginForm" />-->
                                            <button class="btn btn-primary btn-sm" value = "Login" name = "loginForm" type = "submit">Sign in</button>
                    </form>
	
	      <form id="register-form"  method="post"  action="map.php" role="form" style="display: none;">
									<form id="login-form" method = "post" action="map.php" role="form" style="display: block;">
                      <div class="form-group">
										     City: <select name="City_Id">
                         <option value="1">Salinas</option>
                         <option value="2">Marina </option>
                         <option value="3">Seaside</option>
                         <option value="4">Monterey </option>
                         <option value="5">Gonzales </option>
                         <option value="6">Soledad </option>
                         <option value="7">Greenfield</option>
                    </select>
          <br />        
					</div>
                        <button class="btn btn-primary btn-sm" type = "submit">View City</button>
                    </form>
                     </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</html>