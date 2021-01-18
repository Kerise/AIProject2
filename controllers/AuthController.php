<?php


namespace app\controllers;


use app\Core\Application;
use app\Core\Controller;
use app\Core\middlewares\AuthMiddleware;
use app\Core\Request;
use app\Core\Response;
use app\models\Device;
use app\models\Invoice;
use app\models\Licence;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
        $this->registerMiddleware(new AuthMiddleware(['register']));
        $this->registerMiddleware(new AuthMiddleware(['home']));
        $this->registerMiddleware(new AuthMiddleware(['upload']));
        $this->registerMiddleware(new AuthMiddleware(['addlicence']));
        $this->registerMiddleware(new AuthMiddleware(['uploadlicence']));
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
    public function home(Request $request)
    {

        $invoice = new Invoice();

        $this->setLayout('main');
        return $this->render('home', [
            'model' => $invoice
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
        $this->setLayout('main');
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
        $invo->UserID=Application::getID();
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
                $odnosnik=implode(",",$file_name);
                $invo->odnosnik = $odnosnik;

                foreach($file_name as $key => $value){
                    move_uploaded_file($file_tmp[$key],"../public/files/".$file_name[$key]);
                    echo "Success";
                }

                if ($invo->save()){
                    Application::$app->session->setFlash('success', 'Faktura dodana');
                    Application::$app->response->redirect('/');
                }
            }
            else{
                print_r($errors);
            }

        }

    }

    public function tables(Request $request)
    {
        $invo = new Invoice();
        $role = Application::getRole();
        if ($role==0)
        {
        $data = $invo->findByUser(Application::getID());
            return $this->render('tables',['data' =>$data,'model'=>$invo]);
        }
        else {
        $data=$invo->findAll();
        return $this->render('tables',['data'=>$data, 'model' => $invo]);
        }

    }

    public function licences(Request $request)
    {
        $licence = new Licence();
        $role = Application::getRole();
        if ($role==0)
        {
        $data = $licence->findLicencesByUser(Application::getID());
            return $this->render('licence_table',['data' =>$data,'model'=>$licence]);
        }
        else{
            $data = $licence->findAllLicences();
            return $this->render('licence_table', ['data' => $data,'model'=>$licence]);
        }

    }

    public function addlicence(Request $request)
    {
        $licence = new Licence();

        $this->setLayout('main');
        return $this->render('licence', [
            'model' => $licence
        ]);


    }


    public function devices(Request $request)
    {
        $device = new Device();
        $role = Application::getRole();
        if ($role==0)
        {
            $data = $device->findLicensesByUser(Application::getID());

            return $this->render('device_table',['data' =>$data,'model'=>$device]);
        }
        else{
            $data = $device->findAllLicences();
            return $this->render('device_table', ['data' => $data,'model'=>$device]);
        }

    }

    public function adddevice(Request $request)
    {
        $device = new Device();

        $this->setLayout('main');
        return $this->render('device', [
            'model' => $device
        ]);


    }

    public function uploaddevice(Request $request)
    {
        $device = new Device();

        if ($request->isPost()){

            $device->loadData($request->getBody());
            $device->UserID = Application::getID();
            if ($device->save()){
                Application::$app->session->setFlash('success', 'Device added');
                Application::$app->response->redirect('/devices');

            }

            return $this->render('device', [
                'model' => $device
            ]);
        }

    }

    public function delete(Request $request)
    {
        if ($_GET['table'] == "licences") $obj = new Licence();
        elseif ($_GET['table'] == "documents") $obj = new Invoice();
        elseif ($_GET['table'] == "devices") $obj = new Device();
        $obj->deleteById($_GET['id']);
        Application::$app->session->setFlash('success', 'Usunięto rekord typu '.$_GET['table']);
        Application::$app->response->redirect('/'.$_GET['table']);
    }
    public function edit(Request $request)
    {
        if($_POST['action']=='invoice') {
            $invo = new Invoice();
            if ($request->isPost()) {
                print_r($request->getBody());
                $invo->loadData($request->getBody());

                if ($invo->edit($_POST['id'])) {
                    Application::$app->session->setFlash('success', 'Faktura edytowana');
                    Application::$app->response->redirect('/');

                }

                return $this->render('tables', [
                    'model' => $invo
                ]);
            }
        }
        elseif ($_POST['action']=='licence')
        {
            $licence= new Licence();
            if($request->isPost())
            {
                $licence->loadData($request->getBody());
                if($licence->edit($_POST['id']))
                {
                    Application::$app->session->setFlash('success', 'Licencja edytowana');
                    Application::$app->response->redirect('/licences');
                }
                return $this->render('licences', [
                    'model' => $licence
                ]);
            }
        }
        elseif($_POST['action'] == 'devices')
        {
            $dev = new Device();
            if($request->isPost())
            {
                $dev->LoadData($request->getBody());
                if($dev->edit($_POST['id']))
                {
                    Application::$app->session->setFlash('success', 'Sprzęt edytowana');
                    Application::$app->response->redirect('/devices');
                }
                return $this->render('devices', [
                    'model' => $dev
                ]);
            }
        }

    }

    public function uploadlicence(Request $request)
    {
        $licence = new Licence();

        if ($request->isPost()){

            $licence->loadData($request->getBody());
            $licence->UserID = Application::getID();
            if ($licence->save()){
                Application::$app->session->setFlash('success', 'Licence added');
                Application::$app->response->redirect('/licences');

        }

            return $this->render('licence', [
                'model' => $licence
            ]);
        }

    }
}