<?php
if (isset($_POST['Email'])) {

    // EDIT THE FOLLOWING TWO LINES:
    $email_to = "tlc.community@yahoo.com";
    $email_subject = "New form submissions";

    function problem($error)
    {
        echo "We're sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We're sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- INCLUDE YOUR SUCCESS MESSAGE BELOW -->

    Thanks for getting in touch. We'll get back to you soon.

<?php
}
?>
    
    
 

  <!-- <form id="contactForm">

      <div class="box text-center ">
          <h1 class="text-primary mt-4 display-4">Contact Us</h1>
      </div>

   
    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
      <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
    </div>

    
    <div class="mb-3">
      <label class="form-label" for="emailAddress">Email Address</label>
      <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required, email" />
      <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
      <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
    </div>

   
    <div class="mb-3">
      <label class="form-label" for="message">Message</label>
      <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
      <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div>
    </div>

   
    <div class="d-none" id="submitSuccessMessage">
      <div class="text-center mb-3">Form submission successful!</div>
    </div>

   
    <div class="d-none" id="submitErrorMessage">
      <div class="text-center text-danger mb-3">Error sending message!</div>
    </div>

 
    <div class="d-grid">
      <button class="btn btn-primary btn-lg my-5 mx-5 type="submit">Submit</button>
    </div>

  </form>

</div>


          </form>
          </div>
        </div>
      </div>
     </div> -->

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>       
     <link href="contact-form.css" rel="stylesheet">

<div class="fcf-body">

    <div id="fcf-form">
    <!-- <h3 class="fcf-h1 text-center">Contact us</h3> -->
        <h1 class="text-center pb-3">Contact Us</h1>
    <form id="fcf-form-id" class="fcf-form-class" method="post" action="contact-form-process.php">
        
        <div class="fcf-form-group">
            <label for="Name" class="fcf-label">Name</label>
            <div class="fcf-input-group">
                <input type="text" id="Name" name="Name" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="Email" class="fcf-label">Email address</label>
            <div class="fcf-input-group">
                <input type="email" id="Email" name="Email" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="Message" class="fcf-label">Message</label>
            <div class="fcf-input-group">
                <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
        </div>

        <div class="fcf-form-group">
            <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg   fcf-btn-block">Send Message</button>
        </div>

        

    </form>
    </div>

</div>


</body> 
<br><br><br><br><br><br><br><br><br><br><br><br>
<section>
  <footer class="bg-dark text-light ">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="box">
            <ul class="position-relative bottom-0 start-0  navbar-nav ms-auto fs-3">
              <li class="navbar-item">
                <a class="nav-link" href="index.html" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ministries.html" class="nav-link">Ministries</a>
              </li>
              <li class="navbar-item">
                <a href="staff.html" class="nav-link">Staff</a>
              </li>
              <li class="navbar-item">
                <a href="events.html" class="nav-link">Events</a>
              </li>
              <li class="navbar-item">
                <a href="contact.html" class="nav-link">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col">
          <div class="box pt-3">
            <a href="https://goo.gl/maps/gzrwg4f1bQTw1qQh8" target="_blank" class="btn btn-info px-" role="button">Visit Us!</a>
          </div>
        </div>
          <div class="col">
          <div class="box">
            <h1><a href="index.html" class="navbar-brand">THE LIFE CHURCH</a><br>  27450 Rd 148 <br> Visalia, California <br><br> <p class="fs-3">email: tlc.community@yahoo.com</p></h1>
          </div>
        </div>
      </div>
    </div>
    </footer>
</section>

</html>
