<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	 /**
	  * check the specified permission - abort to 404 if not granted
	  **/
	protected function check_permission($perm = '') {

		if (! auth()->user()->can($perm)) {
			return abort(404);
		}

		return true;

	} // check_permission

} // class
