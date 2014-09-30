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
                You choose how many! You pick what to add!
                You say how it joins together!
                It's a password that's fun, easier to remember and hard
                for hackers to crack. Mathematical!
            </p>
            <p>
                Use at your own <span id="PERIL">PERIL</span>!
            </p>

            <form method="POST" action="index.php">
                <p>How many words would you like to use?
                <?php build_number_of_words_checkboxes(2,6); ?>
                <br>
                Would you like to include a number? 
                <?php build_yes_no_dropdowns("incl_number"); ?>
                <br>
                Would you like to include a character? 
                <?php build_yes_no_dropdowns("incl_char"); ?>
                <br>
                Would you like to capitalize the first letter?
                <?php build_yes_no_dropdowns("cap"); ?>
                <br>
                How would you like the words to conjoin?
                <?php build_concat_dropdowns($concat_options); ?>
                <br>
                Do you hate yourself and want sticky caps?
                <?php build_yes_no_dropdowns("sticky"); ?>
                <br>
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
                <a href="/" class="btn btn-primary btn-xs">Refresh!</a>
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