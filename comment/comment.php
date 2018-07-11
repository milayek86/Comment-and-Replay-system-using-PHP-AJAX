<!DOCTYPE html>
<html>
<head>
    <title>EnterioAM | Team Members</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background: linear-gradient(to left, #6699ff 0%, #00ffcc 100%);margin-bottom:100px;">
<div class="container" style="margin-top:20px;">
   <h1 style="color:black;font-size:50px;">"comment box"</h1>
 <div class="col-sm-12" style="min-height:200px;text-align:;padding-top:20px;">

    <div class="form-group" style="overflow:hidden;">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="2" id="CommentData" style="max-width:100%;"></textarea>
      <div class="col-sm-12" style="margin:2px;" id="plsTypecmt"></div>
      <button id="Csubmit" type="submit" class="btn btn-warning">comment</button>
    </div>

    <div id="NewCmt" class="col-sm-12" style="min-height:;max-height:600px;background-color:#fff;padding:5px;margin:0;overflow-y:scroll;">
    <div class="col-sm-12" id="emptyCmt"></div>
<?php
    $post_id="p13"; //you have to give the post id... I have choosen just a randome id.
	  $usr_id="usr_id";  //you have to give the User id..
    $con= mysqli_connect("localhost", "root", "", "comment");
    $query="SELECT * FROM cmt_all WHERE post_id='$post_id' ORDER BY post_id ASC";
    $sql=mysqli_query($con,$query);

    if (mysqli_num_rows($sql)>0) {
	    while ($row = mysqli_fetch_assoc($sql)) {
        $commentID= $row['id'];
	    	$post_id1 = $row['post_id'];
	    	$usr_id1 = $row['usr_id'];//****can featch usr info***
	    	$commentdata = $row['commentdata'];
        $timeOfCmt = $row['timeOfCmt'];

        $query_R="SELECT * FROM replay WHERE commentID='$commentID'";
        $sql_R=mysqli_query($con,$query_R);
        $ReplayCount=mysqli_num_rows($sql_R);
?>

	      <div class="col-sm-12" style="min-height:40px;background-color:#E0E0E0;margin-top:5px;padding:0;">

	       <div class="col-sm-12" style="margin:0;padding:auto;background-color:#C8C8C8;">
	         <p>Commented By Rohan Layek , Date: <?=$timeOfCmt?>  </p>
	       </div>

	        <p style="color:black;padding:10px;margin:5px;"><?php echo nl2br(strip_tags(htmlentities($commentdata)))?></p>

          <div class="col-sm-12" style="margin:0;padding:auto;background-color:#F5F5F5;">
 	         <p id="Replay" class="btn btn-primary btn-xs">Total Replays (<?=$ReplayCount?>)</p>
           <p pid='<?=$commentID?>' id='ReplayButt-<?=$commentID?>' class="btn btn-primary btn-xs ReplayButt">Replay</p>

          <div id='ReplayViewer-<?=$commentID?>' class="col-sm-12 ReplayViewer" style="margin:0;padding:auto;">  <!-- replay cmt -->

          </div>
 	       </div>
	      </div>
<?php	    }
    } else {
      //$commentID = "0";
      $query="SELECT * FROM cmt_all";
      $sql=mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($sql)) {
        $commentID = $row['id'];
      //  echo "$commentID";
      }
      ?>

    <script type="text/javascript">
     $("#emptyCmt").html('<h2>Put A Comment.. Ask a Question.</h2>');
    </script>
  <?php  }
  ?>
   </div>
  </div>
</div>


</body>


<script type="text/javascript">

$(document).on('click', ".ReplayButt", function () {
  var ReplayButt = $(this).attr("pid");
  var commentID= '<?php echo $commentID; ?>';
    //$("#ReplayViewer-"+ReplayButt).html('<div class="form-group" style="overflow:hidden;"><label for="comment">Comment:</label><textarea id="ReplayCmt-'+ReplayButt+'" class="form-control ReplayCmt" rows="5" style="max-width:100%;"></textarea><div class="col-sm-12" style="margin:2px;" id="plsTypecmt-'+ReplayButt+'"></div><button pid="'+ReplayButt+'" id="ReplayCmtButt-'+ReplayButt+'" type="submit" class="btn btn-warning ReplayCmtButt">comment</button></div>');
  $.ajax({
      type: 'POST',
      url: 'replayAllDataLoder.php',
      data: {
              commentID:ReplayButt
            },
      success: function(feedback){
        $("#ReplayViewer-"+ReplayButt).html(feedback);

      }
    });


});

$(document).on('click', ".ReplayCmtButt", function () {
  var idd = $(this).attr("pid");
  var ReplayCmtData =$("#ReplayCmt-"+idd).val();
  var replayUserId= '<?php echo $usr_id; ?>';
  if (ReplayCmtData.length >0) {

    $.ajax({
        type: 'POST',
        url: 'replycmt.php',
        data: {
                ReplayCmtData:ReplayCmtData,
                idd:idd,
                replayUserId:replayUserId
              },
        success: function(feedback){
          $("#plsTypecmt-"+idd).html('');
          $("#ReplayCmt-"+idd).val('');
          $("#emptyCmt-"+idd).html('');
          //$("#NoReplay-"+idd).html('');
          //$('textarea').filter('[id*=ReplayCmtData]').val('');

          $("#ReplayViewer-"+idd).append(feedback);

        }
      });
    }else{
        $("#plsTypecmt-"+idd).html('<STRONG style="color:red;">Please type any comment.</STRONG>');
    }
    //$("#ReplayViewer-"+ReplayButt).html('<div class="form-group" style="overflow:hidden;"><label for="comment">Comment:</label><textarea class="form-control" rows="5" id="ReplayData" style="max-width:100%;"></textarea><div class="col-sm-12" style="margin:2px;" id="plsTypecmt"></div><button id="Rsubmit" type="submit" class="btn btn-warning">comment</button></div>');
});


$(document).on('click', "#Csubmit", function () {

   var CommentData = $("#CommentData").val();
   var post_id = '<?php echo $post_id; ?>';
   var usr_id = '<?php echo $usr_id; ?>';
   var commentID= '<?php echo $commentID; ?>';
if (CommentData.length >0) {

 $.ajax({
     type: 'POST',
     url: 'cmtdata.php',
     data: {
             CommentData:CommentData,
             post_id:post_id,
             usr_id:usr_id,
             commentID:commentID
           },
     success: function(feedback){
       $("#plsTypecmt").html('');
       $("#emptyCmt").html('');
       // $('textarea').filter('[id*=CommentData]').val('');
       $("#CommentData").val('');
       $("#NewCmt").append(feedback);

     }
   });
 }else{
     $("#plsTypecmt").html('<STRONG style="color:red;">Please type any comment.</STRONG>');
 }
});

</script>
</html>
