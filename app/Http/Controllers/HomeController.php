<?php

namespace App\Http\Controllers;
use App\Models\Recommendation;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function indexDashboardClient()
    {
        // Recommendation::destroyIndex();
        // Recommendation::createIndex();
    //    Recommendation::indexAll();
        return view('dashboard.client');
    }
    public function indexDashboardLawyer()
    {
        return view('dashboard.lawyer');
    }
    public function indexDashboardSecretaria()
    {
        return view('dashboard.secretaria');
    }
    public function indexDashboardSupervisor()
    {
        return view('dashboard.supervisor');
    }

}
