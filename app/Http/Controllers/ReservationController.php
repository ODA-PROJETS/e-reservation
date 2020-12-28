<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Support\Facades\Validator;
class ReservationController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $departement= Departement::where('user_id',$user->id)->first();
        $departement_id = $departement ? $departement->id : 0;
        $reservations= Reservation::where("departement_id",$departement_id)->where('status_id','<>',4)->get();
        $nbre_reservations_termines = Reservation::where("departement_id",$departement_id)->where('status_id',4)->count();
        $nbre_reservations_cours = Reservation::where("departement_id",$departement_id)->whereIn('status_id',[1,2,3])->count();

        return view('pages.index',compact('reservations','nbre_reservations_cours','nbre_reservations_termines'));
        // return response()->json(
        //     $this->instance->newQuery()->get(),
        //     200
        // );
    }

    public function history (){
        $user = \Auth::user();
        $departement_id= Departement::where('user_id',$user->id)->first()->id;

        $reservations_termines = Reservation::where("departement_id",$departement_id)->where('status_id',4)->get();


        return view('pages.history', compact('reservations_termines'));
    }

    public function salle(){
        $salle = Salle::all();
        return view('pages.reserver', compact('salle'));
    }

    public function detail(Salle $salle){
        return view('pages.form-reservation', compact('salle'));
    }
    
    public function detail2(Salle $salle,$debut,$fin){
        return view('pages.form-reservation', compact('salle','debut','fin'));
    }
    public function store(Request $request)
    {

    }
}
