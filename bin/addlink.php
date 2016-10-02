 <?php
 function display_form(){
    echo '
    <form id="form1" name="form1" method="get" action="addlink.php">
    Add album to list<p>
    <label>Spotify-Album-Uri:
    <input type="text" name="url" id="url" />
    </label><br/>
    <label>Sort-item
    <input type="text" name="artistsort" id="artistsort" />
    </label>

    <p>
    <label>Submit
    <input type="submit" name="submit" id="submit" value="Submit" />
    </label>
    </p>
    </form>
    ';
}
$url=$_GET['url'];
$artist=$_GET['artist'];
$artist = str_replace(",", " ", $artist);
$artistsort=$_GET['artistsort'];
$album=$_GET['album'];
$album = str_replace(",", " ", $album);
$pictureurl=$_GET['pictureurl'];
//https://api.spotify.com/v1/albums/{id}
if (strlen ($url)==0){
} else {
    if ((strlen ($artist)==0) ||(strlen ($album)==0) || (strlen ($pictureurl)==0)){
    $myurl=str_replace ( "spotify:album:","",$url);
    $spotifyUri='https://api.spotify.com/v1/albums/'.$myurl;
    $response = file_get_contents($spotifyUri);
    echo "Address: $spotifyUri<br/>";
    $response = json_decode($response);
    $artist=$response->artists[0]->name;
    $artist = str_replace(",", " ", $artist);
    $album=$response->name;
    $album = str_replace(",", " ", $album);
    $nr=0;
    if (count($response->images)>1)$nr=1;
    $pictureurl=$response->images[$nr]->url;
    $out="\n".$url.",".$artist.",".$artistsort.",".$album.",".$pictureurl;
    echo $out."<br/>";
    file_put_contents('links.txt', $out, FILE_APPEND);
    } else {
        echo $out."<br/>";
        $out="\n".$url.",".$artist.",".$artistsort.",".$album.",".$pictureurl;
        file_put_contents('links.txt', $out, FILE_APPEND);
    }
}
  display_form();

?>
