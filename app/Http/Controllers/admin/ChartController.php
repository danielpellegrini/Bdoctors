<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Review;
use App\Vote;
use Redirect, Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Mail\Events\MessageSending;

class ChartController extends Controller
{
    public function reviewsChart()
    {
        $user = Auth::user();
        $users = User::all();

        $record = Auth::user()->reviews()->select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(7))
        ->groupBy('day_name', 'day')
        ->orderBy('day')
        ->get();

        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);


        $record1 = Auth::user()->messages()->select(DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(7))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $data1 = [];
        foreach ($record1 as $row1) {
            $data1['label'][] = $row1->day_name;
            $data1['data'][] = (int) $row1->count;
        }

        $data1['chart1_data'] = json_encode($data1);


        $record2 = DB::table('user_vote')->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("YEAR(created_at) as year"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->where('user_id', '=', $user->id)
                ->groupBy('month_name', 'year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();

        $data2 = [];
        foreach ($record2 as $row2) {
            $data2['label'][] = $row2->month_name . ' ' . $row2->year;
            $data2['data'][] = (int) $row2->count;
        }

        $data2['chart2_data'] = json_encode($data2);

        $dataCollection = [$data, $data1, $data2];

        return view('chart-js', compact('user', 'users', 'dataCollection'));
    }

}
