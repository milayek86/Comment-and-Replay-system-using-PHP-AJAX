<?php
// function filter_all($event){
//     $con= mysqli_connect("localhost", "root", "", "comment");
//     $eventSecure =strip_tags(htmlentities($event));
//     $eventSecure=mysqli_real_escape_string($con, $eventSecure);
//     return $eventSecure;
// }
//echo filter_all($string);
include ('includeIt.php');


    $post_id=$_POST['post_id'];
    $usr_id=$_POST['usr_id'];
    $commentdata=filter_all($_POST['CommentData']);
    $commentID=$_POST['commentID'];
    $query="INSERT INTO `cmt_all` (`id`, `post_id`, `usr_id`, `commentdata`, `timeOfCmt`)
                 VALUES (NULL, '$post_id', '$usr_id', '$commentdata', CURRENT_TIMESTAMP)";


    $timestamp = date('Y-m-d G:i:s');
    //$commentID= $commentID + 1;
if (mysqli_query($con,$query)) {
   $query="SELECT * FROM cmt_all";
   $sql=mysqli_query($con,$query);
   while ($row = mysqli_fetch_assoc($sql)) {
     $commentID = $row['id'];
   //  echo "$commentID";
   }
   // $query_R="SELECT * FROM replay WHERE commentID='$commentID'";
   // $sql_R=mysqli_query($con,$query_R);
   // $ReplayCount=mysqli_num_rows($sql_R);
   echo '
   <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
      <p>Commented By Rohan Layek , Date: '.$timestamp.'  </p>
    </div>

     <p style="color:black;padding:10px;margin:5px;">'.nl2br(strip_tags(htmlentities($_POST['CommentData']))).'</p>

    <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
      <p id="Replay" class="btn btn-primary btn-xs">Total Replays (0)</p>
     <p pid="'.$commentID.'" id="ReplayButt-'.$commentID.'" class="btn btn-primary btn-xs ReplayButt">Replay</p>

    <div id="ReplayViewer-'.$commentID.'" class="col-sm-12 ReplayViewer" style="margin:0;padding:auto;">  <!-- replay cmt -->

    </div>
    </div>
   </div>
   ';
}else {
   echo "failed";
}













?>
