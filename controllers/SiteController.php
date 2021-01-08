<?php

namespace app\controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\Request;
use app\Models\Invoice;

class SiteController extends Controller
{


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