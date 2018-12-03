<!DOCTYPE php>
<!-- Filename: sitemap.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<php lang="en">
    <head>
        <title>Trade Haven - Sitemap</title>
        <?php include "../pages/common/includes.html" ?>
    </head>
    <body>
        <?php include "../pages/common/header.php" ?>
        <?php include "../pages/common/login_modal.php"?>
        <?php include "../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="home-jumbotron" class="jumbotron">
                        <h2>Sitemap</h2>
                        <ol id="sitemap-list">
                            <li><a id="sitemap-home" href="index.php">Home</a></li>
                            <li><a id="sitemap-events" href="pages/events.php">Events</a></li>
                            <li>Tools
                                <ul>
                                    <li><a id="sitemap-life-counter" href="pages/tools/life_counter.php">Life Counter</a></li>
                                    <li><a id="sitemap-dice-roller" href="pages/tools/dice_roller.php">Dice Roller</a></li>
                                </ul>
                            </li>
                            <li><a id="sitemap-faq" href="pages/info/faq.php">FAQ & How-To</a></li>
                            <li><a id="sitemap-contact" href="pages/business/contact.php">Contact Us</a></li>
                            <li><a id="sitemap-about" href="pages/info/about.php">About Us</a></li>
                            <li>Inventory
                                <ul>
                                    <li><a id="sitemap-buy" href="pages/inventory/browse.php">Buy</a></li>
                                    <li><a id="sitemap-sell" href="pages/inventory/sell.php">Sell</a></li>
                                    <li><a id="sitemap-trade" href="pages/inventory/trade.php">Trade Status</a></li>
                                    <li><a id="sitemap-buy-history" href="pages/inventory/purchase_history.php">Purchase History</a></li>
                                    <li><a id="sitemap-sell-history" href="pages/inventory/sell_history.php">Sell History</a></li>
                                </ul>
                            </li>
                            <li><a id="sitemap-cart" href="pages/user/cart.php">My Cart</a></li>
                            <li><a id="sitemap-signup" href="pages/user/signup.php">Signup</a></li>
                            <li><a id="sitemap-forgot-pass" href="pages/user/forgot_password.php">Forgot Password</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </body>
</php>