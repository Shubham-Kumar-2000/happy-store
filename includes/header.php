<div class="navbar navbar-inverse navbar-fixed-top co ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                   
            </button>
            
<a  href="index.php"><img src="img/ii.jpg" alt="" class="icon"><span class="desk navbar-brand">Happy Store</span></a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['email'])) {
                    ?>
                    <li><a href = "cart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                    <li><a href = "info.php"><span class = "glyphicon glyphicon-user"></span> Info</a></li>
                    <li><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>
                    ?>
                    <?php
                } else {
                    ?>
                    <li><a href="signup.php?m1=&m2="><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login.php?error="><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</div>
<style>
    @media(max-width: 468px){
    .desk {
        display: none;
        visibility: hidden;
    }
}
</style>