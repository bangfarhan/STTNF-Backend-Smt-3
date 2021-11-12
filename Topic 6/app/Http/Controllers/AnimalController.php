<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $data = array();

    public function __construct()
    {
        $this->data = ["Monkey", "Spider", "Elephant","Panda", "Ferret"];
    }

    function index()
    {
        return $this->data;
    }

    function create(Request $request)
    {
        $nama = $request->nama;
        array_push($this->data, $nama);
        return $this->data;

    }

    function update(Request $request, $id)
    {
        $nama = $request->nama;
        $replacements = array($id => $nama);
        $this->data = array_replace($this->data, $replacements);
        return $this->data;

    }

    function destory($id)
    {
        unset($this->data[$id]);
        return $this->data;
    }
}