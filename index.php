<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>xkcd password generator</title>
    <?php include 'logic.php' ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <style type="text/css">
        #password { font-weight: bold;}
    </style>
</head>

<body>

<div class="container">

    <p>Insert an explanation of the app here.</p>

    <form method="POST" action="index.php">
        How many words would you like to use?
        <input type="radio" value="3" name="number_of_words">3
        <input type="radio" value="4" name="number_of_words">4 
        <input type="radio" value="5" name="number_of_words">5
        <input type="radio" value="6" name="number_of_words">6 <br>
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
        <input type="submit" class="btn btn-default">
    </form>

    <p>
        Your password is <span id="password"><?php echo $password; ?></span>
    </p>

    <?php echo count($words); ?>
</div>
</body>
</html>