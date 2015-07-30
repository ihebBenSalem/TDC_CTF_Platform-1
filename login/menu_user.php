<?php
require "../bootstrap.php";

include "login/lock.php";

?>





<div id="myhome"></div>
<!--Navigation bar !-->
<div class="navbar navbar-default navbar-fixed-top" id="topmenu">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand" href="/ctf2" id="home">CTF Pw0</a>
<button class="navbar-toggle" data-target="#navbar-main" data-toggle="collapse" type="button">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar-main" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li ><a href="#myhome" id="home">Home</a></li>
<li><a href="/ctf2/teams.php" id="home">Team <span class="badge text-success"><?php echo $nb;   ?></span></a></li>
<li><a href="/ctf2/score.php" id="home">Score</a></li>
<li><a href="#author" id="home">Author</a></li>
<li><a href="#rules" id="home">Rules</a></li>
</ul>
<form class="navbar-form navbar-right" role="search" id="contact-form" method="POST">
<div class="form-group">
<button type="button" class="btn btn-info"> <?php echo $login_session  ;?> <span class="glyphicon glyphicon-user"></button>

<button type="button" class="btn btn-danger" onclick="loc('http://127.0.0.1/ctf/login/logout.php');">SignOut</button>


</div>

</form>
</div>
</div>
</div>
<!-- this platform developped by iheb ben salem@IbsSoft !-->
