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
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">City
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addcity.php">Add City</a></li>
          <li><a href="city.php">List City</a></li>
          
        </ul>
      </li>     

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Caste
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="addcaste.php">Add Caste</a></li>
          <li><a href="caste.php">List Caste</a></li>
          
        </ul>
      </li>
      <li><a href="users.php">Users</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"> </span> Profile
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="updateprofile.php">Update Profile</a></li>
          <li><a href="changepassword.php">Change password</a></li>
          
        </ul>
      </li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
  </div>
</nav>