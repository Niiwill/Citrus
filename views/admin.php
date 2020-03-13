<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();

if ( isset( $_SESSION['user'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
} else {
    // Redirect them to the login page
    header("Location: /login");
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Citrus systems</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <a href="/" class="navbar-brand d-flex align-items-center">
          <strong>Citrus systems</strong>
        </a>
        <a href="/logout" class="navbar-brand d-flex align-items-center">
          Logout
        </a>
      </div>
    </div>
  </header>

  <main role="main">
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
          <h6 class="border-bottom border-gray pb-2 mb-0">All Comments</h6>
          <br>

          <?php foreach ($comments as $item){ ?>
            <div class="media text-muted pt-3  border-bottom border-gray">
              <p class="media-body pb-3 mb-0 small lh-125">
                <strong class="d-block text-gray-dark">@<?= $item['name']; ?></strong>
                <?= $item['text']; ?>
              </p>
              <?php if (!$item['published']){ ?>
              	<form method="post" action="admin/update-comment">
     				<button class="btn btn-success" type="submit" name="published" value="1">Approve</button>
      				<input type="hidden" name="comment_id" value="<?= $item['id'];?>"/>
    			</form>
          	  <?php }else{ ?>
          	  	<form method="post" action="admin/update-comment">
     				<button class="btn btn-danger" type="submit" name="published" value="0">Deny</button>
      				<input type="hidden" name="comment_id" value="<?= $item['id'];?>"/>
    			</form>
          	  <?php } ?>
              
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
