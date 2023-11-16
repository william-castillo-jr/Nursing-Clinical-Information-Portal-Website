<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Questionnaire</title>
    <link rel="icon" href="/images/Nursing.ico" type="image/x-con">



    <link rel="stylesheet" href="/sprint4/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1a3fb24dcc.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        nav{
            background-color: #6AB445;
            box-shadow: 0 3px 6px;
        }
        body{
            background-color: #106333;
        }
        .rating input{
            display: none;
        }
        .rating .fa-star{
            font-size: 20px;
            color: #444;
            padding: 10px;
            flex-direction: row-reverse;
            transition: all 0.2s ease;
        }
        input:not(:checked) ~ .fa-star:hover,
        input:not(:checked) ~ .fa-star:hover ~ .fa-star{
            color: #fd4;
        }
        input:checked ~ .fa-star{
            color: #fd4;
        }
        .rating label[data-clicked], .rating label[data-clicked] ~ label{
            color: #ffdd44;
        }
        .required::after {
            content: "*";
            color: red;
        }
    </style>


</head>
<body data-bs-theme="light">
<!--navigation bar-->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="http://chipmunks.greenriverdev.com/">
        <img src="/images/Nursing.png" class="nav-item" style="margin-left: 12px" width=50px height=50px>
    </a>
    <a class="navbar-brand" href="/index.html"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link mx-5" href="/sprint4/index.html" role="button">Requirements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-5" href="/sprint4/questionnaire.html" role="button">Questionnaire</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-5" href="/sprint4/contacts.html" role="button">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-5" href="http://chipmunks.greenriverdev.com/sprint4/php/viewentries.php" role="button">View Entries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-5" href="http://chipmunks.greenriverdev.com/sprint4/php/editrequirements.php" role="button">Edit Requirements</a>
            </li>
        </ul>
    </div>
    <button onclick = "darkMode()" id="dark-mode-toggle" class="btn btn-dark"> Dark </button>
</nav>

<!--page content-->
<div class="container p-3 mb-5 rounded container-bg" style="margin-top: 20px; box-shadow: 0 3px 6px;">
    <div class="card">
        <div class="card-body container-bg">
            <div class=”row”>
                <div class=col-12”>
                    <div>
                        <h1>Clinical Experience Questionnaire</h1>
                    </div>
                </div>
            </div>

            <div class="row container-bg">
                <div class ="col-12">
                    <p>Please fill out the following form to rate your experience on a scale of one to five stars at the clinical
                        attended. Please be honest as we collect this data to be sure we are sending our students to clinical
                        will provide good learning environments and opportunities!</p>
                    <p><span style="color: red">*</span>Indicates a required field.</p>

                </div>
                <!--beginning of question one - clinical site-->
                <div class="col-12">
                    <form name="questionnaire" method="post" action="/sprint4/php/confirm.php" id="contact-form">
                        <label for="site" class="required"><strong>1. What clinical site did you attend?</strong></label><br>

                        <?php
                        //connect to database
                        require '/home/chipmunk/db.php';

                        //define the SELECT query
                        $sql = "SELECT DISTINCT `What clinical site did you attend?`FROM `experience`";

                        //send the query to the database
                        $result = @mysqli_query($cnxn, $sql);
                        echo "<p><strong><i>Please type in one of the following clinics listed below:</i></strong></p>";

                        //process the rows
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            $medical = $row['What clinical site did you attend?'];
                            echo "<p><i>$medical</i></p>";
                        }

                        ?>
                        <input type="text" id="site" name="clinicSite" required>


                        <br><br>
                        <label class="required"><strong>2. I enjoyed my time at this clinic.</strong></label>
                        <div class="rating">
                            <input type="radio" name="rating-qn2" id="rate-5-qn2" value="5" ><label for="rate-5-qn2" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn2" id="rate-4-qn2" value="4" ><label for="rate-4-qn2" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn2" id="rate-3-qn2" value="3" ><label for="rate-3-qn2" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn2" id="rate-2-qn2" value="2" ><label for="rate-2-qn2" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn2" id="rate-1-qn2" value="1" ><label for="rate-1-qn2" class="fa fa-star"></label>
                        </div>

                        <br>
                        <label class="required"><strong>3. The clinical staff was supportive of my role.</strong></label>
                        <div class="rating">
                            <input type="radio" name="rating-qn3" id="rate-5-qn3" value="5" ><label for="rate-5-qn3" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn3" id="rate-4-qn3" value="4" ><label for="rate-4-qn3" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn3" id="rate-3-qn3" value="3" ><label for="rate-3-qn3" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn3" id="rate-2-qn3" value="2" ><label for="rate-2-qn3" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn3" id="rate-1-qn3" value="1" ><label for="rate-1-qn3" class="fa fa-star"></label>
                        </div>

                        <br>
                        <label class="required"><strong>4. The site helped facilitate my learning objectives.</strong></label>
                        <div class="rating">
                            <input type="radio" name="rating-qn4" id="rate-5-qn4" value="5" ><label for="rate-5-qn4" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn4" id="rate-4-qn4" value="4" ><label for="rate-4-qn4" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn4" id="rate-3-qn4" value="3" ><label for="rate-3-qn4" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn4" id="rate-2-qn4" value="2" ><label for="rate-2-qn4" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn4" id="rate-1-qn4" value="1" ><label for="rate-1-qn4" class="fa fa-star"></label>
                        </div>

                        <br>
                        <label class="required"><strong>5. The preceptor helped facilitate my learning objectives.</strong></label>
                        <div class="rating">
                            <input type="radio" name="rating-qn5" id="rate-5-qn5" value="5" ><label for="rate-5-qn5" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn5" id="rate-4-qn5" value="4" ><label for="rate-4-qn5" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn5" id="rate-3-qn5" value="3" ><label for="rate-3-qn5" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn5" id="rate-2-qn5" value="2" ><label for="rate-2-qn5" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn5" id="rate-1-qn5" value="1" ><label for="rate-1-qn5" class="fa fa-star"></label>
                        </div>

                        <br>
                        <label class="required"><strong>6. I would recommend this site to another student.</strong></label>
                        <div class="rating">
                            <input type="radio" name="rating-qn6" id="rate-5-qn6" value="5" ><label for="rate-5-qn6" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn6" id="rate-4-qn6" value="4" ><label for="rate-4-qn6" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn6" id="rate-3-qn6" value="3" ><label for="rate-3-qn6" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn6" id="rate-2-qn6" value="2" ><label for="rate-2-qn6" class="fa fa-star"></label>
                            <input type="radio" name="rating-qn6" id="rate-1-qn6" value="1" ><label for="rate-1-qn6" class="fa fa-star"></label>
                        </div>

                        <br>
                        <label for="comments"><strong>7. If you have any comments you would like to leave about the site or staff
                                at this facility please add below.</strong>
                        </label><br>
                        <input type="text" id="comments" name="Comments" style="width: 400px; height: 50px;">

                        <br>
                        <label for="feedback"><strong>8. If you have any feedback you would like to leave about your clinical
                            instructor please add below. None of the instructors will see this. We
                            will just be using this to gage if an instructor needs to improve in areas,
                                or to highlight instructors who go above and beyond.</strong>
                        </label><br>
                        <input type="text" id="feedback" name="Feedback" style="width: 400px; height: 50px;" >
                        <div>
                            <br>
                            <div id="disp" style="color:red; font-weight:bold"></div>
                            <button type="submit" class="validate" value="Submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script>-->
<!--    let stars = document.querySelectorAll(".rating label");-->

<!--    for(let star of stars){-->
<!--        star.addEventListener("click", function (){-->
<!--            this.setAttribute("data-clicked","true")-->
<!--        });-->
<!--    }-->

<!--</script>-->
<script src="/sprint4/dark_mode.js"></script>
</body>
</html>
