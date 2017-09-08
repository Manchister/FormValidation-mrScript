<?php
session_start();
require_once 'header.php';
?>

    <body>
        
<div class="col-xs-8 col-xs-offset-2 panel-success text-center">

    <div class="panel-heading h2-responsive"><br/><br/>
        <?php echo 'New User Registered Successfully.'; ?><br/><br/><br/>
    </div>

</div>

    </body>
</html>

<?php
// clear any data saved in the session
session_destroy();

require_once 'footer.php';
?>