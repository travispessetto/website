<!DOCTYPE html>
<html>
<head>
	<title>Travis Pessetto</title>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Home"><img src="images/logo_xs.png" alt="Travis Pessetto" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
			$directory = "pages/";
			$dirIt = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
			while($dirIt->valid())
			{
				if(!$dirIt->isDot())
				{
					$currentPage = "Home";
					if(isset($_GET['page']))
					{
						$currentPage = $_GET['page'];
					}
					$name = explode('.',$dirIt->getSubPathName())[0];
					$isActive = strtolower($currentPage) == strtolower($name);
					$active = "";
					if($isActive)
					{
						$active = "active";
					}
					echo '<li class="'.$active.'"><a href="'.$name.'">'.str_replace("_"," ",$name).'</a></li>'.PHP_EOL;
				}
				$dirIt->next();
			}
		?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle fa-3x-nav-middle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://pessetto.com/billing"><i class="fa fa-usd"></i>&nbsp;Billing</a></li>
            <li><a href="http://192.241.195.71:2222/"><i class="fa fa-arrow-right"></i>&nbsp;DirectAdmin</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php if(file_exists('pages/'.$currentPage.".php"))
{
	include_once('pages/'.$currentPage.".php");
}
else
{
	?>
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>404! File Not found</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<p>It appears the file you requested, <?php echo $currentPage; ?>, does not exist.  That's okay though feel free to browse other areas of the site.</p>
		</div>
	</div>
	<?php
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css" />
<link rel="stylesheet" href="css/site.css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>