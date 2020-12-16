<?php


namespace app\Core\exception;


class ForbiddenException extends \Exception
{
    protected $message = 'You dont have permission to access this page';
    protected $code = 403;
}