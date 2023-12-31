
<?php
include('.././classes/DB.php');
include('.././classes/Login.php');

if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        die('Not logged in');
}
	$username="";
	$username=DB::query('SELECT username FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['username'];
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Network</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
	<link rel="stylesheet" href="style.css" media="all">
</head>

<body>
    <header class="hidden-sm hidden-md hidden-lg">
        <div class="searchbox">
            
                <h1 class="text-left">College Network</h1>
                <form action="search.php" method="get" enctype="multipart/form-data">
						<div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control" type="text" name="sbox" value="">
                        </div>
				</form>
			
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">MENU <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li role="presentation"><a href="../profile.php?username=<?php echo $username;?>">My Profile</a></li>
                        <li class="divider" role="presentation"></li>
                        <li role="presentation"><a href="../index1.php">Timeline </a></li>
                        <li role="presentation"><a href="../index.html">Home </a></li>
                        <li role="presentation"><a href="../notify.php">Notifications </a></li>
                        <li role="presentation"><a href="../my-account.php">My Account</a></li>
						<li role="presentation"><a href="../messages.php">Messages</a></li>
                        <li role="presentation"><a href="../logout.php">Logout </a></li>
                    </ul>
                </div>
            </form>
        </div>
        <hr>
    </header>
    <div>
        <nav class="navbar navbar-default hidden-xs navigation-clean">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="../index1.php"><i class="icon ion-ios-people"></i></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                   
                        
						<form action="search.php" method="get" class="navbar-form navbar-left" enctype="multipart/form-data">
						<div class="searchbox"><i class="glyphicon glyphicon-search"></i>
                            <input class="form-control" type="text" name="sbox" value="">
                        </div>
						
						</form>						
                    
                    <ul class="nav navbar-nav hidden-md hidden-lg navbar-right">
                        <li role="presentation"><a href="../index1.php">Timeline</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="../profile.php?username=<?php echo $username;?>">My Profile</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="../index1.php">Timeline </a></li>
                                <li role="presentation"><a href="../index.html">Home </a></li>
                                <li role="presentation"><a href="../notify.php">Notifications </a></li>
                                <li role="presentation"><a href="../my-account.php">My Account</a></li>
								<li role="presentation"><a href="../messages.php">Messages</a></li>
                                <li role="presentation"><a href="../logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right">
                        <li role="presentation"><a href="contribute.php">Contribute</a></li>
                        <li role="presentation"><a href="/cms/">Articles</a></li>
                        <li role="presentation"><a href="branches.html">Branches</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li role="presentation"><a href="../profile.php?username=<?php echo $username;?>">My Profile</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="../index1.php">Timeline </a></li>
                                <li role="presentation"><a href="../index.html">Home </a></li>
                                <li role="presentation"><a href="../notify.php">Notifications </a></li>
                                <li role="presentation"><a href="../my-account.php">My Account</a></li>
								<li role="presentation"><a href="../messages.php">Messages</a></li>
                                <li role="presentation"><a href="../logout.php">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

<div >
<div class="container">
<div class="col-md-9">
<div class="timelineposts">
<li class="list-group-item">
<strong><h2>Your Search Result</h2></strong>
</li>
<?php 
include("includes/connect.php");

if(isset($_GET['sbox'])){

   $search_id = $_GET['sbox'];
	
	$search_query = "select * from posts where post_keywords like '%$search_id%'";
	
	$run_query = mysqli_query($con,$search_query);
	
	while ($search_row=mysqli_fetch_array($run_query)){
	
	echo "<li class='list-group-item'>";
	echo "<blockquote>";
	$post_id = $search_row['post_id'];
	$post_title = $search_row['post_title'];
	$post_image = $search_row['post_image'];
	
?>


<center>
<h2>
<a href="pages.php?id=<?php echo $post_id; ?>">
<?php echo $post_title; ?>
</a>
</h2>

<img src="images/<?php echo $post_image; ?>" width="400" height="250">
</center>
<?php 
	echo "</blockquote>";
	echo "</li>";
	} }?>


</div>
</div>
</div>
</div>


   
    <div class="footer-dark navbar-fixed-bottom">
        <footer>
            <div class="container">
                <p class="copyright">College Network© 2017</p>
            </div>
        </footer>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
 
<!-- Sidebar-------------------------------------------------------------------------------------->	
 <link href="../chat/style.css" rel="stylesheet">
    <script src="../chat/script.js"></script>
 <div class="container"> 
  <div class="chat_box">
	<div class="chat_head"> Recent Posts</div>
	<div class="chat_body"style="overflow-y:auto;max-height:450px;"> 	
		

		

<div>
	<?php 
	include("includes/connect.php");

	$query = "select * from posts order by 1 DESC LIMIT 0,10";

	$run = mysqli_query($con,$query); 
	
	while ($row=mysqli_fetch_array($run)){
	
	$post_id = $row['post_id'];
	$title = $row['post_title'];
	$image = $row['post_image'];

	?>
	<center>
	
	<a href="pages.php?id=<?php echo $post_id; ?>">
	<h3><?php echo $title; ?></h3></a>
	
	<a href="pages.php?id=<?php echo $post_id; ?>">
	<img src='images/<?php echo $image; ?>' width='90%' height=auto></a>
	
	</center>
	
	<?php 
	
	} ?>

	</div>


</div>
</div>
 </div> 
<!-- Sidebar------------------------------ended-------------------------------------------------------->	
 
	

	
	
</body>

