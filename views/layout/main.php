    <!DOCTYPE html>
    <html>
      <head>
        <title>Home | %s </title>
	<meta charset='utf-8' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

  <script src="http://code.jquery.com/jquery.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      </head>
      <body>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">My MVC Site</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="?">Home</a></li>
       <li><a href="#">About</a></li>
                     
<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Валюты <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?r=cur/list">Список</a></li>
                  <li><a href="?r=cur/create">Создать новую</a></li>
                  
                </ul>
              </li>
<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Характеристики<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?r=atr/list">Список</a></li>
                  <li><a href="?r=atr/create">Создать новую</a></li>
                  
                </ul>
              </li>
<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Товары<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="?r=item/list">Список</a></li>
                  <li><a href="?r=item/create">Создать новый</a></li>
                  
                </ul>
              </li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
<div class="container">
<div id='ajaxresult'>
%s 
  </div>    
      <hr>

      <footer>
        <p>&copy; Company 2016</p>
      </footer>

    </div> <!-- /container -->
      
<script>
$('.nav > li').on('click',function(){
var el= $(this);
$('.nav > li').removeClass('active');
el.addClass('active');
});

</script>
      </body>
    </html>
