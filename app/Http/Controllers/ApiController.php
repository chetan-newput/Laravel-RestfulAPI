<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  use ApiResponser;

  public function __construct()
  {
  	$this->middleware('auth:api');
  }

  protected function allowedAdminAction()
  {
  	if(Gate::denies('admin-action')){
  		throw new AuthorizationException('this action is unauthorized');
  	}
  }
}
