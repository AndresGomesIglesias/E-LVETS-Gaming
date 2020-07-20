<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>adminitration</title>
 
</head>

<header>
  <?php include(Router::root('view/includes/navbar/admin_header.php')); ?>
  <link href="  <?php echo Router::webroot('css/admin/style.css'); ?>" rel="stylesheet">
  <link href="<?=Router::webroot('assets/css/commun_custom.css');?>" rel="stylesheet">
  <link href="<?php echo Router::webroot('css/admin/admin_custom.css'); ?>" rel="stylesheet">

</header>


<body style="padding-left: 220px;">

  <div id="main-content" class=" blockdashboard">
    <div class="row">

      <?php echo $this->Session->flash() ?>
      <?php echo $content_for_layout ?>
    
      <?php include(Router::root('view/includes/admin_script.php')); ?>

    </div>  
  </div>
  
</body>
</html>