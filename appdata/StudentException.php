<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/13/18
 * Time: 1:07 PM
 */

class StudentException extends  Exception
{
    public  function  __construct($message)
    {
        parent::__construct($message);
    }
}