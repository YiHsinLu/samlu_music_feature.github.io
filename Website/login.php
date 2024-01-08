<?php
    include_once 'head.php';
?>
<title>Login</title>
<br>
<center>
<section>
    <div class="signup">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="name" placeholder="Name/Email" size="30">
            <p></p>
            <input type="password" id="pass" name="pwd"  placeholder="Password" size="30" >
            <p></p>
            <p style="color:#FFD9EB;"><input type="checkbox" onclick="showPwd()"><font size="3">  SHOW PASSWORDS</font></p>
            <script>
                function showPwd(){
                    var x = document.getElementById("pass");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <p></p>
            <button type="submit" name="submit"><b>LOGIN</b></button>
        </form>
    </div>
</section>
<br>

<?php
    if(isset($_GET["error"])){
        if ($_GET["error"] == "wronglogin"){
            echo "<p>Wrong username or passwords!</p>";
        }
    }
?>
</center>

<?php
    include_once 'footer.php';
?>