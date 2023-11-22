<?php
    $error="";

    $successMassage="";
    if($_POST){
        if(!$_POST["emeil"]){
            $error.="An emeil<br>";
        }
        if(!$_POST["content"]){
            $error.= "The Content<br>";
        }
        if(!$_POST["subject"]){
            $error.="The subject<br>";
        }
        if(!$_POST["emeil"] && filter_var($_POST["emeil"], FILTER_VALIDATE_EMAIL)=== false) {
            $error.=" The Emeil 1<br> "; 
        }
        if($error !=""){
            $error='<div class="alert alert-danger" role="alert"> <p>There were</p>'. $error. '</div>';
        }
        else{
            $emeilTo = "pashavilich@lector.com";
            $subject= $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: " . $_POST['emeil'];
        }
        if (mail($emeilTo, $subject, $content, $headers)) {
            $successMassage= '<div class="alert alert-success" role="alert">Your massage' .
                                'we\'ll get back to you ASAP!</div>';
            }
        else{
            $error = '<div class="alert alert-danger" role="alert">Your penis</div> ';
        };

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="conteiner">
    <div class="container">
        <h1>Get in touch</h1>
        <div id="error"><?php echo $error. $successMassage; ?>
        </div>
        <form method="post">
                <fieldset class="form-group">
                    <label for="email">Email address </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    <small class="text-muted">We'll never share your e-mail with anyone else.</small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="subject">Subject </label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </fieldset>

                <fieldset class="form-group">
                    <label for="content">What would you like to ask us?</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </fieldset>

                <button type="submit" id="submit" class=" btn btn-primary">Submit</button>
            </form>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script text="text/javascript">
            $("form").submit(function(e){
                let error = "";
                if($("#emeil").val() == ""){
                    error += "the emeil field is required<br>";
                };
                if ($("#subject").val() == "") {
                   error +="the subject field<br>" 
                }
                if($("#content").val() == ""){
                    error += "the content is field<br>";
                };
                if(error !=""){
                    $("#error").html('<div class="alert alert-danger"'+
                    ' role="alert"><p><strong> Error</strong></p>'+ error +'</div> ')
                    return false;
                }
                else{
                    return true;
                }
            });
        </script>
    </div>
</body>
</html>
