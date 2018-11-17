<!DOCTYPE html>
<!-- Filename: index.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html lang="en">
    <head>
        <title>Trade Haven - Cards & More</title>
        <?php include "pages/common/includes.html" ?>
        <link href="css/index.css" rel="stylesheet">
        <script src="js/index.js"></script>
    </head>
    <body>
        <?php include "pages/common/header.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="home-jumbotron" class="jumbotron">
                        <h2>What Is Trade Haven?</h2>
                        <p>
                            Established in 2018, Trade haven was created to serve those who play trading card games like Magic: The Gathering. We offer the most up to date cards as well as some of the originals. We also offer non card inventory including dice, deck boxes, and other game essentials. We will also be working on additional essentials in the form of online tools like a Life Counter, Dice Roller, and even a Deck Builder which would allow a user to build and export their deck to help draft new and exciting decks.
                            <br/>
                            <br/>
                            Trade Haven isn't your average card marketplace, Trade Haven is also a social network for fans of the game. Users can interact with each other through chat, email, events, challenges, and trade requests. Users will increase their level the more they interact with other users. The more a user does on the site the better their social rank and the more points they earn. Points can be traded for cards or other inventory. The Challenge and Event functions allow users to organize a way of playing the game with other users. Events allow users to coordinate new card releases, store events and more. Users can buy and sell cards like traditional sites, but what makes Trade Haven unique is the ability to trade with other users. The actual exchange of ownership happens through the company. Each participant in the trade will send their cards to the company. A member of our Quality Assurance team will ensure the cards are the correct cards and are in good playing condition prior to sending them on to their new owners.
                            <br/>
                            <br/>
                            Trade Haven aims to be the one shop stop for all of your trading card needs. If there are any issues or if you have any suggestions on how we may improve the site please don't hesitate to <a href="pages/business/contact.html">Contact Us</a>. Thank you for visiting Trade Haven. Game on!
                        </p>
                        <br />
                        <h3>Featured Cards</h3>
                        <div id="carousel-row" class="row">
                            <div id="card-carousel-0" class="carousel slide mx-auto d-block carousel-fade" data-ride="carousel">
                                <ol class="carousel-indicators">
                                </ol>
                                <div class="carousel-inner">
                                </div>
                                <a class="carousel-control-prev" href="#card-carousel-0" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#card-carousel-0" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                              </div>
                        </div>
                        <hr />
                        <h6>Legal</h6>
                        <p>
                            The literal and graphical information presented on this site about Magic: The Gathering, including card images, the mana symbols, and Oracle text, is copyright Wizards of the Coast, LLC, a subsidiary of Hasbro, Inc.
                            This website is not produced by, endorsed by, supported by, or affiliated with Wizards of the Coast.
                            <br />
                            <br />
                            All card images used on this site provided by <a href="http://www.scryfall.com">www.scryfall.com</a>
                            <br />
                            All card details provided by <a href="https://mtgjson.com/v4/">https://mtgjson.com/v4/</a>
                            <br />
                            Icons on this site provided by <a href="https://game-icons.net/">https://game-icons.net/</a> and <a href="https://getbootstrap.com/">https://getbootstrap.com/</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php include "pages/common/login_modal.php"?>
        <?php include "pages/common/footer.php" ?>
    </body>
</html>