<?php


namespace App\Http\Controllers\Backend;


class DashboardController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view("backend.index");
    }
}
