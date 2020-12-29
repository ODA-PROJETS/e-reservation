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
        $salles = Salle::all();
        return view('pages.recherche', compact('salles'));
    }

    public function detail(Request $request){

        $salle=Salle::find($request->salle_id);
        $debut=$request->debut;
        $fin=$request->fin;
        $reservations = Reservation::where('salle_id',$salle->id)->whereIn('date_start',[$debut,$fin])->OrwhereIn('date_end',[$debut,$fin])->get();
        // dd($reservations);
        return view('pages.form-reservation', compact('salle','debut','fin','reservations'));
    }

    public function reservation(Request $request){
        $user = \Auth::user();
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;
        $hre_debut = $request->heure_debut;
        $hre_fin = $request->heure_fin;
        $motif = $request->motif;
        $detail = $request->detail;
        $salle_id=$request->salle_id;

        $departement_id= Departement::where('user_id',$user->id)->first()->id;
        // dd($hre_debut,$hre_fin,$motif);
        if($hre_debut=="" || $hre_fin=="" || $motif=="" ){
            session()->flash('alerte', 'veillez renseignez tous les champs');
            session()->flash('type', 'error');

            return back()->withInput()->withErrors([
                'error' => 'veillez renseignez tous les champs !',
            ]);
        }

        Reservation::insert(['date_start'=>$date_debut,'hour_start'=>$hre_debut,'date_end'=>$date_fin,'hour_end'=>$hre_fin,'salle_id'=>$salle_id,'status_id'=>1,'departement_id'=>$departement_id]);
        return redirect()->route('reservationOk');
        // dd($request);

    }

    public function detailReservation(Reservation $reservation){
        return view('pages.detail_reservation',compact('reservation'));
    }
    public function reservationOk(){
        return View('pages.reservationOk');
    }

    public function detail2(Salle $salle,$debut,$fin){
        return view('pages.form-reservation', compact('salle','debut','fin'));
    }
    public function store(Request $request)
    {

    }
}
