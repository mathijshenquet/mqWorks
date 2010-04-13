<?php 
/**
 * Get list of all keys of a multidimentional array
 *
 * @param array $array Multidimensional array to extract keys from
 * @return array
 */
return $self = function(array $array)use(&$self)
{
	$keys = array();

	foreach ($array as $key => $value) {
		$keys[] = $key;

		if (is_array($array[$key])) {
			
			
			$keys = array_merge($keys, $self($array[$key]));
		}
	}

	return $keys;
}
;