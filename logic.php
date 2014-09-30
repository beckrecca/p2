<?php
	# Initialize our variables.
	$number_of_words;
	$incl_number;
	$incl_char;
	$cap;
	$concat;
	$sticky;

	/* If the user has submitted, set our variables according to
	  the user's setting. Otherwise, set our variables to random
	  or default values. */

	# Set the number of words to be used in the password.
	if (isset($_POST["number_of_words"])) {
		$number_of_words = $_POST["number_of_words"];}
	else $number_of_words = rand(2,6);

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

	# Set how to concatenate each word.
	# Initalize an array of characters/options for concatenating words.
	$concat_options = array(" ", "-", "", "CamelCase");
	if (isset($_POST["concat"])) {
		$concat = $_POST["concat"];
	}
	else {
		$concat = $concat_options[rand(0, count($concat_options) - 1)];
	}

	# Set whether to use sticky caps.
	if (isset($_POST["sticky"])) {
		$sticky = $_POST["sticky"];
	}
	else $sticky = 0; // always default to regular caps

	# Initialize an array of random words from which to select.
	$words = array("puppy", "eyeliner", "couch", "heaven", "boots", "beautiful", "strong", "fever", "lust", "drunk", "pious", "enormous", "common", "town", "permit", "ticket", "above", "hammer", "thunder", "music", "note", "tune", "broom", "clean", "squeaky", "eggplant", "foliage", "rose", "pink", "virtuous", "special", "forgetful", "cat", "revenge", "iron", "knob", "diary", "dairy", "cake", "pie", "cheese", "bread", "stable", "friendly", "familiar", "awful", "informative", "teacher", "smooth", "mud", "wire", "hairy", "duck", "bananas", "decimated", "cream", "avocado", "feelings", "sedative", "fear", "keen", "cupcake", "frosting", "bubblegum", "princess", "hamster", "grumpy", "box", "dragon", "gold", "treasure", "adventure", "time", "evening", "saying", "troll", "frozen", "magic", "magical", "simple", "heavy", "many", "often", "sometimes", "difficult", "roommates", "baker", "pan", "knives", "giggling", "crawling", "baby", "silly", "goofy", "favorite", "elfish", "victorian", "fantasy", "inconceivable", "mathematical", "algebraic", "loving", "hugs", "smooches", "breeches", "underpants", "elbow", "knuckles", "bingo", "cabin", "lake", "kayak", "sunshine", "blonde", "bursting", "tiny", "adorable", "toxic", "wiener", "penguin", "apples", "stickers", "old", "elephant", "shapeshifting", "stretchy", "brave", "sword", "genius", "scientist", "beaker", "goggles", "conniving", "plan", "spontaneous", "ache", "complaints", "tips", "raspberry", "gush", "blood", "vampire", "unicorn", "rainbow", "cloud", "sky", "floating", "eternal", "best", "friend", "star", "twinkling", "drawbridge", "castle", "river", "waves", "roaring", "lion", "tiger", "kittens", "fuzzy", "cutest", "bottom", "uncut", "freckles", "rubbery", "porous", "even", "courageous", "segment", "ripped", "floppy", "sandy", "pale", "bronze", "timber", "tinder", "spark", "yeti", "ice", "king", "rotten", "wood", "foreign", "skyline", "inordinate", "cool", "shimmering", "skeleton", "blue", "binder", "hello", "monday", "sandwich", "pamphlet", "under", "hard", "chair", "purple", "monkey", "dishwasher", "hidden", "misunderstood", "prayer", "rolling", "mossy",  "separate", "bright", "television", "chocolate", "strawberry", "spoon", "mirror", "incomplete", "long", "test", "stubborn", "mutt", "golem", "from", "gift", "terrible", "comfort", "mountain", "bookshelf", "curly", "escape", "ceiling", "glass", "parachute", "orange", "lime", "door", "thorough", "wandering", "iphone", "smile", "sniffs", "colorless", "green", "ideas", "dream", "furious", "cranky", "diaper", "empty", "innocuous", "control", "birth", "sleep", "rest", "awake", "downward", "reverse", "proposal", "wedding", "candy", "teenager", "youth", "brand", "refreshed", "candid", "purpose", "mission", "spam", "python", "coffee", "violet", "violin", "canvas", "lemon", "bow", "knot", "clip", "cutting", "biting", "turbulent", "black", "photo", "memory", "forgettable", "odd", "bizarre", "confusing", "understanding", "welcome", "acceptance", "style", "gate", "cave", "guarding", "falling", "spell", "enchantment", "fish", "deer", "antlers", "santa", "bunny", "creepy", "echo", "snoopy", "sponge", "fees", "content", "snuggle", "bear", "cubs", "socks", "conspicuous", "latin", "roman", "undercover", "guess", "code", "order", "ascending", "aesthetic", "ephemeral", "horns", "sharp", "yokel", "slack", "fat", "slow", "mouse", "accent", "beige", "hubris", "enchantment", "dress", "cardigan", "closet", "cellar", "shoes", "pumps", "mascara", "pretty", "polish", "fingers", "gentle", "toes", "feet", "treat", "sweater", "knitting", "needles", "organized", "organ", "pancreas", "brain", "flushed", "better", "cured", "praying", "humble", "kneeling", "hope", "shorts", "tall", "giant", "ogre", "donkey", "butterfly", "dinosaur", "trouble", "fluttering", "extinct", "burden", "handsome", "peaceful", "soothing", "restful", "calm", "sleepy", "snoring", "doctor", "sneezing", "dope", "angry", "bashful", "snow", "flakes", "wheat", "mini", "bowl", "bowling", "hairpin", "candle", "flame", "blizzard", "hurricane", "wind", "severe", "tempestuous", "hazardous", "laboratory", "yellow", "honey", "bees", "comb", "texture", "brown", "wavy", "crunchy", "crispy", "leaves", "brilliant", "clear", "eclair", "fireworks", "rice", "beans", "lentils", "peas", "pod", "cooked", "amorous", "enamored", "wondrous", "checks", "balanced", "fair", "merry", "renaissance", "leg", "turkey", "overweight", "slender", "lithe", "numb", "eager", "paradox", "clay", "powerful", "omnipotent", "electric", "tantalizing", "exciting", "boring", "graphic", "obscene", "valid", "review", "bespectacled", "price", "frugal", "expensive", "valuable", "wise", "clever", "hero", "enemy", "doom", "loyal", "fate", "skeptical", "greek", "across", "cannonball", "thrown", "ejected", "saxophone", "talented", "gifted", "sensitive", "stinky", "guest", "host", "party", "noisy", "fun", "dance", "groovy", "ballet", "thoughtful", "considerate", "warm", "sweet", "lollipop", "cupboard", "rare", "low", "altitude", "hobo", "hillbilly", "cone", "boiling", "melting", "soaring", "edge", "classic", "crusty", "busted", "broken", "broke", "joke", "hilarious", "ludicrous", "outcast", "spellbound", "witch", "halloween", "christmas", "thanksgiving", "parade", "valentine", "devoted", "free", "generous", "spooky", "afternoon", "morning", "midnight", "lunch", "snack", "fulfilling", "pork", "hamburger", "asparagus", "grilling", "garden", "tomato", "dig", "creek", "babbling", "bubbles", "buttercup", "blossom", "friendship", "eagle", "safe", "secure", "careful", "governor", "mayor", "limited", "fertile", "beep", "alarming", "popping", "wool", "sheep", "lamb", "pigs", "teacup", "sentence", "talkative", "creative", "touching", "gray", "silver", "platinum", "worthy", "dear", "darling", "desperate", "pouring", "silent", "light", "glowing", "radiant", "vibrant", "play", "playtime", "frisbee", "sports", "football", "writing", "journal", "secretive", "outgoing", "charming", "tiger", "spaghetti", "meatballs", "spicy", "savory", "bitter", "almond", "butter", "allergic", "over", "pine", "scrub", "plucky", "chance", "extra", "jellyfish", "seaweed", "monsoon", "splash", "crash", "knowledge", "trigger", "quaint", "breakfast", "waffles", "syrup", "juice", "oatmeal", "thick", "chewy", "satisfying", "early", "sensual", "salty", "american", "scrambled", "whipped", "mixed", "crazy", "serious", "reek", "ripe", "mature", "naive", "blessed", "caress", "sisters", "clone", "suburban", "artist", "parent", "uncle", "paternal", "growing", "ankle", "necklace", "diamond", "watchful", "ring", "trial", "division", "continuing", "education", "email", "student", "never", "resilient", "endurance", "jogging", "sweat", "lying", "spa", "pedicure", "brownies", "cookie", "vanilla", "butterscotch", "licorice", "steak", "kiwi", "blackberry", "blueberry", "island", "september", "quiz", "list", "irresponsible", "first", "repetitive", "regular", "extraordinary", "pirate", "plunder", "mummy", "zombie", "monster", "venomous", "misunderstood", "good", "liberated", "independent", "innovative", "magazine", "newspaper", "zebra", "xylophone", "piano", "musical", "automobile", "poor", "noble", "neutral", "selfish", "yeast", "caring", "peanut", "nutty", "coconut", "tropical", "sunny", "yoke", "dripping", "quality", "quite", "frank", "hell", "proof", "united", "flour", "blooming", "humming", "pregnant", "okay", "current", "ancient", "modern", "future", "tense", "past", "grammatical", "condescending", "resolute", "pepper", "bedtime", "invited", "pillows", "animal", "super", "average", "standard", "porch", "airy", "fairy", "queen", "lady", "singing", "thundering", "ill", "dizzy", "tart", "athletic", "summer", "triceratops", "duke", "desk", "crooked", "dud", "bottle", "nugget", "juicy", "watermelon", "grapefruit", "powdered", "ivory", "reception", "hood", "wooden", "crawling", "grateful", "illegal", "bandit", "fugitive", "painting", "toaster", "sunburned", "heckling", "snobby", "frigid", "new", "chicago", "florida", "behind", "hobbit", "squirrel", "acorn", "hibernating", "mammal", "tree", "peaches", "dessert", "tough", "thick", "transparent", "clumsy", "dollar", "robbery", "epic", "belief", "vote", "quiet", "radical", "carrot", "koolaid", "otter", "husky", "mango", "internet", "clicking", "snapping", "searching", "mean", "hungry", "clock", "bracelet", "calculator", "war", "growling", "robin", "cardinal", "gerbil", "wheel", "bookcase", "noun", "collector", "mail", "cell", "mobile", "quarter", "split", "souvenir", "library", "limping", "cloudy", "loose", "vineyard", "age", "strike", "clammy", "cherry", "concise", "pearl", "bubbly", "grand", "hotel", "central", "outside", "cross", "tired", "pot", "pool", "noodle", "wild", "chilly", "captive", "lover", "sneaky", "fit", "quiz", "line", "fine", "thin", "grin", "pin", "tin", "bin", "bun", "glum", "glad", "sad", "mad", "toot", "owl", "hoot", "wide", "stamp", "ink", "fancy", "feast", "chow", "goo", "all", "fall", "grief", "paris", "london", "bridge", "far", "travel", "real", "hay", "hey", "day", "may", "lie", "isle", "pile", "true", "dew", "wet", "stop", "sign", "drug", "cruise", "damp", "fixed", "ruby", "doughnut", "english", "sugar", "museum", "story", "boy", "son", "yarn", "shirt", "top", "itchy", "stream", "small", "drink", "popcorn", "movie", "coral", "aqua", "sea", "whale", "boat", "sail", "steamy", "persuasive", "alive", "weak", "mysterious", "twin", "dark", "dry", "desert", "bone", "deal", "camp", "spread", "vivid", "nana", "holy", "zoo", "pen", "chalk", "young", "spot", "messy", "energetic", "business", "awkward", "uncomfortable", "church", "walrus", "seal", "cafe", "meat", "teacher", "work", "sweetheart", "heart", "lungs", "breath", "fork", "meal", "quack", "geese", "pain", "gift", "pigeon", "celebration", "cheerful", "festive", "chef", "dumb", "chaotic", "curious", "bark", "place", "thing", "idea", "african", "country", "city", "boss", "lizard", "slimy", "snake", "cute", "tweet", "cozy", "cottage", "lasagna", "nintendo", "comic", "cartoon", "wife", "chain", "swashbuckling", "ahoy", "mate", "dangerous", "belly", "button", "screaming", "cactus", "prickly", "birthday", "pet", "lighthouse", "oven", "stove", "college", "mushroom", "paranoid", "carousel", "junk", "letter", "ad", "ivy", "prize", "mermaid", "marigold", "fuchsia", "magenta", "sane", "spiky", "razor", "mustache", "panda", "bamboo", "potatoes", "automatic", "video", "game", "film", "scary", "sympathetic", "reward", "extra", "pumpkin", "cucumber", "melon", "nanny", "whistle", "shrill", "teddy", "chicken", "rooster", "ready", "farm", "false", "against", "healthy", "joy", "care", "steak", "idle", "pizza", "cheesy", "soup", "salad", "fresh", "scarf", "soft", "patient", "moxie", "coke", "root", "pineapple", "acidic", "basic", "bruised", "secret", "orchard", "grove", "aquarium", "interesting", "cow", "goat", "truck", "bicycle", "mild", "lane", "road", "avenue", "block", "coat", "ball", "same", "fight", "chorus", "melody", "soapy", "twisted", "plum", "plain", "pasta", "seeds", "broccoli", "balloon", "colleague", "house", "hipster", "indie", "romantic", "german", "flesh", "sauce", "wine", "pressed", "worried", "kangaroo", "rude", "bid", "bit", "pit", "lit", "lot", "tip", "turtle", "striped", "frost", "flower", "girl", "man", "pun", "runt", "crack", "half", "math", "history", "bath", "shower", "tub", "tuba", "horn", "corn", "dove", "love", "glove", "fuzzy", "fur", "furry", "pub", "puma", "tomb", "womb", "room", "soon", "face", "chin", "dolphin", "majestic", "scarlet", "grade", "excellent", "jazz", "rock", "rocket", "pocket", "park", "envy", "chemistry", "setting", "class", "mask", "costume", "suit", "axe", "fridge", "knife", "tumbling", "tumbleweed", "weed", "dandelion", "north", "south", "east", "west", "doubt", "ladybug", "ant", "hive", "victory", "bet", "budget", "groceries", "bills", "cheap", "muffin", "cranberry", "moist", "gooey", "baked", "honk", "thunk", "thought", "mom", "mother", "brother", "sister", "annoying", "spinach", "dull", "lively", "fly", "cliff", "wicked", "comfy", "physics", "scruffy", "beard", "there", "here", "everywhere", "anywhere", "spare", "raisin", "board", "plank", "flag", "right", "left", "none", "more", "beef", "cheeseburger", "burglar", "data", "media", "radio", "listening", "powder", "soda", "notebook", "flammable", "nurse", "pencil", "short", "positive", "night", "rain", "surfing", "blush", "bush", "shrub", "brush", "neat", "tooth", "hand", "shiny", "will", "person", "year", "month", "way", "world", "life", "living", "part", "child", "children", "eye", "woman", "week", "case", "point", "problem", "fact", "last", "important", "big", "large", "high", "height", "different", "public", "bad", "few", "able", "group", "band", "key", "lock", "nerd", "polar", "vacation", "hiking", "walk", "temperate", "autumn", "crisp", "crumb", "biscuit", "chrome", "pacific", "coast", "highway", "scene", "crimson", "yard", "sale", "forgotten", "delayed", "weather", "warning", "primary", "success", "kitchen", "sparkling", "crud", "crinkle");

	# Initialize the password.
	$password = generate_password ($number_of_words, $words, $concat);

	# Append any extras
	# If the user wants a number:
	if ($incl_number) {
		$random_number = rand(0,9);
		$password = $password . $random_number;
	}

	# If the user wants a special character:
	if ($incl_char) {
		$chars = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")");
		$random_char = $chars[rand(0, count($chars) - 1)];
		$password = $password . $random_char;
	}

	# If the user wants the first letter capitalized:
	if ($cap) $password = ucfirst($password);

	# If the user wants sticky caps:
	if ($sticky) $password = stickycaps($password);

	/*************** FUNCTIONS ***************/

	/*
	* Takes an integer selected by the user, an array of words to use, and a concatenator
	* option selected by the user. It returns a variable $string, the student's password.
	*/
	function generate_password ($number_of_words, array $words, $concat) {
		# Initialize a string
		$string = "";

		# Generate n random words and conjoin them.
		for ($i = 0; $i < $number_of_words; $i++) {
			# Find a random index
			$index = rand(0, count($words) - 1);

			# If the user selected CamelCase, CamelCase it up!
			if ($concat == "CamelCase") {
				# Capitalize the first letter of the word at $index, and append it to the string.
				$string = $string . ucfirst($words[$index]);
			}
			# If it's not CamelCase, conjoin the words with the selected concatenator.
			else {
				if ($i > 0) $string = $string . $concat . $words[$index];
				# When it's the first word, don't use any concatenator.
				else $string = $string . $words[$index];
			}			
		}
		return $string;
	}

	/*
	* Takes a string and randomly capitalizes every other word. 
	* Returns variable $sticky_word.
	*/
	function stickycaps ($word) {
		# Initalize the monster word we will return.
		$sticky_word = "";

		# Coin toss to see if we start with a capital letter or not.
		$toss = rand(0,1);

		for ($i = 0; $i < strlen($word); $i++) {
			if ($toss) {
				# If it's an even index, capitalize the letter and add it to the sticky_word
				if ($i%2 == 0) $sticky_word = $sticky_word . strtoupper($word[$i]);
				# Otherwise just add the regular letter
				else $sticky_word = $sticky_word . $word[$i];
			}
			# Do the opposite if the toss said so.
			else {
				# If it's an even index, add the regular letter to the sticky_word
				if ($i%2 == 0) $sticky_word = $sticky_word . $word[$i];
				# Otherwise, capitalize the letter and add it to the sticky_word
				else $sticky_word = $sticky_word . strtoupper($word[$i]);
			}
		}
		return $sticky_word;
	}

	/*
	* Takes two integers and builds radio buttons with corresponding values,
	* passing that value to the key "number_of_words" 
	*/
	function build_number_of_words_checkboxes ($start, $end) {
		# Loop up through $start and $end inclusively.
        for ($i = $start; $i <= $end; $i++) {
        	# Build a radio button with the value $i.
            echo '<input type="radio" value="' . $i . '" name="number_of_words"';
            /* If the user has submitted, remember what they submitted
            *  and check that radio box. */
            if (isset($_POST["number_of_words"])) {
                if (($_POST["number_of_words"]) == $i) {
                    echo ' checked="checked"';
                }
            }
            echo '> ' . $i . ' ';
        }		
	}

	/*
	* Builds a drop down box with the options "No" and "Yes",
	* assigning it to a given $key. If the user has already submitted,
	* the drop down boxes mark that option as selected.
	*/
	function build_yes_no_dropdowns ($key) {
		echo '<select name="' . $key . '">';
		echo '<option value="0"';
		if (isset($_POST[$key])) { 
			if (($_POST[$key]) == 0) { 
				echo ' selected="selected"';
			}
		}
		echo '>No</option>';
		echo '<option value="1"';
		if (isset($_POST[$key])) { 
			if (($_POST[$key]) == 1) { 
				echo ' selected="selected"';
			}
		}
		# Be obnoxious if this is the key for the sticky caps question
		if ($key == "sticky") {
			echo '>YeS!1</option>';
		}
		else echo '>Yes</option>';
		echo '</select>';
	}

	/*
	* Builds dropdown boxes specifically for the options the user has
	* to concatenate the random words, taking an array of the possible options
	* denoted above.
	*/
	function build_concat_dropdowns (array $concat_options) {
		# Create an array for the menu text.
		$menu_text = array("With regular spaces", "With-hyphens-like-this", "Nospaces", "CamelCasePlease");
		echo '<select name="concat">';
		for ($i = 0; $i < count($concat_options); $i++) {
			echo '<option value="' . $concat_options[$i] . '"';
			/* If the user has already submitted, remember
			*  which option was previously selected. */
			if (isset($_POST["concat"])) { 
				if (($_POST["concat"]) == $concat_options[$i]) { 
					echo ' selected="selected"';
				}
			}
			echo '>' . $menu_text[$i] . '</options>';
		}
		echo '</select>';
	}
?>