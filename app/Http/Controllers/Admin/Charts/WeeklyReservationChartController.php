<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Reservation;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class WeeklyReservationChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyReservationChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();



        // RECOMMENDED. Set URL that the ChartJS library should call, to get its data using AJAX.
        $this->chart->load(backpack_url('charts/weekly-reservation'));
        $labels = [];
        for ($days_backwards = 0; $days_backwards < 7; $days_backwards++) {

            if ($days_backwards == 0) {
                $labels[] = "aujourd'hui";
            }else{
            $labels[] = $days_backwards.' jour avant';}
        }
        $client = [];

        for ($days_backwards = 0; $days_backwards <7; $days_backwards++) {
           if ($days_backwards == 1) {
            }
            $client[] = Reservation::whereDate('created_at', today()->subDays($days_backwards))->count();
        }
        $this->chart->labels($labels);
        $this->chart->dataset('reservation', 'line', $client)
                    ->color('rgb(255, 121, 0)')
                    ->backgroundColor('rgb(255, 121, 0)');
        // OPTIONAL
        // $this->chart->minimalist(false);
        // $this->chart->displayLegend(true);
    }



    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    // public function data()
    // {
    //     $users_created_today = \App\User::whereDate('created_at', today())->count();

    //     $this->chart->dataset('Users Created', 'bar', [
    //                 $users_created_today,
    //             ])
    //         ->color('rgba(205, 32, 31, 1)')
    //         ->backgroundColor('rgba(205, 32, 31, 0.4)');
    // }
}
