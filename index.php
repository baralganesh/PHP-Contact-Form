<?php
$error = "";
$successMessage = "";
if ($_POST) {

    if (!$_POST["email"]) {
        $error .= "An email address is required.<br>";
    }


    if (!$_POST["subject"]) {
        $error .= "Subject line is required.<br>";
    }


    if (!$_POST["contact"]) {
        $error .= "Contact message is required.<br>";
    }



    if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
        $error .= "Email address is invalid.<br>";
    }

    if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert">
        <strong>Sorry! PHP Generated</strong> <p>Please fix following errors and try submitting again.</p>' . $error . '</div>';
    }else{
        $emailTo = "youremail@yourdomain.com";
        $subject = $_POST['subject'];
        $content = $_POST['contact'];
        $header = "From ".$_POST['email'];

        if (mail($emailTo, $subject, $content, $header)){
            $successMessage = '<div class="alert alert-success" role="alert">
            <strong>Congratulations!</strong> <p>Your message has been sent.<br> We\'ll reply your email ASAP!</p></div>';
        } else{
            $error = '<div class="alert alert-danger" role="alert">
            <strong>Sorry!</strong> <p>Your message couldn\'t be sent.<br>Please try again later</p></div>';   
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Get In Touch</h1>
        <div id="error">
            <? echo $error.$successMessage; ?>
        </div>
        <br>
        <form method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                <small id="emailHelp" class="form-text text-muted">Be sure. We never share your email with third parties.</small>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="You email subject line">
            </div>

            <div class="form-group">
                <label for="contact">Enter your message below</label>
                <textarea class="form-control" id="contact" name="contact" rows="5" placeholder="Enter your message here..........."></textarea>
                <br>
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("form").submit(function(e) {
                    e.preventDefault();

                    var error = "";
                    if ($("#email").val() == "") {
                        error += "<p>An email address is required</p>";
                    }

                    if ($("#subject").val() == "") {
                        error += "<p>The subject field is required</p>";
                    }

                    if ($("#contact").val() == "") {
                        error += "<p>The contact message is required</p>";
                    }

                    if (error != "") {
                        $("#error").html("<div class="alert alert-danger" role="alert">
        <strong>Sorry! Javascript generated</strong> <p>Please fix following errors and try submitting again.</p>" + error + "</div>");
                        return true;
                        } else{
                            $("form").unbind('submit').submit();
                        }

                        });
    </script>

</body>

</html>