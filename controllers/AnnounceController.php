<?php


class AnnounceController extends Controller
{
    function index(){

        $announce = new Announce();

        $announces = $announce->get( ['active', '=', 1]);

        //dd($announces);die();
        //dd(4*($this->request->page-1). ', 4');die();

        //dd(Helper::slug($announces[2]->title));die();

        $this->view('announces.index', [
            'announces' => $announces,
        ]);
    }

    function recent(){

        $recent_announce = new Announce();

        $latest = $recent_announce->latest( ['active', '=', 1], '0, 4');

        //dd($recent_announce->slug($latest[0]->title));


        $this->view('announces.recent_announce', [
            'latest' => $latest,
        ]);
    }


    function read($id = null, $slug = null){

        //dd($slug);die();

        $Announce = new Announce();


        if($slug == null || $id == null){

            $latest = $Announce->latest( ['active', '=', 1], '0, 4');

            $this->view('announces.recent_announce',[
                'latest' => $latest,
            ]);
        }

        $announce = $Announce->find(['id', '=', $id]);

        if(!isset($announce)){
            $this->e404("Product  not found");
        }

        if($slug !== $announce->slug){
            $this->redirect('announce/read', ['id' => $id, 'slug' => $announce->slug], 301);
        }


        $similar = $Announce->latest(['active', '=', 1, 'AND', 'category','=', $announce->category], '0, 3');

        $this->view('announces.show',[
            'announce' => $announce,
            'similar'  => $similar
        ]);
    }




    function category(){

        //dd($this->request->params);
        $param = urldecode($this->request->params[0]);


        $announce = new Announce();

        /*$test = $announce->test(['category', '=', $param]);
        dd($test);die();*/

        $categories = $announce->builderGet(['active', '=', 1, 'AND', 'category', '=', $param]);

        //dd($categories[0]->title);die();

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