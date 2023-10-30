<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function pageDetail($slug) {
    $breadcrumbs = [
      ['url' => '#', 'label' => 'Pages', 'title' => 'Privacy Policy'],
    ];

    return view('pages.page', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }
}
