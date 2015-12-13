@extends('layouts.master')

<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 12/12/2015
 * Time: 6:44 PM
 */

    $landmarks = \App\Landmark::all();
    echo 'Here are all the landmarks:'."<br>";
    # loop through the Collection and access just the data
    foreach($landmarks as $landmark) {
        echo $landmark['name']."<br>";
    }

?>