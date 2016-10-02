 <?php
$url=$_GET['url'];
$artist=$_GET['artist'];
$artist = str_replace(",", " ", $artist);
$artistsort=$_GET['artistsort'];
$album=$_GET['album'];
$album = str_replace(",", " ", $album);
$pictureurl=$_GET['pictureurl'];
//https://api.spotify.com/v1/albums/{id}
if ((strlen ($artist)==0) ||(strlen ($album)==0) || (strlen ($pictureurl)==0)){
  $response = file_get_contents('https://api.spotify.com/v1/albums/'.$url);
  $response = json_decode($response);
  var_dump($response);
} else {
  $out="\n".$url.",".$artist.",".$artistsort.",".$album.",".$pictureurl;
  file_put_contents('links.txt', $out, FILE_APPEND);
}
?>
