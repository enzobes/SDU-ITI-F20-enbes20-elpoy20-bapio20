<?php

session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}

include('header.php');


require('config.php');
$stmt="SELECT * FROM user INNER JOIN images ON user.id_user = images.user_id ORDER BY created DESC";
$res = $db->query($stmt);
$output="";
while ($row = $res->fetch()){
			$output = $output . "
			<div class='card'>

				<div class='card_title title-white'>
					<p>". $row['header'] ."</p>
				</div>
				<div class='card_image'>
				<img src=".$row['image'] ." >
				</div>
        <div class='message'><div>" . $row['description'] ."</div>
          <div class='messageinfo'>
            <div id='first'><i>Upload by : ".$row['username']."</i></div>

            <div id='second'>".$row['created']."</div>
          </div>
        </div>
		</div>
			";
}
$res->closeCursor(); // Finish processing the request

?>


<!-- NEWS SECTION -->
<div class="container_feed">


  <div class="title">IMAGES FEED</div>

    <div class="cards-list">

    <?php echo($output);?>
    <!--  var_dump($_SESSION['username']); -->
    </div>
</div>

<?php include('footer.php') ?>
