<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Bus\DispatchesJobs;
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
<<<<<<< HEAD
    use AuthorizesRequests, ValidatesRequests;
=======
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
}
