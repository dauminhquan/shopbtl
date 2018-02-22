<?php 

namespace QD;
/**
* 
*/
class Request
{

	public static function has($str)
	{
		if(isset($_GET[$str]))
        {
            return true;
        }
        return false;
	}
	public static function input($str)
	{
		return $_GET[$str];
	}
	public static function hasFile($str)
	{
			if(FILE[$str])
			{
				return true;
			}
			return false;
	}
	public static function file($str)
	{

	}
}

 ?>