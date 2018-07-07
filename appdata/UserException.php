<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 12/28/17
 * Time: 8:03 PM
 */

class UserException extends  Exception
{
    public  function  __construct($message)
    {
        parent::__construct($message);
    }
}

?>