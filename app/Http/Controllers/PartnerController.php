<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
class PartnerController extends Controller
{
    function DeliverysParIdCity($id){
    	 return Delivery::all();
    	
    }
}
