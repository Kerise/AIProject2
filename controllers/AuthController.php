<?php


namespace app\controllers;


use app\Core\Application;
use app\Core\Controller;
use app\Core\middlewares\AuthMiddleware;
use app\Core\Request;
use app\Core\Response;
use app\models\Invoice;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
        $this->registerMiddleware(new AuthMiddleware(['register']));
    }

    public function login(Request $request,Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost())
        {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login())
            {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login',[
            'model'=>$loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()){

            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', 'Thank you for registration');
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }
    public function logout(Request $request,Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {

        return $this->render('profile');
    }
    public function upload(Request $request)
    {
        $invo = new Invoice();
        $invo->loadData($request->getBody());
        echo $invo->kwotaBrutto;
        if(isset($_POST["delete"])){
            echo $_POST["delete"];
            unlink("files/".$_POST["delete"]);
        }
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $extensions= array("jpeg","jpg","png","pdf");
            foreach($file_name as $key => $value){
                $file_ext=strtolower(end(explode('.',$_FILES['image']['name'][$key])));
                if(in_array($file_ext,$extensions)=== false){
                    $errors[]="Rozszerzenie niedozwolone.";
                }
                if($file_size[$key] > 2097152){
                    $errors[]='Plik nie może być większy niż 2 MB.';
                }
            }
            if(empty($errors)==true){
                foreach($file_name as $key => $value){
                    move_uploaded_file($file_tmp[$key],"../files/".$file_name[$key]);
                    echo "Success";
                }
            }
            else{
                print_r($errors);
            }
        }

    }

}