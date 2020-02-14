<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class LayoutController extends Controller
{
    /**
     * @return Response
     */
    public function layout(): Response
    {
        return $this->response->view('layout');
    }
}
