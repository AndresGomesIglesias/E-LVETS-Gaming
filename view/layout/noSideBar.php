
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <?php require ROOT.DS.'view'.DS.'includes'.DS.'head.php';?>
      <title>Document</title>
  </head>

  <?php require ROOT.DS.'view'.DS.'includes'.DS.'header.php';?>

  <body style='margin-top: 40px;'>
    <div role="main" class="container" style="margin-top: 100px;">
      <div class="row">
      <?php echo $this->Session->flash() ?>
        <?php echo $content_for_layout ?>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="offcanvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>

</html>



