 <?php
$url=$_GET['url'];
$artist=$_GET['artist'];
$artist = str_replace(",", " ", $artist);
$artistsort=$_GET['artistsort'];
$album=$_GET['album'];
$album = str_replace(",", " ", $album);
$pictureurl=$_GET['pictureurl'];
$out="\n".$url.",".$artist.",".$artistsort.",".$album.",".$pictureurl;
file_put_contents('links.txt', $out, FILE_APPEND);
?>
