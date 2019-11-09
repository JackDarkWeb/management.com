<?php


class AdminController extends Controller
{

    function index(){


        if ($_POST['ajax'] === 'true' || isset($_POST['submit'])) {


            $email = $this->email_or_phone('email');
            $pass  = $this->password('pass');


            if ($this->success() == true) {

                if($email === 'root@yahoo.fr' && $pass === '203f8d837e99a221cafc93d422249c9e91c27ee4'){

                    Session::set('email', $email);
                    Session::set('pass', $pass);

                }else{

                    $this->flash['message'] = "<div class='alert alert-danger text-center'>Email or Password is incorrect</div>";
                    $this->flash['error'] = false;
                }


            } else {
                $this->flash['message'] = "<div class='alert alert-danger text-center'>All fields are required</div>";
                $this->flash['error'] = false;
            }


            if ($_POST['ajax'] === 'true'){
                echo json_encode($this->flash);
                die();

            }else{
                return $this->view('admin.admin');
            }

        }

        return $this->view('admin.admin');

    }

    function dashboard(){

        $announce = new Announce();

        if(Session::check('email') && Session::check('pass')){

            $messages = ModelJson::findAll();
            $count    = ModelJson::count();


            $announces = $announce->get();

            //dd($all_messages);
            return $this->view('admin.admin-lock',[
                'messages' => $messages,
                'announces' => $announces,
                'count'    => $count,
            ]);
        }else
            Session::destroy('/admin');

        die();
    }

    function show(){

        if(isset($_POST['nbr'])){

            $id  = $_POST['nbr'];
            $answer = ModelJson::find($id);

            echo json_encode($answer);
        }
        die();

    }



    function store(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           dd($_POST);
        }
        return $this->view('admin.admin-lock');
    }







    function logout(){
        Session::destroy('/admin');
    }

}