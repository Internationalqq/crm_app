<?php

namespace App\Http\Controllers\Contractor;

use App\Http\Controllers\Controller;
use App\Services\Contractor\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
