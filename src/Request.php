<?php
namespace Talex\Helpers;

class Request
{
	
    /**
     * Check if it is a AJAX request.
     */
  	public static function isAjax()
  	{
  		 return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest'));
  	}

    /**
    * Check if it is a GET request.
    */
    public static function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    /**
     * Check if it is a POST request.
     */
    public static function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Check if it is a PUT request.
     */
    public static function isPut(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'PUT';
    }

    /**
     * Check if it is a DELETE request.
     */
    public static function isDelete(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'DELETE';
    }

}
