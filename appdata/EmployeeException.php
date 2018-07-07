<?php
/**
 * Created by PhpStorm.
 * User: dorron
 * Date: 1/13/18
 * Time: 9:07 PM
 */

class EmployeeException extends Exception
{
    public function  __construct($message)
    {
        parent::__construct($message    );
    }

}