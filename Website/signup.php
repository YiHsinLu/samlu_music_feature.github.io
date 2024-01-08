<?php
    include_once 'head.php';
?>
<title>Sign Up</title>
<br>
<center>
<section>
    <div class="signup">
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Fullname..." size="30">
            <p></p>
            <input type="text" name="email" placeholder="example@gmail.com" size="30">
            <p></p>
            <input type="text" name="uid" placeholder="Username..." size="30">
            <p></p>
            <input type="password" id="pwd-visible" name="pwd" placeholder="Password" size="30">
            <p style="color:#FFD9EB;"><input type="checkbox" onclick="showPwds()"><font size="3">  SHOW PASSWORDS</font></p>
            <script>
                function showPwds(){
                    var x = document.getElementById("pwd-visible");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <p></p>
            <input type="password" id="pwdrep-visible" name="pwdrepeat" placeholder="Repeat Password" size="30">
            <p style="color:#FFD9EB;"><input type="checkbox" onclick="showPwdrep()"><font size="3">  SHOW PASSWORDS</font></p>
            <script>
                function showPwdrep(){
                    var x = document.getElementById("pwdrep-visible");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <p></p>
            <button type="submit" name="submit"><b>SIGN UP</b></button>
        </form>
    </div>
</section>
<br>

<?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "invaliduid"){
            echo "<p>Choose a proper username!</p>";
        }
        else if($_GET["error"] == "invalidemail"){
            echo "<p>Choose a proper email!</p>";
        }
        else if($_GET["error"] == "passwordnotmatch"){
            echo "<p>Passwords doesn't match!</p>";
        }
        else if($_GET["error"] == "usernametaken"){
            echo "<p>Username already taken!</p>";
        }
        else if($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong, please try again!</p>";
        }else if($_GET["error"] == "none"){
            echo "<p>You have signed up!</p>";
        }
    }
?>

</center>

<?php
    include_once 'footer.php';
?>