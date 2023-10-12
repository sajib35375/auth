<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DateTime;

class ReportController extends Controller
{
    public function allReports(){
        return view('admin.report.all_report');
    }
    public function searchReportsByDate(Request $request){
        $data = new DateTime($request->search_date);
        $dateFormat = $data->format('d F Y');
        $orders = Order::where('order_date',$dateFormat)->latest()->get();
        return view('admin.report.view_report',compact('orders'));
    }
    public function searchReportsByMonth(Request $request){
        $year = new DateTime($request->search_year);
        $yearFormat = $year->format('Y');
        $month = new DateTime($request->search_month);
        $monthFormat = $month->format('F');
        $orders = Order::where('order_year',$yearFormat)->where('order_month',$monthFormat)->latest()->get();
        return view('admin.report.view_report',compact('orders'));
    }

    public function searchReportsByYear(Request $request){
        $year = new DateTime($request->year_name);
        $yearFormat = $year->format('Y');

        $orders = Order::where('order_year',$yearFormat)->latest()->get();
        return view('admin.report.view_report',compact('orders'));
    }







}
