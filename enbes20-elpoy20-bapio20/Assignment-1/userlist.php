<?php
session_start();
if(!isset($_SESSION['id'])){
   header("Location:index.php");
}
include("config.php");

  // get the q parameter from URL
  if(isset($_GET['q'])) {
    $q_check = filter_var($_GET['q'], FILTER_SANITIZE_NUMBER_INT);
    $q = htmlspecialchars($q_check);
  	$q = $_GET['q'];

  }else {
	$q = "";
  }
$output="";
  if ($q === "") {

    $stmt = "SELECT id_user, username, email FROM user";
    $res = $db->query($stmt);

    while ($row = $res->fetch()){
    		$output = $output . "
    		<div class='user_card'>
          <ul class=''>
            <li>
      				<div>Username : ". $row['username'] ."</div>
      			 	<div>Email : ". $row['email'] ."</div>
            </li>
    			</ul>
        </div>
    		";
      }
  } else {
    $stmt = "SELECT id_user, username, email FROM user WHERE username LIKE '$q%'";
    $res = $db->query($stmt);

    while ($row = $res->fetch()){
    		$output = $output . "
    		<div class='user_card'>
          <ul class=''>
            <li>
              <div>Username : ". $row['username'] ."</div>
              <div>Email : ". $row['email'] ."</div>
            </li>
    			</ul>
        </div>
    		";
      }
	  echo($output);die;
  }
  $res->closeCursor(); // End the request

  /* close connection */

include('header.php');
ini_set('display_errors','on');
error_reporting(E_ALL);

?>

<div class="container_userlist">

  <div class="title">CONTACT LIST</div>
  <!-- AJAX Call to refresh the user list (showUser)  -->
    <form class="search_field" method="get">
      Search a user by Username: <br> <br> <input type="text" name = 'q' onkeyup="showUser(this.value)">
    </form>
    <br> <br> <hr> <br>
      <div class="user_list" id="txtHint">
  		<?php echo($output); ?>
    </div>
  </div>

</div>

<?php include('footer.php') ?>
