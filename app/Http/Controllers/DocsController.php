<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function show($package_name,$version="v1.0.0",$slug = 'index')
    {
        return view('components.layouts.docs', [
            'title' => ucfirst(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'package_name'=>$package_name,
            "version"=>$version
        ]);
    }
}