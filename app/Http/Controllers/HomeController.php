<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function home () {
    return view('pages.home');
  }

  public function about () {
    $breadcrumbs = [
      ['url' => '/', 'label' => 'Home'],
      ['url' => '#', 'label' => 'About'],
    ];
    return view('pages.about', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  public function contact () {
    $breadcrumbs = [
      ['url' => '/', 'label' => 'Home'],
      ['url' => '#', 'label' => 'Contact'],
    ];

    return view('pages.contact', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }

  public function feedback () {
    return view('pages.contact');
  }

  public function notFound () {
    return view('pages.404');
  }
}
