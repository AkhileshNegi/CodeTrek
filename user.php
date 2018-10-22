<?php
$name = $_GET["name"];
session_start();
if (!empty($_SESSION["name"])) {
	$con = new mysqli('localhost', 'root', '', 'quean');
	if ($con->connect_error) {
	    die("Connection failed in login: " . $conn->connect_error);
	} 
	$sql="SELECT * FROM user WHERE first_name='$name'";
	$result = $con->query($sql);
	$user = $result->fetch_assoc();
	$user_name = $user['first_name']." ".$user['last_name'];
	$sql_que = "SELECT * FROM questions WHERE author = '$user_name'";
	$questions = $con->query($sql_que);
	$questions_count=mysqli_num_rows($questions);
	$sql_ans = "SELECT * FROM answers WHERE author = '$user_name'";
	$answers = $con->query($sql_ans);
	$answer_count=mysqli_num_rows($answers);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CodeTrek Forum</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
		<?php
	if (empty($user_name)) {?>
	<div class="container d-flex mt-3 justify-content-center">
			<div class="w-50 alert text-center border-success" role="alert">
				<h4 class="alert-heading text-center">
					<?php
					echo "You're not Logged in";
					?>
				</h4>
				<button class="btn btn-outline-success bg-light">
					<a href="login.php" class="text-dark">Login now</a>
				</button>
			</div>
		</div>
	</div>
</body>
</html>
	<?php
	die();
	}
	?>
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.php">CodeTrek Forum</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			 aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="index.php" class="nav-link">Questions</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						 aria-expanded="false">
							<i class="fa fa-cog"></i>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<div class="dropdown-item disabled"><?php echo $user_name;?></div>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="profile.php">My Profile</a>
							<a class="dropdown-item" href="#">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="sign_out.php">Sign out</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-5">
		<div class="row">
			<div class="m-1 col-sm-auto" >			
				<?php 
				echo '<img src="images/'.$user["first_name"]."-".$user["last_name"].'.jpg" class="rounded-circle" alt="'.$user_name.'" width="200" height="200">';
				?>
			</div>
			<div class="m-1 col-sm-auto">
				<h3><?php echo $user['first_name']." ".$user['last_name'];?></h3>
				<i class="fa fa-building">
					<small class="m-1 text-secondary"><?php echo $user['position'];?></small>
				</i><br>
				<i class="fas fa-map-marker-alt">
					<small class="m-1 text-secondary"> <?php echo $user['location'];?></small>
				</i><br><br>
				<h6>
					<small>
						<?php echo $questions_count;?> Questions Asked
					</small>
				</h6>
				<h6>
					<small>
						<?php echo $answer_count;?> Questions Answered
					</small><br>
				</h6>
				<a href="#"><i class="text-secondary fab fa-github-square fa-2x"> </i></a>
				<a href="#"><i class="text-secondary fab fa-linkedin fa-2x"> </i></a>
				<a href="#"><i class="text-secondary fab fa-facebook fa-2x"> </i></a>
				<a href="#"><i class="text-secondary fas fa-envelope fa-2x"> </i></a>
			</div>
		</div><br>
		<h3><small>Your Questions</small></h3>
		<?php
if ($questions->num_rows > 0) {
	while($question = $questions->fetch_assoc()) {?>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<h4 class="card-title mb-1">
					<?php echo'<a class="text-body" href="answers.php?question_title='. $question["title"] .'">'?>
						<?php echo $question["title"];?>
					</a>
				</h4>
				<p class="text-secondary mb-0">
				<?php echo $question["description"];?>
				</p>
				<div class="mb-2">
					<?php
					if ($question["links"] !='') {
						$links = explode(',', $question["links"]);
						for ($i=0; $i < sizeof($links); $i++) { 
							echo ' <a href="link_search.php?tag='. $links["$i"] .'" class="badge badge-info"> ' . $links["$i"] . '</a>';
						}
					}
					?>
					</div>
					<a href="#" class="card-link"><small><?php echo  $question["author"];?></small></a>
					<small class="text-secondary">asked on</small>
					<small class="text-secondary">
					<?php 
					$date = $question["q_date"];
					$date = date('F d, Y', strtotime($date));
					echo $date;
					?>
					</small>
				</p>
				<div class="d-flex text-secondary">
					<div class="mr-3">
						<i class="far fa-thumbs-up"></i>
						<small><?php echo $question["likes"];?></small>
					</div>
					<div class="mr-3">
						<i class="far fa-thumbs-down"></i>
						<small><?php echo $question["dislikes"];?></small>
					</div>
					<div class="mr-3">
						<i class="far fa-comments"></i>
						<a href="answers.html" class="text-secondary"><small><?php echo $question["comments"];?> answers</small></a>
					</div>
				</div>
			</div>
		</div>
	<?php }
}
else {
	echo "<h4>No questions are asked</h4>";
}
$con->close();
?>
	</div>
	</div>
</body>
</html>