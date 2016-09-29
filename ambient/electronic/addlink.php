<html>
 <head>
  <title>Add link</title>
 </head>
 <body>
 <?php
$url=$_GET['url'];
$artist=$_GET['artist'];
$artistsort=$_GET['artistsort'];
$album=$_GET['album'];
$out=$url.",".$artist.",".$artistsort.",".$album;
file_put_contents('links.txt', $out, FILE_APPEND);
?>
 </body>
</html>
