<?php
session_start();
if (!empty($_SESSION["name"])) {
	$user_name = $_SESSION["name"];
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
							<a class="dropdown-item" href="#">My Profile</a>
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
		<div class="d-flex justify-content-between mb-3 flex-column flex-md-row">
			<h3 class="font-weight-light mb-0">Ask question</h3>
		</div>
		<div class="card mb-4 shadow-sm">
			<div class="card-body">
				<form action="new-question-submission.php" method="POST">
					<div class="form-group">
						<label for="question">Title<sup class="text-danger">*</sup></label>
						<input type="text" class="form-control" id="question" name="title" placeholder="Enter a short and proper title for your question" required>
					</div>
					<div class="form-group">
						<label for="description">Description<sup class="text-danger">*</sup></label>
						<textarea name="description" id="description" name="description" rows="10" class="form-control" placeholder="Enter a detailed description of what problem you're facing and steps to replicate" required></textarea>
					</div>
					<div class="form-group">
						<label for="tags">Add tags</label>
						<input type="text" class="form-control" placeholder="tag1, tag2, tag3" name="tag">
						<small class="text-secondary">Tags will help others to find your question faster. Add comma separated tags. For ex: <span class="font-weight-light font-italic">codetrek, bootstrap, frontend</span></small>
					</div>
					<button type="submit" class="btn btn-primary mt-3">Post your question</button>
				</form>
			</div>
		</div>
	</div>
	<footer class="bg-light py-3 text-center mt-5">
		<span class="text-primary"><i class="fas fa-code"></i> Developed at CodeTrek Tehri 2018</span>
	</footer>
</body>
</html>
