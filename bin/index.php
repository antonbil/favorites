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
echo '<a href="addlink.php">Add album to list</a><br/>';
$str = file_get_contents('links.txt');
$lines=explode("\n", $str);
usort($lines, "cmp");
    echo '
    <form id="form1" name="form1" method="get" action="index.php"><table>';
foreach ($lines as $line_num => $line) {
    echo '<tr class="spotifyalbum">';
    $words=explode(",",$line);
    $id=$words[0];
    $artist=$words[1];
    $rtistsort=$words[2];
    $album=$words[3];
    $imageurl="";
    if (count($words)>4)$imageurl=$words[4]; 
    echo '<td><input name="checkbox[]" type="checkbox" value="'.str_replace ( "spotify:album:","",$id).'"></td>';

    echo "<td>Album #<b>{$line_num}</b> : </td><td><div class=\"url\">" . $id . "</div> </td><td><div class=\"artist\">" 
    . $artist . "</div> <div class=\"album\">" . $album . "</div> <div class=\"img\">" . $imageurl . "</div></td><td><img  src=\"".$imageurl."\" height=\"42\" width=\"42\"></td>\n";
   echo '</tr>';

}
echo '</table></p><input type="submit" name="delete" value="delete"/>';
if(isset($_GET['delete']))
{
        $file = file("links.txt");
        $cnt=array();
        $cnt=count($_GET['checkbox']);
        for($i=0;$i<$cnt;$i++)
        {
            $del_id=$_GET['checkbox'][$i];
            $workitem="remove where Id=".$del_id;
            echo $workitem.'<br/>';
                foreach( $file as $key=>$line ) {
                    if( false !== strpos($line, $del_id) ) {
                    echo 'found in line:'.$line;
                    unset ($file[$key]);
                    break;//only first occurrence must be removed
                    }
                }

        }
        file_put_contents('links.txt', $file);
        echo '</p><a href="index.php">See result of deletion</a><br/>';
  }
  echo '    </p>
    </form>
';
  ?>
</html>
 <?php 
