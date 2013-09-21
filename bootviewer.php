<?php
function ListFiles($dir) {

    if($dh = opendir($dir)) {

        $files = Array();
        $inner_files = Array();

        while($file = readdir($dh)) {
            if($file != "." && $file != ".." && $file[0] != '.') {
                if(is_dir($dir . "/" . $file)) {
                    $inner_files = ListFiles($dir . "/" . $file);
                    if(is_array($inner_files)) $files = array_merge($files, $inner_files); 
                } else {
                    array_push($files, $dir . "/" . $file);
                }
            }
        }

        closedir($dh);
        return $files;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<style>

</style>
    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

	<style>
	body {
	background-color:black;
	}
	</style>

  </head>

  <body>


    <div class="container">

      <div class="starter-template">
<div id="carousel-example-generic" class="carousel slide">
  <!-- Indicators -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner">


<?php
$i = 0;
$imgs =ListFiles('images');
shuffle($imgs);

foreach ($imgs as $key=>$file){
if($i == 0) { echo '<div class="item active">';}
else {echo '<div class="item">';}
echo '
      <img src="'.$file.'" alt="image">
      <div class="carousel-caption">
      </div>
    </div>';
$i++;
} 
?>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="icon-next"></span>
  </a>
</div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <script src="//code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>


<?php
/*
foreach (ListFiles('images/') as $key=>$file){
    echo $file ."<br />";
} */ 
?>
