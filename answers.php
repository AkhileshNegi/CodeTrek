<?php 
$title =  $_GET['question_title'];
$conn = new mysqli('localhost', 'root', '', 'quean');
$sql_question = "SELECT * FROM questions WHERE title = '$title' ";
$questions = $conn->query($sql_question);
while($question = $questions->fetch_assoc()) {
	$title = $question["title"];
	$description = $question["description"];
	$tags = $question["links"];
	$qid = $question["qid"];
	$q_date = $question["q_date"];
	$author = $question["author"];	
}
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
}
$sql_answers = "SELECT * FROM answers WHERE question_id = '$qid'";
$answers = $conn->query($sql_answers);
$answers_count=mysqli_num_rows($answers);
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
  <link rel="stylesheet" href="css/style.css">
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
			<a class="navbar-brand" href="#">CodeTrek Forum</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			 aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="index.html" class="nav-link">Questions</a>
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
							<a class="dropdown-item" href="profile.html">My Profile</a>
							<a class="dropdown-item" href="#">Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Sign out</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container mt-5">
		<div class="mb-5">
			<h3>
<?php 
	echo $title;
?>
			</h3>
			<p class="text-secondary lead">
<?php 
	echo $description;
?>
			</p>
			<div class="mb-3">
<?php
if ($tags !='') {
	$links = explode(',', $tags);
	for ($i=0; $i < sizeof($links); $i++) { 
		echo ' <a href="link_search.php?tag='. $links["$i"] .'" class="badge badge-info"> ' . $links["$i"] . '</a>';
	}
}
?>
			</div>
			<p>
				<a href="#" class="card-link">
					<span>
						<?php echo $author;?>
					</span>
				</a>
				<span class="text-secondary">asked on</span>
				<span class="text-secondary">
<?php	
$date = date('F d, Y', strtotime($q_date));
echo $date;
?>
				</span>
			</p>
			<div class="d-flex text-secondary">
				<div class="mr-4 like c-pointer">
					<i class="fas fa-thumbs-up fa-lg" id="like"></i>
					<span id="like_count">14</span>
				</div>
				<div class="mr-4 dislike c-pointer">
					<i class="fas fa-thumbs-down fa-lg" id="dislike"></i>
					<span id="dislike_count">1</span>
				</div>
				<div class="mr-4">
					<i class="fas fa-comments fa-lg"></i>
					<span>
					<?php echo $answers_count;?> 
					answers</span>
				</div>
			</div>
		</div>
<?php
while($answer = $answers->fetch_assoc()) { 
	$text = $answer["answer_text"];
	$date = $answer["created_at"];
	$date = date('F d, Y', strtotime($date));
	$answer_author = $answer["author"];
?>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<p>
					<a href="#" class="card-link">
						<small>
						<?php echo $answer_author;?>
						</small>
					</a>
					<small class="text-secondary">answered on</small>
					<small class="text-secondary">
<?php echo $date;?>
					</small>
					<!-- <span class="badge badge-success correct_tag"><i class="fa fa-check" aria-hidden="true"></i> Correct Answer</span> -->
				</p>
				<p>
<?php 
echo $text;
?>
				</p>
			</div>
		</div>
<?php 
	}
?>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<h4>Your Answer</h4>
					<form action="register_answer.php" method="POST">
					<textarea name="answer" id="answer" rows="10" class="form-control" required>
					</textarea>
<?php
echo '<input type="hidden" name="qid" value="'.$qid.'">';
?>
					<button type="submit" class="btn btn-primary mt-3">Post your answer</button>
				</form>
			</div>
		</div>
	</div>
	<footer class="bg-light py-3 text-center mt-5">
		<span class="text-primary"><i class="fas fa-code"></i> Developed at CodeTrek Tehri 2018</span>
	</footer>
	<script src="js/main.js" type="text/javascript"></script>
</body>
</html>