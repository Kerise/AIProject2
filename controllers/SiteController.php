<?php

namespace app\controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Stronka"
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }
}