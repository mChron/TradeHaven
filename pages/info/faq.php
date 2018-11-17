<!DOCTYPE html>
<!-- Filename: faq.php
Author: Marcus Chronabery
Date: 11/7/18 -->
<html>
    <head>
        <title>Trade Haven - FAQ</title>
        <?php include "../../pages/common/includes.html" ?>
        <link href="css/faq.css" rel="stylesheet">
        <script src="js/faq.js"></script>
    </head>
    <body>
        <?php include "../../pages/common/header.php" ?>
        <?php include "../../pages/common/login_modal.php"?>
        <?php include "../../pages/common/footer.php" ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="faq-jumbotron" class="jumbotron">
                        <h2>FAQ & How-To</h2>
                        <p>
                            For all of the rules on Magic: The Gathering please visit <a href="https://magic.wizards.com/en/game-info/gameplay/rules-and-formats/rules">Wizards Of The Coast's official website</a>.
                            <br />
                            But for the short and sweet versions use the Table Of Contents below to find a topic.
                        </p>
                        <h3>Table Of Contents</h3>
                        <ol id="how-to-toc">
                        </ol>
                        <div id="basic-card-rules">
                            <hr />
                            <h3 class="toc-header" title="How To Read A Magic Card">
                                How To Read A Magic Card
                            </h3>
                            <hr />
                            <figure id="fig-read-card">
                                <img src="images/cards/readingcard.png" height="300"/>
                                <figcaption>Fig. 1 - Reading A Card</figcaption>
                            </figure>
                            <h4 class="toc-sub-header">Name</h4>
                            <p>
                                Each card has a name that serves as its unique identifier. Though a card may be reprinted, no two cards with the same name will ever function differently.<br />
                                In most Magic formats, you can have up to four copies of a card with the same name (except basic lands, which are unlimited).
                            </p>
                            <h4 class="toc-sub-header">Mana Cost</h4>
                            <p>
                                Mana is the resource used to cast spells in Magic. All spell cards have a mana cost in the upper right corner. <br />
                                Serra Angel’s mana cost, <img src="images/cards/mana/colorless3.gif" /><img src="images/cards/mana/white.gif" /><img src="images/cards/mana/white.gif" />, means that you must pay three mana of any kind plus two white mana to cast it.
                            </p>
                            <h4 class="toc-sub-header">Type Line</h4>
                            <p>Every card in Magic has a type, and some cards also have subtypes or supertypes that provide more information. For example, Serra Angel’s type is creature, and its subtype is Angel. More on card types later.</p>
                            <h4 class="toc-sub-header">Text Box</h4>
                            <p>
                                Some cards have special abilities that are printed here (in the area above the dividing line), and abilities sometimes have reminder text in parentheses to help explain what they do.<br />
                                Flavor text may also appear in the text box, usually below a divider bar. Flavor text has no effect on gameplay; it’s a bit of story information about the card.
                            </p>
                            <hr />
                            <h3 class="toc-header" title="Card Abilities">Card Abilities</h3>
                            <hr />
                            <h4 class="toc-sub-header">Static Abilities</h4>
                            <p>
                                A static ability is text that’s always true while that card is on the battlefield. For example, Favorable Winds is an enchantment with the static ability "Creatures you control with flying get +1/+1."<br />
                                You don’t have to activate a static ability; it just does what it says.
                            </p>
                            <h4 class="toc-sub-header">Triggered Abilities</h4>
                            <p>
                                A triggered ability is an ability that is triggered by a specific event occurring in the game. For example, Tattered Mummy is a creature with the triggered ability "When Tattered Mummy dies, each opponent loses 2 life."<br />
                                Each triggered ability starts with the word "when," "whenever," or "at." You don’t activate a triggered ability— it automatically triggers whenever the condition or conditions stated in the first part of the ability are met.
                            </p>
                            <h4 class="toc-sub-header">Activated Abilities</h4>
                            <p>
                                An activated ability is an ability that you can activate whenever you want (like casting an instant), as long as you can pay the cost. <br />
                                Each activated ability is formatted in the same way: "Cost: Effect." For example, Inspired Sphinx is a creature with the activated ability "<img src="images/cards/mana/colorless3.gif" /><img src="images/cards/mana/blue.gif" />: Create a 1/1 colorless Thopter artifact creature token with flying." <br />
                                Some activated abilities contain the <img src="images/cards/affects/tap.gif" /> (tap) symbol in their costs; this means that you must tap that card to activate the ability. You can’t activate this kind of ability if the permanent is already tapped or if it’s a creature with summoning sickness.
                            </p>
                            <h4 class="toc-sub-header">Power/Toughness</h4>
                            <p>
                                Every creature card has a box in the lower right corner that shows its power and toughness. A creature’s power (the first number) is the amount of damage it deals in combat.<br />
                                Its toughness (the second number) is the amount of damage that must be dealt to it in a single turn to destroy it.
                            </p>
                            <hr />
                            <h3 class="toc-header" title="Card Types">Card Types</h3>
                            <hr />
                            <h4 class="toc-sub-header">Lands</h4>
                            <p>
                                You’ll use lands to generate mana which is used to cast spells and activate abilities. <br />
                                Each basic land makes one mana of a particular color. Plains &DoubleLongRightArrow;White <img src="images/cards/mana/white.gif" />, Islands &DoubleLongRightArrow; Blue <img src="images/cards/mana/blue.gif" />, Swamps &DoubleLongRightArrow; Black <img src="images/cards/mana/black.gif" />, Mountains &DoubleLongRightArrow; Red <img src="images/cards/mana/red.gif" />, and Forests &DoubleLongRightArrow; Green <img src="images/cards/mana/green.gif" />.<br />
                                You can play one land during each of your turns. To play a land, just put it from your hand onto the battlefield during either of the main phases of your turn.
                            </p>
                            <h4 class="toc-sub-header">Creatures</h4>
                            <p>
                                Creatures fight for you: they can attack during the combat phase of your turn and block during the combat phase of an opponent’s turn.<br />
                                You can cast a creature as a spell during your main phase, and it remains on the battlefield as a permanent. <br />
                                Creatures enter the battlefield with "summoning sickness," which means that a creature you control can’t attack (or use an ability that has <img src="images/cards/affects/tap.gif" /> in its cost) until it starts your turn under your control.<br />
                                You can block with a creature no matter how long it’s been on the battlefield.
                            </p>
                            <h4 class="toc-sub-header">Artifacts</h4>
                            <p>
                                Artifacts represent machines or magical objects. Like creatures, you can cast an artifact as a spell during your main phase, and it remains on the battlefield unless it’s destroyed, sacrificed, exiled, or otherwise removed.<br />
                                Most artifacts are colorless, which means you can cast them with any color of mana.
                            </p>
                            <h4 class="toc-sub-header">Enchantments</h4>
                            <p>
                                Enchantments have persistent magical effects that affect the game as long as they’re on the battlefield.<br />
                                Like creatures, you can cast an enchantment as a spell during your main phase, and it remains on the battlefield unless it's removed in a similar fashion to artifacts.
                            </p>
                            <h4 class="toc-sub-header">Sorceries</h4>
                            <p>
                                Sorceries are spells that you can cast only during a main phase of your turn. They have a one-time effect.<br />
                                You do what the spell says, and then put the card into your graveyard.
                            </p>
                            <h4 class="toc-sub-header">Instants</h4>
                            <p>
                                Instants are spells that can be cast at any time, even during your opponent’s turn or during combat.<br />
                                Like sorceries, instants have a one-time effect, and then you put them into your graveyard.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
