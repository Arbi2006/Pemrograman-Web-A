<?php

class HomeController extends Controller
{
    public function index(): void
    {
        Middleware::auth();

        $this->view('dashboard/index', [
            'title' => 'Dashboard'
        ]);
    }
}

