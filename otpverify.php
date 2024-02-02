<html>  
<head>  
    <title>OTP Verify</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
</head>
<style>
 .box
 {
  width:100%;
  max-width:600px;
  background-color:#f9f9f9;
  border:1px solid #ccc;
  border-radius:5px;
  padding:16px;
  margin:0 auto;
 }
 .error
{
  color: red;
  font-weight: 700;
} 
</style>
<body>  
    <div class="container">  
    <div class="table-responsive">  
    <h3 style="align: center">Login Form</h3><br/>
    <div class="box">
     <form method="post" >  
       <div class="form-group">
       <label for="otp">Enter OTP</label>
       <input type="text" name="otp" id="otp" placeholder="One Time Password" required 
       data-parsley-type="otp" data-parsley-trigg
       er="keyup" class="form-control"/>
      </div>
      <div class="form-group">
       <input type="submit" id="submit" name="otp_verify" value="Submit" class="btn btn-success" />
       </div>
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>
     </form>
     </div>
   </div>  
  </div>
 </body>  
</html>  