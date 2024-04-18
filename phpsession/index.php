<?php
if (empty($_SESSION)) {
    ?>
<script>
    let text;
    if (confirm("Press a button!") == true) {
        text = "You pressed OK!";
    } else {
        text = "You canceled!";
    }
</script>
    <?php
}
session_start();
//session_unset();
//session_destroy();
echo 'Session Id: ' . session_id() . '<br>';
var_dump($_SESSION);
foreach ($_COOKIE as $key => &$value) {
    unset($value);
    setcookie($key, '', time() - 3600);
}
//session_start();
if (!empty($_SESSION)) var_dump($_SESSION);

