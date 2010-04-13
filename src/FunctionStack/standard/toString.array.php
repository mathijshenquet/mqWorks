<?php 
$glue=', ';
$wrap='[ %s ]';

$self = function($pieces)use(&$self, $glue, $wrap){
	foreach( $pieces as $r_pieces )
  	{
    	if( is_array( $r_pieces ) )
    	{
      		$retVal[] = $self($r_pieces);
		}
	    else
	    {
	      $retVal[] = $r_pieces;
	    }
 	}
 	
 	return sprintf($wrap, implode($glue, $retVal));
};

return $self;