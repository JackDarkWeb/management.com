<?php


class AboutController extends  Controller
{
    function index(){
        return $this->view('home.about');
    }
}