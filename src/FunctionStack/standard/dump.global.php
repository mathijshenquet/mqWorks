<?php

/**
 * Debug helper function.  This is a wrapper for var_dump() that adds
 * the <pre /> tags, cleans up newlines and indents, and runs
 * htmlentities() before output.
 *
 * @param mixed $var     The variable to dump.
 * @param string $label  Label to prepend to output.
 * @param boolean $print Print the output if true.
 * @param boolean $exit  Exit after echoing if true
 * @return string
 */
return function($var, $label=null, $print=true, $exit=false)
{
	// format the label
	$label_text = $label;
	$label = ($label === null) ? '' : '<h2 style="margin: 0px">' . trim($label) . '</h2>';

	// var_dump the variable into a buffer and keep the output
	ob_start();
	var_dump($var);
	$output = ob_get_clean();

	// neaten the newlines and indents
	$output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);

	if (is_array($var)) {
		$keys = Q($var)->getKeys();
		$maxlen = 0;

		// determine the number of characters in the longest key
		$keys->each(function($key)use(&$maxlen){
			$len = $key->length()->unbind();
			if ($len > $maxlen) {
				$maxlen = $len;
			}
		});

		// account for [" and "]
		$maxlen += 4;

		// append spaces between "] and =>
		$output = preg_replace_callback('/\[.*\]/', create_function('$matches', 'return str_pad($matches[0], ' . $maxlen . ');'), $output);
	}

	if (PHP_SAPI == 'cli') {
		$output = PHP_EOL . $label_text
				. PHP_EOL . $output
				. PHP_EOL;
	} else {
		if (!extension_loaded('xdebug')) {
			$output = htmlspecialchars($output, ENT_QUOTES);
		}

		$output = '<pre style="font-family: \'Courier New\'; font-size: 12px; background-color: #FBFED7; margin: 5px 0; padding: 10px; border: 1px solid #CCCCCC;">'
				. $label
				. $output
				. '</pre>';
	}

	if ($print === true) {
		print $output;
	}

	if ($exit === true) {
		exit;
	}
}
;