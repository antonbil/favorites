<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
  </body>
 <?php 

function cmp($a, $b)
{
$words1=explode(",",$a);
$words2=explode(",",$b);
$a=$words1[2].$words1[1];
$b=$words2[2].$words2[1];

    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}
echo '<a href="">Add album to list</a><br/>';
$str = file_get_contents('links.txt');
$lines=explode("\n", $str);
usort($lines, "cmp");
foreach ($lines as $line_num => $line) {
    $words=explode(",",$line);
    $id=$words[0];
    $artist=$words[1];
    $rtistsort=$words[2];
    $album=$words[3];
    $imageurl="";
    if (count($words)>4)$imageurl=$words[4]; 

    echo "<div class=\"spotifyalbum\">Album #<b>{$line_num}</b> : <div class=\"url\">" . $id . "</div> <div class=\"artist\">" 
    . $artist . "</div> <div class=\"album\">" . $album . "</div><img src=\"".$imageurl."\"></div><br />\n";
}
?>
</html>
 <?php 
