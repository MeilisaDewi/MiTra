<?php

namespace App\Controllers;

use \App\Models\BookModel;

class Container extends BaseController
{
    public function index()
    {
        
        $data = [
            'title' => 'Container',
        ];
        return view('container', $data);
    }
}