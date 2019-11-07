<?php


class Announce extends Model
{

    /**
     * @param $title
     * @return string
     */
    function slug($title){

        return Helper::slug($title);
    }
}