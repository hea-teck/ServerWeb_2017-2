<?php
session_start();
 
if(!isset($_SESSION['login'])){
   header("Location: login.php");
}
?>

<!DOCTYPE html>

<html lang="en-US"> 
<head>

<!-- Meta Tags -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Final Project</title>   

<meta name="description" content="" /> 

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>  

<!-- Bootstrap -->
<link href="_include/css/bootstrap.min.css" rel="stylesheet">
<!-- Main Style -->
<link href="_include/css/main.css" rel="stylesheet">
<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">
<!-- FancyBox -->
<link href="_include/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<!-- Font Icons -->
<link href="_include/css/fonts.css" rel="stylesheet">
<!-- Shortcodes -->
<link href="_include/css/shortcodes.css" rel="stylesheet">
<!-- Responsive -->
<link href="_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="_include/css/responsive.css" rel="stylesheet">
<!-- Supersized -->
<link href="_include/css/supersized.css" rel="stylesheet">
<link href="_include/css/supersized.shutter.css" rel="stylesheet">
<!-- Google Font -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
<!-- Fav Icon -->
<link rel="shortcut icon" href="#">
<link rel="apple-touch-icon" href="#">
<link rel="apple-touch-icon" sizes="114x114" href="#">
<link rel="apple-touch-icon" sizes="72x72" href="#">
<link rel="apple-touch-icon" sizes="144x144" href="#">
<!-- Modernizr -->
<script src="_include/js/modernizr.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<!-- Header  네비게이션 바 -->
<header>
    <div class="sticky-nav">
      <a id="mobile-nav" class="menu-nav" href="#menu-nav"></a>
        
        <div id="logo">
          <a id="goUp" a href="content.php" title="Brushed | Responsive One Page Template">CAMSCON</a>
        </div>
        
        <nav id="menu">
          <ul id="menu-nav">                      
            <li><a href="upload.php" class="external">Upload</a></li> 
            <li><a href="logout.php" class="external">Logout</a></li>
            <li><a href="mypage.php" class="external">Mypage</a></li>
            <li><a class="external">Q & A</a></li>                
          </ul>
        </nav>
        
    </div>
</header>
<!-- End Header -->

<!-- Our Work Section -->
<div id="work" class="page">
  <div class="container">


      <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">   
                   <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        <div class="item active">
                          <img src="111.jpeg" alt="Los Angeles" style="width:110%;">        
                        </div>

                        <div class="item">
                          <img src="222.jpeg" alt="Chicago" style="width:110%;">        
                        </div>  
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
        <div class="row">


          <div class="span3">
              <!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                      <li class="type-work">CAMSCON</li>
                        <li><a href="content.php" data-option-value="*">All</a></li> 
                        <li><a href="#filter" data-option-value=".design">Street</a></li>
                        <li><a href="#filter" data-option-value=".photography">Fashion Week</a></li>
                        <li><a href="#filter" data-option-value=".video">Festival</a></li>



                        <form method="get" action="search.php">

                         <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" name="sea" />
                         <input type="submit" class="btn btn-primary btn-sm" value="Search">

                        </form>

                           

                     </ul>
                </nav>               
          </div>            


            <div class="span9"> 

              
              <?php //div 이용해서 2열 만들 것
                $con = mysqli_connect('localhost', 'root', '123123', 'final');
                $result=mysqli_query($con, "SELECT * FROM upload ORDER BY id DESC");            

                $_POST['title']=""; 
                $title=$_POST['title'];

                while ($row = mysqli_fetch_array($result)){

                  echo "<h3>"."<b>"."º ".$row['user_name']." 's CAMSCON ( in ".$row['title']." )"."<b>"."</h3>";
                  echo "<img align='center' width='300' height='200' src='get.php?title=$row[title]'>";                   
                  echo "<h5>"."<i>"."<font color=#00FFFF>"."<br>".$row['comment']."</font>"."</i>"."</h5>"."<hr>";   
                            
                }
                ?> 
             
            </div>





        </div>   


  </div>


</div>  

<!-- End Our Work Section -->

<!-- Socialize 아이콘 눌러서 다른 sns들어갈 수 있도록 설정-->
<div id="social-area" class="page">
  <div class="container">
      <div class="row">
            <div class="span12">
                <nav id="social">
                    <ul>
                        <li><a href="https://twitter.com" title="Follow Me on Twitter" target="_blank"><span class="font-icon-social-twitter"></span></a></li>                        
                        <li><a href="https://www.facebook.com" title="Follow Me on Facebook" target="_blank"><span class="font-icon-social-facebook"></span></a></li>
                        <li><a href="https://google.com" title="Follow Me on Google Plus" target="_blank"><span class="font-icon-social-google-plus"></span></a></li>                   
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Socialize -->

<!-- Footer -->
<footer>
  <p class="credits">HEATECK_Server_Web_Programmimg </p>
</footer>
<!-- End Footer -->


<!-- Js 사진 클릭했을 때 크게 나오면서 쭉 볼 수 있도록 하는 기능-->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --> <!-- jQuery Core -->
<!-- <script src="_include/js/bootstrap.min.js"></script>  --><!-- Bootstrap -->
<!-- <script src="_include/js/supersized.3.2.7.min.js"></script> --> <!-- Slider -->
<!-- <script src="_include/js/waypoints.js"></script>  --><!-- WayPoints -->
<!-- <script src="_include/js/waypoints-sticky.js"></script> --> <!-- Waypoints for Header -->
<!-- <script src="_include/js/jquery.isotope.js"></script>  --><!-- Isotope Filter -->
<!-- <script src="_include/js/jquery.fancybox.pack.js"></script> --> <!-- Fancybox -->
<!-- <script src="_include/js/jquery.fancybox-media.js"></script>  --><!-- Fancybox for Media -->
<!-- <script src="_include/js/jquery.tweet.js"></script> --> <!-- Tweet -->
<!-- <script src="_include/js/plugins.js"></script> --> <!-- Contains: jPreloader, jQuery Easing, jQuery ScrollTo, jQuery One Page Navi -->
<!-- <script src="_include/js/main.js"></script> --> <!-- Default JS -->
<!-- End Js -->

  

</body>
</html>


