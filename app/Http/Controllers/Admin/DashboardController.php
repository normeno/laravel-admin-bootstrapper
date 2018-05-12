<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    private $viewPath = 'admin.dashboard';
    protected $lava;

    public function __construct()
    {
        $this->lava = new Lavacharts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes  = $this->lava->DataTable();

        $votes->addStringColumn('Food Poll')
            ->addNumberColumn('Votes')
            ->addRow(['Tacos',  rand(1000,5000)])
            ->addRow(['Salad',  rand(1000,5000)])
            ->addRow(['Pizza',  rand(1000,5000)])
            ->addRow(['Apples', rand(1000,5000)])
            ->addRow(['Fish',   rand(1000,5000)]);

        $chart = $this->lava->BarChart('Votes', $votes);

        return view("{$this->viewPath}.index", compact('chart'));
    }

    public function registeredUser()
    {
        $temps = $this->lava->DataTable('America/Los_Angeles');

        $temps->addDateColumn('Date')
            ->addNumberColumn('Max Temp')
            ->addNumberColumn('Mean Temp')
            ->addNumberColumn('Min Temp');

        foreach(range(1, 30) as $day) {
            $temps->addRow(array(
                '2014-10-'.$day,
                rand(50,90),
                rand(50,90),
                rand(50,90)
            ));
        }

        return $temps->toJson();
    }
}
