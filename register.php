<!--
    author   : pradeep khodke
    url      : http://www.codingcage.com
    facebook : http://facebook.com/CodingCage
    twitter  : http://twitter.com/CodingCage
    twitter  : http://twitter.com/PradeepKhodke
    Google+  : http://plus.googe.com/+PradeepKhodked
-->
<!DOCTYPE html>
<html>
<head>
<title>Regitra</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/signup-form.css" type="text/css" />
</head>

<body>

  <div class="container">

    <div class="signup-form-container">
    
         <!-- form start -->
         <form method="post" role="form" id="register-form" autocomplete="on">
         
         <div class="form-header">
          <h3 class="form-title"><i class="fa fa-user"></i><span class="glyphicon glyphicon-user"></span> Sign Up</h3>
                      
         <div class="pull-right">
             <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
         </div>
                      
         </div>
                  
         <div class="form-body">
         
            <!-- json response will be here -->
              <div id="errorDiv"></div>
              <!-- json response will be here -->
                      
            <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="name" type="text" id="name" class="form-control" placeholder="Name" maxlength="40" autofocus="true">
                   </div>
                   <span class="help-block" id="error"></span>
              </div>
                        
              <div class="form-group">
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                   <input name="email" id="email" type="text" class="form-control" placeholder="Email" maxlength="50">
                   </div> 
                   <span class="help-block" id="error"></span>                     
              </div>
                        
              <div class="row">
                        
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                            
                   <div class="form-group col-lg-6">
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="password" type="password" class="form-control" placeholder="Retype Password">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                            
             </div>
                        
                        
            </div>
            
            <div class="form-footer">
                 <button type="submit" class="btn btn-info" id="btn-signup">
                 <span class="glyphicon glyphicon-log-in"></span> Sign Me Up
                 </button>
            </div>


            </form>
            <a href="login.php">Login</a>
           </div>
           
           <div class="alert alert-info">
           <a href="http://www.codingcage.com/2016/05/ajax-bootstrap-signup-form-with-jquery.html" target="_blank"></a>
           </div>

  </div>
    
    <script src="assets/jquery-1.12.4-jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery.validate.min.js"></script>
    <script src="assets/register.js"></script>
   
</body>
</html>
