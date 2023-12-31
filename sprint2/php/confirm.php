<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Questionnaire</title>
    <link rel="icon" href="/images/Nursing.ico" type="image/x-con">
    

    <link rel="stylesheet" href="/sprint2/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1a3fb24dcc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        #review-input{
            margin: 30px 100px;
        }
        #text {
            margin-top: 3em;
        }
        #button{
            margin-top: 4em;
            padding: 10px 30px ;
            text-align: center;
            font-size: 17px;
        }



    </style>
</head>
<body data-bs-theme="light">

<!--navigation bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="/index.html"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <a href="http://chipmunks.greenriverdev.com/"><img src="/images/Nursing.png" class="nav-item mx-4 justify-content-left" width=50px height=50px></a>
            <li>
                <a class="nav-link mx-5" href="/sprint2/index.html" role="button">Requirements</a>
            </li>
            <li>
                <a class="nav-link mx-5" href="/sprint2/questionnaire.html" role="button">Questionnaire</a>
            </li>
            <li>
                <a class="nav-link mx-5" href="/sprint2/contacts.html" role="button">Contact Us</a>
            </li>
        </ul>
    </div>
    <button onclick = "darkMode()" id="dark-mode-toggle" class="btn btn-dark"> Dark </button>
</nav>

<!--page content-->
<div class="container container-bg">
    <?php
    $hasValue = true;
    $requiredFields = array(
        "What clinical site did you attend?" => $_POST["clinicSite"],
        "I enjoyed my time at this clinic." => $_POST["rating-qn2"],
        "The clinical staff was supportive of my role." => $_POST["rating-qn3"],
        "The site helped facilitate my learning objectives." => $_POST["rating-qn4"],
        "The preceptor helped facilitate my learning objectives." => $_POST["rating-qn5"],
        "I would recommend this site to another student." => $_POST["rating-qn6"]
    );

    foreach ($requiredFields as $field => $value) {
        if (empty($value)) {
            $hasValue = false;
            break;
        }
    }

    if ($hasValue) {
        echo '<div class="container justify-content-center m-5">
                <div class="row">
                  <div id="text" class="col-lg-12">
                    <img src="/images/checkmark_icon.png" class="img-responsive center-block d-block m-auto" width="150px" alt="stop">
                    <h1 class="text-center my-3">Awesome!</h1>
                  </div>
                </div>
                <div class="row">
                <div class="col-lg-12 text-center">
                <p>Thank you for completing the form! Please review your entry below.</p>
                </div>
                </div>';
        echo "<div class='card p-5 shadow-lg p-3 mb-5 bg-white rounded' style='border-radius: 5%' id='review-input'><h2>Form Confirmation</h2><br>";

        foreach ($requiredFields as $field => $value) {
            echo "<p><b>$field :</b><br> $value</p><br>";
        }
        $last2Fields = array_slice($_POST, -2, 2);
        foreach ($last2Fields as $field => $value) {
            echo "<p><b>$field :</b> $value</p><br>";
        }

        echo ' </div>
 <div class="row">
         <div class="col-12 text-center mt-5">
         <h4>Are you ready to submit?</h4>
         </div>
         </div>
         <div class="row">
          <div class="col-6 text-center">
          <a id="button" class="btn btn-danger btn-lg" href="/sprint2/questionnaire.html" role="button">Back to Form</a>
          </div>
          
          <div class="col-6 text-center">
            <form name="questionnaire" method="post" action="/sprint2/php/receipt.php">';
      foreach ($_POST as $field => $value) {
          echo '<input type="hidden" name='.$field.' value= '.$value.'>';
      }
          echo '<input id="button" class="btn btn-success btn-lg" type="submit" value="Submit" role="button">
        </form>
      </div>
    </div>';

    } else {
        echo '<div class="col d-flex justify-content-center">
              <div class="card p-lg-5 m-lg-5 shadow-lg p-3 mb-5 bg-white rounded" style="width: 30em; height: 40em; border-radius: 5%">
                  <div class="row">
                      <div id="text" class="col-lg-12">
                        <img src="/images/warning_light.PNG" class="img-responsive center-block d-block mx-auto" width="200px" alt="stop">
                        <h1 class="text-center">Oops..</h1>
                      </div>
                  </div>
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <h4>Form was not filled out correctly. Please go back and try again.</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 text-center">
                  <a id="button" class="btn btn-success btn-lg" href="/sprint2/questionnaire.html" role="button">Back to Form</a>
                  </div>
                </div>
              </div>
              </div>';
    }
    ?>


</div>
<script src="/sprint2/dark_mode.js"></script>
</body>
</html>