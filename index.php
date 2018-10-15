<?php
$conn = new mysqli('localhost', 'root', '', 'quean');
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT title, description, links FROM questions";
$questions = $conn->query($sql);
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
							<div class="dropdown-item disabled">Akhilesh Negi</div>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="profile.php">My Profile</a>
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
		<div class="d-flex justify-content-between mb-3 flex-column flex-md-row">
			<h3 class="font-weight-light mb-0">Questions</h3>
			<div class="d-flex flex-column flex-md-row">
				<form class="form-inline my-2 my-lg-0 mr-md-3">
					<div class="input-group">
						<input class="form-control" type="search" placeholder="Search question" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-info my-0" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				<a class="btn btn-outline-primary" href="new-question.php">Ask question</a>
			</div>
		</div>
<?php
if ($questions->num_rows > 0) {
	while($question = $questions->fetch_assoc()) {
		echo '<div class="card mb-4 shadow-sm">';
		echo '<div class="card-body">';
		echo '<h4 class="card-title mb-1">';
		echo '<a class="text-body" href="answers.php">'.$question["title"].'</a>';
		echo '</h4>';
		echo '<p class="text-secondary mb-0">';
		echo $question["description"];
		echo '</p>';
		echo '<div class="mb-2">';
		echo '<a href="#" class="badge badge-info">'.$question["links"].'</a>';
		echo '</div>';
		echo '<p>';
		echo '<a href="#" class="card-link"><small>Mohit Gusain</small></a>';
		echo '<small class="text-secondary"> asked on</small>';
		echo '<small class="text-secondary"> Sep 25, 2018</small>';
		echo '</p>';
		echo '<div class="d-flex text-secondary">';
		echo '<div class="mr-3">';
		echo '<i class="far fa-thumbs-up"></i>';
		echo '<small>22</small>';
		echo '</div>';
		echo '<div class="mr-3">';
		echo '<i class="far fa-thumbs-down"></i>';
		echo '<small>8</small>';
		echo '</div>';
		echo '<div class="mr-3">';
		echo '<i class="far fa-comments"></i>';
		echo '<a href="#" class="text-secondary"><small>10 answers</small></a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}
else {
	echo "<h4>No questions are asked</h4>";
}
$conn->close();
?>
	</div>
	<footer class="bg-light py-3 text-center mt-1">
		<span class="text-primary"><i class="fas fa-code"></i> Developed at CodeTrek Tehri 2018</span>
	</footer>
</body>
</html>
