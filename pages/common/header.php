<!DOCTYPE php>
<!-- Filename: header.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<script>$(function() {setActiveNavLink();});</script>
<nav id="header" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-brand">Trade Haven</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav nav-fill w-100">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/events.php">Events</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="pages/tools/tools.php" id="navbarToolsDropdownLink" data-toggle="dropdown">Game Tools</a>
                <div class="dropdown-menu" aria-labelledby="navbarToolsDropdownLink">
                    <a class="dropdown-item" href="pages/tools/dice_roller.php">Dice Roller</a>
                    <a class="dropdown-item" href="pages/tools/life_counter.php">Life Counter</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/info/faq.php">FAQ & How-To</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/business/contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/info/about.php">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="pages/inventory/browse.php" id="navbarInventoryDropdownLink" data-toggle="dropdown">Inventory</a>
                <div class="dropdown-menu" aria-labelledby="navbarInventoryDropdownLink">
                    <a class="dropdown-item" href="pages/inventory/browse.php">Buy</a>
                    <a class="dropdown-item" href="pages/inventory/sell.php">Sell</a>
                    <a class="dropdown-item" href="pages/inventory/trade.php">Trade</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages/inventory/purchase_history.php">Purchase History</a>
                    <a class="dropdown-item" href="pages/inventory/sell_history.php">Sell History</a>
                    <a class="dropdown-item" href="pages/inventory/trade_history.php">Trade History</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/user/cart.php">My Cart</a>
            </li>
            <li class="nav-item">
            <?php 
                session_start();
                $loggedIn = isset($_SESSION['customer_id']);
                echo '<button type="button" class="btn btn-primary';
                if ($loggedIn) {
                    echo ' log-out">Logout</button>';
                }
                else {
                    echo ' log-in" data-toggle="modal" data-target="#login-modal">Login</button>';
                }
            ?>
            </li>
        </ul>
    </div>
</nav>
