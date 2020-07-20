
<!DOCTYPE html lang="fr">

<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
</head>
<?php include('../view/includes/admin_head.php'); ?>
<body>

  <!-- **********************************************************************************************************************************************************
        HEADER
        *********************************************************************************************************************************************************** -->
  <!--header start-->
  <header class="header black-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>

    <!--logo start-->
    <a href="index.html" class="logo"><b>E-LVETS <span>ADMIN</span></b></a>
    <!--logo end-->

    <div class="top-menu">
      <ul class="nav pull-right top-menu">
        <li><a class="logout" href="<?php echo Router::url('users/logout'); ?>">Logout</a></li>
        <li><a class="logout" href="<?php echo Router::url('posts/index'); ?>">SiteWeb</a></li>
      </ul>
    </div>

   


  </header>
  <!--header end-->
  <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
  <!--sidebar start-->
  <aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">

        <!-- Photo mini start -->
        <p class="centered"style=" margin-bottom: 10px;">
							 <a ><img src="<?php echo Router::webroot($this->Session->read('User')->avatarPath);?>" class="img-circle img-header" width="80"></a>
						</p>
        <h5 class="centered" >
        <?php echo $this->Session->read('User')->firstname; ?>
        </h5>
        <!-- Photo mini end -->
        <li class="mt">
          <a  href="dashboard.php">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sub-menu ">
          <a  href="javascript:;" <?php if($this->request->url =="/huadminha/users/index" || $this->request->url =="/huadminha/users/adduser") { ?> class="active" <?php } ?>>
            <i class="fa fa-user"></i>
            <span>Members</span>
          </a>
          <ul class="sub">
            <li <?php if($this->request->url =="/huadminha/users/index") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/users/index'); ?>">administrer</a></li>
            <li <?php if($this->request->url =="/huadminha/users/adduser") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/users/adduser'); ?>">addTeam</a></li>
          </ul>
        </li>
        <li class="sub-menu">
        <a  href="javascript:;" <?php if(  $this->request->url =="/huadminha/posts/add" ||  $this->request->url =="/huadminha/posts/index" ||  $this->request->url =="/huadminha/posts/corbeille" )  { ?> class="active" <?php } ?>>
            <i class="fa fa-file-text-o"></i>
            <span>Rédaction</span>
          </a>
          <ul class="sub" >
          <li <?php if($this->request->url =="/huadminha/posts/index") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/posts/index'); ?>">Articles</a></li>
          <li <?php if($this->request->url =="/huadminha/posts/Add") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/posts/add'); ?>">Add</a></li>
          <li <?php if($this->request->url =="/huadminha/posts/corbeille") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/posts/corbeille'); ?>">corbeille</a></li>
          </ul>
        </li>
        <li class="sub-menu">
        <a  href="javascript:;" <?php if( $this->request->url =="/huadminha/users/teams" || 
                                          $this->request->url =="/huadminha/clubs/index" || 
                                          $this->request->url =="/huadminha/games/index" ||
                                          $this->request->url =="/huadminha/results/index" )  { ?> class="active" <?php } ?>>
            <i class="fa fa-users"></i>
            <span>Competion</span>
          </a>
          <ul class="sub">
          <li <?php if($this->request->url =="/huadminha/users/teams") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/users/teams'); ?>">Teams</a> </li>
          <li <?php if($this->request->url =="/huadminha/games/index") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/games/index'); ?>">Games</a></li>
          <li <?php if($this->request->url =="/huadminha/clubs/index") { ?> class="active" <?php } ?>><a href="<?php echo Router::url('huadminha/clubs/index'); ?>">Clubs</a></li>
          <li <?php if($this->request->url =="/huadminha/results/index") { ?> class="active" <?php } ?> ><a class="sub-menu-li-a" href="<?= router::url('huadminha/results/index');?>">Resultats</a></li>
          </ul>
        </li>

        </li>
        <li>
          <a href="google_maps.html">
            <i class="fa fa-calendar-o"></i>
            <span>Calendrier</span>
          </a>
        </li>
        <li>
          <a href="google_maps.html">
            <i class="fa fa-map-marker"></i>
            <span>Google Maps </span>
          </a>
        </li>
      </ul>
      <!-- sidebar menu end-->
    

    </div>
    <div style="margin-left: 400px;">
    </div>
  
  </aside>






</body>



</html>