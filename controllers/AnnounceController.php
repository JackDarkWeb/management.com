<?php


class AnnounceController extends Controller
{
    function index(){

        $announce = new Announce();

        $announces = $announce->builderGet( ['soft_delete','=', 0, 'AND', 'active', '=', 1]);

        //dd($announces);die();
        //dd(4*($this->request->page-1). ', 4');die();

        $this->view('announces.index', [
            'announces' => $announces,
        ]);
    }

    function recent(){

        $recent_announce = new Announce();

        $latest = $recent_announce->latest( ['soft_delete','=', 0, 'AND', 'active', '=', 1],'ORDER BY created_at DESC', 0);


        $this->view('announces.recent_announce', [
            'latest' => $latest,
        ]);
    }


    function read($id = null, $slug = null){

        $announce = new Announce();

        if($slug == null || $id == null){

            $latest = $announce->latest( ['soft_delete','=', 0, 'AND', 'active', '=', 1],'ORDER BY created_at DESC', 0);
            $this->view('announces.recent_announce',[
                'latest' => $latest,
            ]);
        }

        $announce = $announce->find(['id', '=', $id]);

        if(!isset($announce)){
            $this->e404("Product  not found");
        }

        if($slug !== $announce->slug){

            //dd($posts->slug);die();
            $this->redirect('announce/read', ['id' => $id, 'slug' => $announce->slug], 301);
        }

        $this->view('announces.show',[
            'announce' => $announce,
        ]);
    }

    function category(){

        //dd($this->request->params);
        $param = $this->request->params[0];

        $announce = new Announce();
        $categories = $announce->builderGet(['active', '=', 1, 'AND', 'category', '=', $param]);

        return $this->view('announces.category',[
            'categories' => $categories
        ]);
    }






    function search_announces(){

        $announce = new Announce();

        if($_POST['ajax'] == true){

            $str = $this->post('string');
            $get = $announce->search('title', $str);

            $data = [];

            if(count($get) > 0){


                foreach ($get as $value){

                    $data[] ='<li><a href="'.Router::url('announce/read', ['id' => $value->id, 'slug' => $value->slug]).'">'. $value->title.'</a> </li>';

                }

            }else{

                $data[] = "<li class='text-danger'>No result found</li>";
            }

            echo json_encode($data);

        }
        die();
    }
}