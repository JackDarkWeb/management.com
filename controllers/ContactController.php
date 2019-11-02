<?php


class ContactController extends Controller
{
    function index(){

        if ($_POST['ajax'] === 'true' || isset($_POST['submit'])) {

            $messages = [];

            $messages['id'] = date('dmYHis');
            $messages['first'] = $this->text('first_name');
            $messages['last'] = $this->text('last_name');
            $messages['email'] = $this->email('email');
            $messages['subject'] = $this->text('subject');
            $messages['message'] = $this->text('message');
            $messages['date'] = date('d-m-Y H:i:s');


            if ($this->success() == true) {


                // I retrieve all messages json
                $data = file_get_contents(db_message);

                //I convert the Json into a table so I can add a new mew message
                $data = json_decode($data, true);
                $data[] = $messages;

                //Convert back to Json
                $data = json_encode($data);
                file_put_contents(db_message, $data);

                $this->flash['message'] = "<div class='alert alert-success text-center'>Your message has been sent</div>";
            } else {
                $this->flash['message'] = "<div class='alert alert-danger text-center'>All fields are required</div>";
                $this->flash['error'] = false;
            }


            if ($_POST['ajax'] === 'true'){
                echo json_encode($this->flash);
                die();

            }else{
                return $this->view('home.contact');
            }

        }

        return $this->view('home.contact');
    }


}