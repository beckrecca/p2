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
    <style type="text/css">
        #PERIL {font-weight:bold;}
        input {
            margin: .5em;
        }
        h4 { margin-bottom: 0px;}
        h3 {
            margin-top: 0.25em;
            font-weight: bold;
        }
        .footer { 
            font-size: 0.85em;
            margin-top: 1.5em;
        }
    </style>
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
                <input type="radio" value="2" name="number_of_words"> 2
                <input type="radio" value="3" name="number_of_words"> 3
                <input type="radio" value="4" name="number_of_words"> 4 
                <input type="radio" value="5" name="number_of_words"> 5
                <input type="radio" value="6" name="number_of_words"> 6 <br>
                Would you like to include a number? 
                <select name="incl_number">
                <option value="0">No</option> number_of_words
                <option value="1">Yes</option></select><br>
                Would you like to include a character? 
                <select name="incl_char">
                <option value="0">No</option> 
                <option value="1">Yes</option></select><br>
                Would you like to capitalize the first letter?
                <select name="cap">
                <option value="0">No</option> 
                <option value="1">Yes</option></select><br>
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