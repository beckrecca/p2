<?php
	# Initialize an array of words from which to select.
	$words = array("puppy", "eyeliner", "couch", "skyline", "inordinate", "cool", "shimmering", "skeleton", "blue", "binder", "hello", "monday", "sandwich", "pamphlet", "under", "hard", "chair", "purple", "monkey", "dishwasher", "hidden", "misunderstood", "prayer", "rolling", "mossy", "separate", "bright", "television", "chocolate", "strawberry", "spoon", "mirror", "incomplete", "long", "test", "stubborn", "mutt", "golem", "from", "gift", "terrible", "comfort", "mountain", "bookshelf", "curly", "escape", "ceiling", "glass", "parachute", "orange", "lime", "door", "thorough", "wandering", "iphone", "smile", "sniffs", "colorless", "green", "ideas", "dream", "furious");

	# Set the number of words to be used in the password.
	$number_of_words = $_POST["number_of_words"];

	# Set whether to include a number or not.
	$incl_number = $_POST["incl_number"];

	# Set whether to include a special character or not.
	$incl_char = $_POST["incl_char"];

	# Set whether to capitalize the first letter or not.
	$cap = $_POST["cap"];

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