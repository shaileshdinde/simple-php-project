<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><?=$projectName?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>               
      <li><a href="users.php">Users</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> </span> Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="updateprofile.php"><span class="glyphicon glyphicon-log-in"></span> Update Profile</a></li>
          <li><a href="updatedetails.php"><span class="glyphicon glyphicon-edit"></span> Update Details</a></li>
          <li><a href="updatephoto.php"><span class="glyphicon glyphicon-picture"></span> Change Photo</a></li>
          <li><a href="changepassword.php"><span class="glyphicon glyphicon-lock"></span> Change password</a></li>
          
        </ul>
      </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
    </div>
  </div>
</nav>