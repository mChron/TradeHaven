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
                    <a class="dropdown-item" href="pages/tools/dice_roller.php"><img class="menu-glyph" src="images/rolling-dices.png" width="30" height="30"/>Dice Roller</a>
                    <a class="dropdown-item" href="pages/tools/life_counter.php"><img class="menu-glyph" src="images/life-bar.png" width="30" height="30"/>Life Counter</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/info/faq.php">FAQ & How-To</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarBusinessDropdownLink" data-toggle="dropdown">Business</a>
                <div class="dropdown-menu" aria-labelledby="navbarBusinessDropdownLink">
                    <a class="dropdown-item" href="pages/info/about.php"><img class="menu-glyph" src="images/glyphicons/glyphicons-195-question-sign.png"/>About Us</a>
                    <a class="dropdown-item" href="pages/business/contact.php"><img class="menu-glyph" src="images/glyphicons/glyphicons-246-chat.png"/>Contact Us</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="pages/inventory/browse.php" id="navbarInventoryDropdownLink" data-toggle="dropdown">Inventory</a>
                <div class="dropdown-menu" aria-labelledby="navbarInventoryDropdownLink">
                    <a class="dropdown-item" href="pages/inventory/browse.php"><img class="menu-glyph" src="images/card-pick.png" width="30" height="30"/>Buy</a>
                    <?php
                        session_start();
                        $loggedIn = isset($_SESSION['customer_id']);
                        if ($loggedIn) {
                            echo '
                            <a class="dropdown-item" href="pages/inventory/sell.php"><img class="menu-glyph" src="images/two-coins.png" width="30" height="30"/>Sell</a>
                            <a class="dropdown-item" href="pages/inventory/trade.php"><img class="menu-glyph" src="images/card-exchange.png" width="30" height="30"/>Trade Status</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pages/inventory/purchase_history.php">Purchase History</a>
                            <a class="dropdown-item" href="pages/inventory/sell_history.php">Sell History</a>';
                        }
                    ?>
                </div>
            </li>
            <?php 
                if ($loggedIn) {
                    echo
                    '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdownLink" data-toggle="dropdown">User</a>
                        <div class="dropdown-menu" aria-labelledby="userDropdownLink">
                            <a class="dropdown-item" href="pages/user/cart.php"><img class="menu-glyph" src="images/open-chest.png" height="30" width="30"/>My Cart</a>
                            <a class="dropdown-item" href="pages/user/my_account.php"><img class="menu-glyph" src="images/glyphicons/glyphicons-138-cogwheels.png" />My Account</a>
                            <a class="dropdown-item" href="pages/user/browse_users.php"><img class="menu-glyph" src="images/glyphicons/glyphicons-44-group.png" /> Browse Users</a>
                        </div>
                    </li>';
                }
                echo '<li class="nav-item"><button type="button" class="btn btn-primary';
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
