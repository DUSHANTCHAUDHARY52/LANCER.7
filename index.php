<?php
    include_once("./page_includes/navbar.php");
    include_once("./ristrict_guest.php");
    require_once("./connect.php");

    include_once("./page_includes/hero_section.php");
// <h1>Hello echo $username; </h1>
// <p>Here is the list of products that are avaliable for bidding.</p>
include_once("./page_includes/product_list.php");
include_once("./page_includes/footer.php");
?>