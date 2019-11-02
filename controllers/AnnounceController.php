<?php


class AnnounceController extends Controller
{
    function index(){

        $announce = new Announce();

        $latest = $announce->latest( ['soft_delete','=', 0, 'AND', 'active', '=', 1],'ORDER BY created_at DESC', 0);


        $this->view('announces.index', [
            'latest' => $latest,
        ]);
    }

    function recent(){

        $recent_announce = new Announce();

        $latest = $recent_announce->latest( ['soft_delete','=', 0, 'AND', 'active', '=', 1],'ORDER BY created_at DESC', 0);


        $this->view('announces.recent_announce', [
            'latest' => $latest,
        ]);
    }
}