<!DOCTYPE html>
<!-- index.html -->
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php include_once('header.php') ?>
  <div class="container">
    <div class="jumbotron">
      <h1>Samuel Hibbard</h1>
      <blockquote class="blockquote-reverse">
        <p>Programmers are in a race with the Universe to create bigger and better idiot-proof programs,
        while the Universe is trying to create bigger and better idiots.  So far the Universe is winning.</p>
        <footer><cite title="Source Title">Rich Cook</cite></footer>
      </blockquote>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"><h2>About me</h2></div>
          <div class="panel-body">
            <p>I was born in Beaver, Utah. Which I then moved to Idaho and have lived most of my life in Idaho.
            I can play up to several instruments including: piano, singing, euphonium, tuba, and the bagpipes. I
            am married to my beauitful wife Katie. We have been married since 2014. I love reading fantasy and
            sci-fi books especially <i>The Lord of the Rings Trilogy</i></p>
            <h3>Interest in Computer Science</h3>
            <p>I have always loved computers and how they work. I love to be up to date on new things and new technology. When
            I got to college I took a Networking class and I loved the concept of programming the router to
            do certain things for traffic. I then decided to see more the Computer Science department and I loved it
            ever since. I love to develop software that people can utilize. Creating knew ways and ideas that can solve
            problems. Learning knew languages is something that I love to do all the time.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="2013-11-08_0001.jpg" alt="Engagement Pic.">
              <div class="carousel-caption">
                <h3>Engagement Picture</h3>
                <p>We did our pictures around Rexburg during the fall.</p>
              </div>
            </div>

            <div class="item">
              <img src="my_house.jpg" alt="My House">
              <div class="carousel-caption">
                <h3>Our Apartment</h3>
                <p>We are currently living in this cabin. It is really nice and homey.</p>
              </div>
            </div>

            <div class="item">
              <img src="20140111-wedding-4040_WEB.jpg" alt="Wedding Pic">
              <div class="carousel-caption">
                <h3 class="black-text">Wedding Picture</h3>
                <p class="black-text">I married my wife at the Oquirrh Mountain Temple in Utah.</p>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2  class="center-header-text">More Info</h2>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-4 border darken">
                <h4>Email: hibbards01@gmail.com</h4>
              </div>
              <div class="col-md-4 border darken">
                <h4>Phone: 918-645-7866</h4>
              </div>
              <div class="col-md-4">
                <a class="bigger-text" href="https://www.linkedin.com/pub/samuel-hibbard/72/561/394">Linkedin</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="copyright">Copyright &#169; 2015 Samuel Hibbard</footer>
</body>
</html>