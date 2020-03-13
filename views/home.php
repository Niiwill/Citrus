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
        <a href="#" class="navbar-brand d-flex align-items-center">
          <strong>Citrus systems</strong>
        </a>
        <a href="/admin" class="navbar-brand d-flex align-items-center">
          Admin
        </a>
      </div>
    </div>
  </header>

  <main role="main">
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          <?php foreach ($data as $item){ ?>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img src="../images/<?= $item['image']; ?>" style="width: 100%;height: 265px;object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title"><?= $item['title']; ?></h5>
                  <p class="card-text"><?= $item['description']; ?></p>
                </div>

              </div>
            </div>

          <?php } ?>

        </div>

        <div class="my-3 p-3 bg-white rounded shadow-sm">
          <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>

          <?php foreach ($comments as $item){ ?>
            <div class="media text-muted pt-3">
              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">@<?= $item['name']; ?></strong>
                <?= $item['text']; ?>
              </p>
            </div>
          <?php } ?>
        </div>

        <?php if(isset($errors)){

          foreach ($errors as $message) {

            ?>

            <div class="alert alert-danger" role="alert">
              <?= $message ?>
            </div>

            <?php
          }
        } ?>


        <form class="my-3 p-3 bg-white rounded shadow-sm" action="/addComment" method="post">
          <h6 class="border-bottom border-gray pb-2 mb-0">Add comment</h6>
          <br>
          <div class="form-group">
            <input name="name" class="form-control" type="text" placeholder="Name">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tekst</label>
            <textarea class="form-control" name="text"rows="2"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </main>
</body>
</html>
