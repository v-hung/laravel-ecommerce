<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
  public function profile () {
    $breadcrumbs = [
      ['url' => '#', 'label' => 'Contact'],
    ];

    return view('pages.account.account', [
      'breadcrumbs' => $breadcrumbs
    ]);
  }
}
