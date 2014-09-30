<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>xkcd password generator</title>
    <?php include 'logic.php' ?>
    <!-- makes the layout responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
</head>

<body>

<div class="container">

    <div class="row">
        <header class="col-sm-12">
            <img src="img/passwordtime.png" alt="Password Time!" class="img-responsive">
        </header>

        <div class="col-sm-9 col-md-7 col-lg-6">
            <p>
                Let's generate a password that is
                secure yet memorable, like in
                <a href="http://xkcd.com/936/" target="_blank">
                    this xkcd comic</a>!
                We'll pick some random words and stick 'em together. 
                You choose how many! 
                You can add a number, a special character, 
                a capitalized first letter, 
                or any combination of the three.
                It's a password that's fun, easier to remember and hard
                for hackers to crack. Mathematical!
            </p>
            <p>
                Use at your own <span id="PERIL">PERIL</span>!
            </p>

            <form method="POST" action="index.php">
                <p>How many words would you like to use?
                <?php 
                    // Generate radio boxes for numbers 2-7.
                    for ($i = 2; $i < 7; $i++) {
                        echo '<input type="radio" value="' . $i . '" name="number_of_words"';
                        // If the user has submitted, remember what they submitted
                        // and check that radio box.
                        if (isset($_POST["number_of_words"])) {
                            if (($_POST["number_of_words"]) == $i) {
                                echo ' checked="checked"';
                            }
                        }
                        echo '> ' . $i . ' ';
                    /*
                        I do a similar thing below for the drop down boxes!
                        I didn't want to bother writing an HTML form in PHP for
                        simple yes and no boxes, so I apologize for the inconsistency.
                    */
                    }
                ?><br>
                Would you like to include a number? 
                <select name="incl_number">
                    <option value="0"<?php if (isset($_POST["incl_number"])) { if (($_POST["incl_number"]) == 0) { echo ' selected="selected"';}} ?>>No</option>
                    <option value="1"<?php if (isset($_POST["incl_number"])) { if (($_POST["incl_number"]) == 1) { echo ' selected="selected"';}} ?>>Yes</option>
                </select><br>
                Would you like to include a character? 
                <select name="incl_char">
                    <option value="0"<?php if (isset($_POST["incl_char"])) { if (($_POST["incl_char"]) == 0) { echo ' selected="selected"';}} ?>>No</option> 
                    <option value="1"<?php if (isset($_POST["incl_char"])) { if (($_POST["incl_char"]) == 1) { echo ' selected="selected"';}} ?>>Yes</option>
                </select><br>
                Would you like to capitalize the first letter?
                <select name="cap">
                    <option value="0"<?php if (isset($_POST["cap"])) { if (($_POST["cap"]) == 0) { echo ' selected="selected"';}} ?>>No</option> 
                    <option value="1"<?php if (isset($_POST["cap"])) { if (($_POST["cap"]) == 1) { echo ' selected="selected"';}} ?>>Yes</option>
                </select><br>
                How would you like the words to conjoin?
                <select name="concat">
                    <option value="-"<?php if (isset($_POST["concat"])) { if (($_POST["concat"]) == "-") { echo ' selected="selected"';}} ?>>With-hyphens-like-this</option>
                    <option value=" "<?php if (isset($_POST["concat"])) { if (($_POST["concat"]) == " ") { echo ' selected="selected"';}} ?>>With regular spaces</option>
                    <option value=""<?php if (isset($_POST["concat"])) { if (($_POST["concat"]) == "") { echo ' selected="selected"';}} ?>>Nospacesforme</option>
                    <option value="CamelCase"<?php if (isset($_POST["concat"])) { if (($_POST["concat"]) == "CamelCase") { echo ' selected="selected"';}} ?>>CamelCasePlease</option>
                </select><br>
                Do you hate yourself and want sticky caps?
                <select name="sticky">
                    <option value="0"<?php if (isset($_POST["sticky"])) { if (($_POST["sticky"]) == 0) { echo ' selected="selected"';}} ?>>No</option>
                    <option value="1"<?php if (isset($_POST["sticky"])) { if (($_POST["sticky"]) == 1) { echo ' selected="selected"';}} ?>>YeS!1</option>
                </select><br>
                <input type="submit" class="btn btn-danger">
            </form>

            <h4>
                Your password is:
            </h4>
            <h3>
                <?php echo $password; ?>
            </h3>

            <p>
                Too lazy to set the parameters yourself?
                <a href="/p2" class="btn btn-primary btn-xs">Refresh!</a>
            </p>
        </div>
    </div>
    <div class="footer">
        Thank you: 
        <a href="http://ask-angelo.deviantart.com/art/AT-font-Alphabet-322432506" target="_blank">
            Ask-Angelo @ DeviantArt
        </a> for the awesome AT typography, and 
        <a href="http://cartoonetwork.com" target="_blank">
            Cartoon Network
        </a>
        for creating and airing Adventure Time.
    </div>
</div>
</body>
</html>