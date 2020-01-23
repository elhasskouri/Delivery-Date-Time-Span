<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
        /* question 1 */

    function citys(){
        return City::all();
    }

        /* question 2 */

     function Deliverys(){
    	return Delivery::all();
    }

        /* question 3 */

    function DeliverysCityId($id){

    	  return  DB::table('deliveries')
            ->join('partneries', 'deliveries.id', '=', 'partneries.delivery_id')
            ->where('city_id', '=', $id)
            ->get();
    }

                /* question 4 */

    function TimeSpanPerDate(Request $request){

        $data  = $request->json()->all();
        $dates = $data['date'];


        $timespan =  DB::table('deliveries')
            ->join('dates', 'deliveries.id', '=', 'dates.delivery_id')
            ->whereIn('date', $dates)
            ->get();


       return  DB::table('deliveries')
            ->whereNotIn('span', $timespan->sapn)
            ->get();
    }

            /* question 5 */

    function DatePerTimeSpan(Request $request){

        $data  = $request->json()->all();
        $spans = $data['delivery-times'];

        $datespan =  DB::table('dates')
            ->join('deliveries', 'dates.id', '=', 'deliveries.delivery_id')
            ->whereIn('span', '=', $spans)
            ->get();


       return  DB::table('dates')
            ->whereNotIn('date', $datespan->date)
            ->get();

        
    }


        /* question 6 */

     function Q6($idCity,$numberDay){

        return  DB::table('dates')
            ->join('deliveries', 'dates.id', '=', 'deliveries.delivery_id')
            ->join('partneries', 'deliveries.id', '=', 'partneries.delivery_id')
            ->where(['City_id', '=', $idCity],['date', '<=','NOW()'])
            ->groupBy('date')
            ->orderBy('date')
            ->take($numberDay);
            ->get();

        
    }


    
}
	