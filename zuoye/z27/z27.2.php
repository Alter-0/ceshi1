<?php
if (isset($_COOKIE["TestCookie"])) {
    echo
        "含有cookie为" . $_COOKIE["TestCookie"];
} else
    echo "无cookie<br />";
?>