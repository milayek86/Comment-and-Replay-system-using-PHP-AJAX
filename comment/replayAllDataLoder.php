
<?php
include ('includeIt.php');
if (isset($_POST['commentID'])) {
  $commentID=$_POST['commentID'];?>
  <div class="form-group" style="overflow:hidden;">
    <label for="comment">Comment:</label>
    <textarea id="ReplayCmt-<?=$commentID?>" class="form-control ReplayCmt" rows="2" style="max-width:100%;"></textarea>
    <div class="col-sm-12" style="margin:2px;" id="plsTypecmt-<?=$commentID?>"></div>
    <button pid="<?=$commentID?>" id="ReplayCmtButt-<?=$commentID?>" type="submit" class="btn btn-warning ReplayCmtButt">comment</button>
  </div>

<?php

//  $con= mysqli_connect("localhost", "root", "", "comment");
  $query_R="SELECT * FROM replay WHERE commentID='$commentID'";
  $sql_R=mysqli_query($con,$query_R);

  if (mysqli_num_rows($sql_R)>0) {
    while ($row_R = mysqli_fetch_assoc($sql_R)) {
      $Rid= $row_R['id'];
      $replayUserId = $row_R['replayUserId'];
      $commentID = $row_R['commentID'];//****can featch usr info***
      $replaydata = $row_R['replaydata'];
      $replytime = $row_R['replaytime'];
      echo '
      <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
         <p>Commented By Rohan Layek , Date: '.$replytime.'  </p>
       </div>

        <p style="color:black;padding:10px;margin:5px;">'.nl2br($replaydata).'</p>

       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
       </div>
      </div>
      ';
     }
  }
}
?>
