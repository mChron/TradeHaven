<!DOCTYPE html>
<!-- Filename: footer.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<nav id="footer" class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-dark">
    <div class="navbar-brand" id="cpy">Copyright &copy; <?php echo date("Y")?> Trade Haven</div>
    <ul class="navbar-nav ml-auto">
        <li id="date-time"><?php date_default_timezone_set("America/New_York") ?>
            <span id="date"><?php echo date("D M d Y") ?></span>
            <span id="time"><?php echo date("h:i:sa") ?></span>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li><a id="sitemap-link" class="nav-link" href="pages/sitemap.php">Sitemap</a></li>
    </ul>
</nav>