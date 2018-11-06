<!DOCTYPE html>
<!-- Filename: header.html
Author: Marcus Chronabery
Date: 9/7/18 -->
<nav id="header" class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-brand">Trade Haven</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="navbar-nav nav-fill w-100">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/events.html">Events</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="pages/tools/tools.html" id="navbarToolsDropdownLink" data-toggle="dropdown">Game Tools</a>
                <div class="dropdown-menu" aria-labelledby="navbarToolsDropdownLink">
                    <a class="dropdown-item" href="pages/tools/dice_roller.html">Dice Roller</a>
                    <a class="dropdown-item" href="pages/tools/life_counter.html">Life Counter</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/info/faq.html">FAQ & How-To</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/business/contact.html">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/info/about.html">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="pages/inventory/browse.html" id="navbarInventoryDropdownLink" data-toggle="dropdown">Inventory</a>
                <div class="dropdown-menu" aria-labelledby="navbarInventoryDropdownLink">
                    <a class="dropdown-item" href="pages/inventory/browse.html">Buy</a>
                    <a class="dropdown-item" href="pages/inventory/sell.html">Sell</a>
                    <a class="dropdown-item" href="pages/inventory/trade.html">Trade</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages/inventory/purchase_history.html">Purchase History</a>
                    <a class="dropdown-item" href="pages/inventory/sell_history.html">Sell History</a>
                    <a class="dropdown-item" href="pages/inventory/trade_history.html">Trade History</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/user/cart.html">My Cart</a>
            </li>
            <li class="nav-item">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login-modal">Login</button>
            </li>
        </ul>
    </div>
</nav>
