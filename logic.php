<?php
	# Initialize our variables.
	$number_of_words;
	$incl_number;
	$incl_char;
	$cap;

	# If the user has submitted, set our variables according to
	# the user's setting. Otherwise, set our variables to random
	# values.

	# Set the number of words to be used in the password.
	if (isset($_POST["number_of_words"])) {
		$number_of_words = $_POST["number_of_words"];}
	else $number_of_words = rand(3,6);

	# Set whether to include a number or not.
	if (isset($_POST["incl_number"])) {
		$incl_number = $_POST["incl_number"];
	}
	else $incl_number = rand(0,1);

	# Set whether to include a special character or not.
	if (isset($_POST["incl_char"])) {
		$incl_char = $_POST["incl_char"];
	}
	else $incl_char = rand(0,1);

	# Set whether to capitalize the first letter or not.
	if (isset($_POST["cap"])) {
		$cap = $_POST["cap"];
	}
	else $cap = rand(0,1);

	# Initialize an array of words from which to select.
	$words = array("puppy", "eyeliner", "couch", "heaven", "boots", "beautiful", "strong", "fever", "lust", "drunk", "pious", "enormous", "common", "town", "permit", "ticket", "above", "hammer", "thunder", "music", "note", "tune", "broom", "clean", "squeaky", "eggplant", "foliage", "rose", "pink", "virtuous", "special", "forgetful", "cat", "revenge", "iron", "knob", "diary", "dairy", "cake", "pie", "cheese", "bread", "stable", "friendly", "familiar", "awful", "informative", "teacher", "smooth", "mud", "wire", "hairy", "duck", "bananas", "decimated", "cream", "avocado", "feelings", "sedative", "fear", "keen", "cupcake", "frosting", "bubblegum", "princess", "hamster", "grumpy", "box", "dragon", "gold", "treasure", "adventure", "time", "evening", "saying", "troll", "frozen", "magic", "magical", "simple", "heavy", "many", "often", "sometimes", "difficult", "roommates", "baker", "pan", "knives", "giggling", "crawling", "baby", "silly", "goofy", "favorite", "elfish", "victorian", "fantasy", "inconceivable", "mathematical", "algebraic", "loving", "hugs", "smooches", "breeches", "underpants", "elbow", "knuckles", "bingo", "cabin", "lake", "kayak", "sunshine", "blonde", "bursting", "tiny", "adorable", "toxic", "wiener", "penguin", "apples", "stickers", "old", "elephant", "shapeshifting", "stretchy", "brave", "sword", "genius", "scientist", "beaker", "goggles", "conniving", "plan", "spontaneous", "ache", "complaints", "tips", "raspberry", "gush", "blood", "vampire", "unicorn", "rainbow", "cloud", "sky", "floating", "eternal", "best", "friend", "star", "twinkling", "drawbridge", "castle", "river", "waves", "roaring", "lion", "tiger", "kittens", "fuzzy", "cutest", "bottom", "uncut", "freckles", "rubbery", "porous", "even", "courageous", "segment", "ripped", "floppy", "sandy", "pale", "bronze", "timber", "tinder", "spark", "yeti", "ice", "king", "rotten", "wood", "foreign", "skyline", "inordinate", "cool", "shimmering", "skeleton", "blue", "binder", "hello", "monday", "sandwich", "pamphlet", "under", "hard", "chair", "purple", "monkey", "dishwasher", "hidden", "misunderstood", "prayer", "rolling", "mossy", "separate", "bright", "television", "chocolate", "strawberry", "spoon", "mirror", "incomplete", "long", "test", "stubborn", "mutt", "golem", "from", "gift", "terrible", "comfort", "mountain", "bookshelf", "curly", "escape", "ceiling", "glass", "parachute", "orange", "lime", "door", "thorough", "wandering", "iphone", "smile", "sniffs", "colorless", "green", "ideas", "dream", "furious");

	# Initialize the password.
	$password = generate_password ($number_of_words, $words);

	# Append any extras
	# If the user wants a number:
	if ($incl_number) {
		$random_number = rand(0,9);
		$password = $password . $random_number;
	}

	# If the user wants a special character:
	if ($incl_char) {
		$chars = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")");
		$random_char = $chars[rand(0,9)];
		$password = $password . $random_char;
	}

	# If the user wants the first letter capitalized:
	if ($cap) $password = ucfirst($password);

	function generate_password ($number_of_words, array $words) {
		# Find the number of words in the array.
		$count = count($words) - 1;

		# Initialize a string
		$string = "";

		$n = $number_of_words;

		# Generate n random words and adjoin them.
		for ($i = 0; $i < $n; $i++) {
			# Find a random index
			$index = rand(0, $count);

			# Append the word to the string. 
			# If it's not the first word, join with a hyphen.
			if ($i > 0) $string = $string . "-" . $words[$index];
			else $string = $string . $words[$index];
		}
		return $string;
	}
 ?>