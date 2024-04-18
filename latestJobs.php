<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Latest Jobs</title>
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar ul {
            line-height: 2;
        }

        .navbar ul li {
            margin: 0px 30px;
        }

        .error {
            color: red;
        }

        .comment {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #6565b5;
            border-radius: 10px;
        }
        label{
            color: white;
        }
    </style>
</head>

<body>
    <div class="header">
        <img id="logo" src="images/sr.JPG" alt="logo">
        <div class="allheading">
            <h1 id="heading">SOFTWARE RESULT</h1>
            <h2 id="subheading">WWW.SOFTWARERESULT.COM</h2>
        </div>
    </div>

    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">Latest Jobs</a></li>
                <li><a href="internship.html">Internships</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="addmission.html">Admissions</a></li>
                <li><a href="syllabus.html">Syllabus</a></li>
                <li><a href="course.html">Courses</a></li>
                <li><a href="contactUs.html">Contact Us</a></li>

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Admin Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="index.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    <span class="error">
                    <?php       
        if(isset($_SESSION['emailLogErr'])) { ?>
                    <?php echo '*'.$_SESSION['emailLogErr']; ?>
                    <?php } unset($_SESSION['emailLogErr']); ?>
                </span>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
    <span class="error">
                    <?php       
        if(isset($_SESSION['passErr'])) { ?>
                    <?php echo '*'.$_SESSION['passErr']; ?>
                    <?php } unset($_SESSION['passErr']); ?>
                </span>
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
<div id="emailHelp" class="form-text">Don't Have an Account? 
<button class="btn btn-link" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Register</button>
    </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Register Here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div id="emailHelp" class="form-text">Already Have an Account? 
      <button class="btn btn-link" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
    </div>
      </div>
      
    </div>
  </div>
</div>
<button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>

            </ul>
        </nav>
    </div>
    <?php
         if(isset($_SESSION['logStatus'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Alert!</strong>
                <?php echo $_SESSION['logStatus']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } unset($_SESSION['logStatus']); ?>
    <?php       
        if(isset($_SESSION['status'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>
        <?php echo $_SESSION['status']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } unset($_SESSION['status']); ?>
    <div class="banner"><img src="images/Hbanner.jpg" alt="" height="300px" width="100%"></div>
    <div class="container" style="display: flex;">
        <div class="box">
            <h2>Latest Jobs</h2>
            <ul>
            <li><a href="https://careers.adobe.com/us/en/job/R144367/Software-Development-Engineer-2-iOs">Adobe Software Development Engineer 2 (iOs)</a></li>
            <li><a href="https://www.phonepe.com/careers/jobs/Software-Engineer-Backend-(Indus)/5895993003">Phonepe Software Engineer-Backend (Indus)</a></li>
            <li><a href="https://careers.amd.com/careers-home/jobs/42771?lang=en-us">AMD Software System Designer 1</a></li>
            <li><a href="https://indiacampus.accenture.com/myzone/accenture/1/jobs/25377/job-details">Accenture Associate Software Engineer</a></li>
            <li><a href="https://careers.netapp.com/job/bengaluru/software-engineer-c-c/27600/63094901840">NetApp Software Engineer</a></li>
            <li><a href="https://careers.spglobal.com/jobs/296804?lang=en-us">S&P Global Software Engineer</a></li>
            <li><a href="https://careers.adobe.com/us/en/job/ADOBUSR145089EXTERNALENUS/Software-Development-Engineer">Adobe Software Development Engineer</a></li>
            <li><a href="https://michelinhr.wd3.myworkdayjobs.com/en-US/Michelin/job/Pune/Software-Engineer_R-2024011060-1">Michelin Software Engineer</a></li>
            <li><a href="https://flextronics.wd1.myworkdayjobs.com/en-US/Careers/details/Developer--IT_WD180980">Flex Software Developer</a></li>
            <li><a href="https://careers.bakerhughes.com/global/en/job/R112783/Software-Engineering-Specialist-Java">Baker Hughes Software Engineer</a></li>
            <li><a href="https://careers.thomsonreuters.com/us/en/job/THTTRUUSJREQ177278EXTERNALENUS/Software-Engineer-python">Thomson Reuters Software Engineer- Python</a></li>
            <li><a href="https://talent.lowes.com/in/en/job/JR-01686243/Software-Engineer">Lowe's Companies, Inc.Software Engineer</a></li>
            <li><a href="https://jpmc.fa.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX_1001/job/210498734">JPMorgan Chase & Co.Software Engineer II - Python Flask</a></li>
            <li><a href="https://careers.godaddy/jobs/software-development-engineer-india-ad99fd10-59ea-43bd-b6e5-86550c75de4f">Godaddy Software Development Engineer</a></li>
            <li><a href="https://careers.qualcomm.com/careers/job/446697663619?domain=qualcomm.com">Qualcomm Display Software Engineer</a></li>
            <li><a href="https://efds.fa.em5.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX_1/job/26555">Ford Motor Pvt Ltd Software Engineer</a></li>
            <li><a href="https://paypal.eightfold.ai/careers?domain=paypal.com&sort_by=relevance&query=R0110496">PayPal Software Engineer</a></li>
            <li><a href="https://freshers.hcltech.com/">HCLTech Software Engineer</a></li>
            <li><a href="https://careers.ibm.com/job/19606041/front-end-developer-bangalore-in">IBM Front End Developer</a></li>
            <li><a href="https://jobs.careers.microsoft.com/global/en/job/1703355/Software-Engineer">Microsoft Software Engineer</a></li>
            <li><a href="https://www.tcs.com/careers/india/tcs-fresher-hiring-nqt-2024">TCS Software Development Engineer</a></li>
            </ul>
        </div>
        <div class="banner"><img src="images/verticalBanner.jpg" alt=""></div>
    </div>

    <div id="form" class="comment">

        <?php
        
        if(isset($_SESSION['failed'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <?php echo $_SESSION['failed']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } unset($_SESSION['failed']); ?>

        <form method="post" action="index.php">
            <h1 style="text-align: center; margin-bottom: 20px; color: #a73939;">Leave a Comment Here</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label><span style="color:red;">*</span>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
                <span class="error">
                    <?php       
        if(isset($_SESSION['nameErr'])) { ?>
                    <?php echo '*'.$_SESSION['nameErr']; ?>
                    <?php } unset($_SESSION['nameErr']); ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label><span style="color:red;">*</span>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required>
                <span class="error">
                    <?php       
            if(isset($_SESSION['emailErr'])) { ?>
                    <?php echo '*'.$_SESSION['emailErr']; ?>
                    <?php } unset($_SESSION['emailErr']); ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone</label><span style="color:red;">*</span>
                <input type="phone" class="form-control" id="exampleFormControlInput1" name="phone" required>
                <span class="error">
                    <?php       
            if(isset($_SESSION['phoneErr'])) { ?>
                    <?php echo '*'.$_SESSION['phoneErr']; ?>
                    <?php } unset($_SESSION['phoneErr']); ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">City</label><span style="color:red;">*</span>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="city" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comment</label><span style="color:red;">*</span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

    <footer>
        <div class="footerLayout">
            <div class="quickLinks">
                <h3>Quick Links</h3>
                <a href="https://twitter.com/Rajawant_Yadav">Software Result @Twitter</a>
                <a href="#">Software Result @Telegram</a>
                <a href="https://api.whatsapp.com/qr/AU7VBDTSPOGYI1?autoload=1&app_absent=0">Software Result @WhatsApp</a>
                <a href="https://www.instagram.com/rajawant_yadav07/">Software Result @Instagram</a>
                <a href="#https://facebook.com/">Software Result @Facebook</a>
                <a href="https://www.linkedin.com/in/rajawant-yadav-15b341244">Software Result @Linkedin</a>
                <a href="https://www.youtube.com/@rajawantyadav-mi6ug">Software Result @Youtube</a>
                <a href="https://cuet.nta.nic.in/">All University Exams</a>
                <a href="contactUs.html">Software Result Contact Us</a>
                <a href="#">Privacy Policy</a>
            </div>

            <div class="quickLinks">
                <h3>Apps</h3>
                <a href="#">Android App</a>
                <a href="#">Apple IOS App</a>
            </div>

            <div class="more">
                <h3>More</h3>
                <div class="col-display">
                    <a href="https://www.google.com/about/careers/applications/jobs/results/">Google</a>
                    <a href="https://www.microsoft.com/en-in">Microsoft</a>
                    <a href="https://www.accenture.com/in-en">Accenture</a>
                    <a href="https://www.amazon.in/">Amazon</a>
                    <a href="https://www.flipkart.com/">Flipkart</a>
                    <a href="https://www.tcs.com/">TCS</a>
                    <a href="https://www.wipro.com/">Wipro</a>
                    <a href="https://www.infosys.com/">Infosys</a>
                    <a href="https://www.techmahindra.com/en-in/?f=1323120599">Tech Mahindra</a>
                    <a href="https://www.cognizant.com/in/en">Cognizant</a>
                    <a href="https://internshala.com/student/dashboard">Internshala</a>
                    <a href="https://paytm.com/">Paytm</a>
                    <a href="https://www.uplers.com/in/">Uplers</a>
                    <a href="https://www.hcltech.com/">HCL Tech</a>
                    <a href="https://www.mha.gov.in/en">Ministery of India</a>
                    <a href="https://www.capgemini.com/in-en/">Capgemini</a>
                    <a href="https://www.nic.in/">NIC Center</a>
                </div>
            </div>

        </div>
    </footer>

</body>

</html>