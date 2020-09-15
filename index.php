<?php
  // Message vars 
  $msg = '';
  $msgClass = '';
 //Check for submit 
if(filter_has_var(INPUT_POST, 'submit')) {
  
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  //Check required fields
  if(!empty($name) && !empty($email) && !empty($message)) {
  // sanitize input
  // $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
  // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  // $message = filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);

  // Check Email
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    // Failed
    $msg = 'Please use a valid email';
    $msgClass = 'alert-danger';
  } else {
    // Passed
    $toEmail = 'rares504@gmail.com';
    $subject = 'Contact Request From '. $name;
    $body = '<h2>Contact Request</h2>
          <h4>Name</h4><p>'.$name.'</p>
          <h4>Email</h4><p>'.$email.'</p>
          <h4>Message</h4><p>'.$message.'</p>
          ';
      // Email Headers
      $headers = "MIME-Version: 1.0" ."\r\n";
      $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

      // Additional Headers
      $headers .= "From: " . $name. "<". $email. ">". "\r\n"; 

      if(mail($toEmail, $subject, $body, $headers)) {
        // Email sent
        $msg = 'Your email has been sent';
        $msgClass ='alert-succes';
      } else {
        // Failed
        $msg = 'Your email was not sent';
        $msgClass = 'alert-danger';
      }
  }

} else {
      // Failed
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-danger';
  }
}#Ending Filter_has_var


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.min.css">
  <title>Contact us</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand">My website</a>
      </div>      
    </div>
  </nav>
  <div class="container my-3">
  <?php if ($msg != ''): ?>
  <div class="<?php echo $msgClass?> p-2 mb-2"><?php echo $msg;?></div>
  <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Your name ... " value="<?php echo isset($_POST['name']) ? $name: ''; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email ..." value="<?php echo isset($_POST['email']) ? $email: ''; ?>">
      </div>
      <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control" placeholder="How are you"><?php echo isset($_POST['message']) ? $message: '' ?></textarea>
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
    </form>
  </div>
</body>
</html>