<?php


namespace app\Core\middlewares;


use app\Core\Application;
use app\Core\exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * AuthMiddleware constructor.
     * @param array $actions
     */
    public function __construct(array $actions =[])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        $role =Application::getRole();
       if(Application::isGuest()|| $role==0)
       {
           if(empty($this->actions)|| in_array(Application::$app->controller->action,$this->actions))
           {
               throw new ForbiddenException();
           }
       }
    }
}