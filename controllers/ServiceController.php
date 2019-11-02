<?php


class ServiceController extends Controller
{
    function index(){
        return $this->view('home.service');
    }
}