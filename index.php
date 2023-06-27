<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
</head>
<body>

<div class="container">
  <h2>Example form </h2>
  <form id="contactForm">
  
    <div class="form-group">
    <label for="name">Name:</label>
      <input type="text" class="form-control" id="name"  name="name" required data-error="Enter the Name ">
      <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" required data-error="Enter the mail id" name="email">
      <div class="help-block with-errors"></div>
    </div>
    <div class="form-group">
      <label for="qualification">Qualificathion:</label>
      <input type="text" class="form-control" id="qualification" required data-error="Enter the Qualification" name="qualification">
    <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
      <label for="number">MobileNumber:</label>
      <input type="text" class="form-control" id="number" required data-error="Enter the Mobile Number" name="number">
    <div class="help-block with-errors"></div>
    </div>
    <div class="g-recaptcha" data-sitekey="6LcrgLElAAAAAAoptg-85FH-S8Xm8tOddd-WnrxS"></div>
    <span class="text-danger" id="captcha_err"></span>
   <span class="alert alert-success" id="form_success" style="display:none;">Form Submitted</span>

   <div class="form-group">
   Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  
</div>

    <div class="alert alert-success flip " role="alert" id="panel" style="display:none" >
  A simple success alert—check it out!
 </div> 
    <button type="submit"  class="btn btn-default">Submit</button>
  </form>
</div>   

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="assets/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/form_validator.min.js"></script>
<script src="assets/js/contact.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  

</body>
</html>
