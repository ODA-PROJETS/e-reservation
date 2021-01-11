<?php

namespace App\Http\Controllers;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Salle;
use App\Mail\sendMail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

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
        return view('pages.reserver', compact('salles'));
    }

    public function recherche(Request $request){
            $words= "%".$request->q."%";
            $salles=Salle::where('name','like',$words)->orWhere('description','like',$words)->get();
            // dd($salle);
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
        $salle = Salle::find($salle_id);
        $departement_id= Departement::where('user_id',$user->id)->first()->id;
        // dd($hre_debut,$hre_fin,$motif);
        if($hre_debut=="" || $hre_fin=="" || $motif=="" ){
            session()->flash('alerte', 'veillez renseignez tous les champs');
            session()->flash('type', 'error');

            return back()->withInput()->withErrors([
                'error' => 'veillez renseignez tous les champs !',
            ]);
        }

        $reservation_id=Reservation::insertGetId(['date_start'=>$date_debut,'hour_start'=>$hre_debut,'date_end'=>$date_fin,'hour_end'=>$hre_fin,'salle_id'=>$salle_id,'status_id'=>1,'departement_id'=>$departement_id,'motif'=>$motif,'others'=>$detail]);
        $reservation = Reservation::find($reservation_id);
        foreach(\DB::table('salles_has_users')->where('salle_id',$salle_id)->get() as $v){
            $user = User::find($v->user_id);
            $data = [
                'subject' => 'Nouvelle reservation sur la plateforme e-reservation',
                'from' => 'virtus225one@gmail.com',
                'from_name' => 'e-reservation',
                'template' => 'mail.reservation',
                'info' => [
                    'user' => $user,
                    'salle' =>$salle,
                    'date' => now(),
                    'reservation'=>$reservation,
                    'lien' => 'e-reservation.me/admin',
                    'nom_lien' => 'valider'
                ]
            ];
            $details['type_email'] = 'reservation';
            $details['email'] = "oda@orange.ci";
            $details['data'] = $data;


            Mail::to($user->email)->send(new sendMail($details));
        }



        // new \App\Mail\sendMail($details);

        return redirect()->route('reservationOk');
        // dd($request);

    }
    public function approbation(Reservation $reservation,User $user,$approuve){

        if($approuve==1){
            $nbre_valideur = count(\DB::table('salles_has_users')->where('salle_id',$reservation->salle_id)->get());
            // $niveau = ($reservation->niveau_validation+1/$nbre_valideur)*100;
            if($reservation->niveau_validation<$nbre_valideur){
                $reservation->update(array('niveau_validation'=>$reservation->niveau_validation+1));
                $msg = "Merci d'avoir approuvé la reservation !";
            }
            else  $msg = "Reservation deja approuvé !";
            session()->flash('alerte', 'reservation approuvée !');
            session()->flash('type', 'success');
        }
        else if($approuve==0){
            $reservation->update(array('status_id'=>5));

            $msg = "la reservation a bien été annulée !";
            session()->flash('alerte', 'reservation annulée !');
            session()->flash('type', 'success');
            $user_id = Departement::where('id',$reservation->departement_id)->first()->user_id;
            $user = User::find($user_id);
            $salle = Salle::find($reservation->salle_id);
            $data = [
                'subject' => 'Nouvelle reservation sur la plateforme e-reservation',
                'from' => 'virtus225one@gmail.com',
                'from_name' => 'e-reservation',
                'template' => 'mail.annuleReservation',
                'info' => [
                    'user' => $user,
                    'salle' =>$salle,
                    'date' => now(),
                    'reservation'=>$reservation,
                    'lien' => 'e-reservation.me/admin',
                    'nom_lien' => 'valider'
                ]
            ];
            $details['type_email'] = 'reservation';
            $details['email'] = "oda@orange.ci";
            $details['data'] = $data;

            Mail::to($user->email)->send(new sendMail($details));
        }
        return view('pages.approuver', compact('msg'));

    }
    public function detailReservation(Reservation $reservation){
        $user = \Auth::user();
        $departement= Departement::where('user_id',$user->id)->first();
        $departement_id = $departement ? $departement->id : 0;
        $nbre_reservations_termines = Reservation::where("departement_id",$departement_id)->where('status_id',4)->count();
        $nbre_reservations_cours = Reservation::where("departement_id",$departement_id)->whereIn('status_id',[1,2,3])->count();


        return view('pages.detail_reservation',compact('reservation','nbre_reservations_cours','nbre_reservations_termines'));
    }
    public function reservationOk(){
        return View('pages.reservationOk');
    }

    public function detail2(Salle $salle,$debut,$fin){
        return view('pages.form-reservation', compact('salle','debut','fin'));
    }
    public function annuler(Reservation $reservation)
    {
        $reservation->update(['status_id'=>5]);
        return redirect()->route('index', compact('reservation'));
    }

    public function delete(Reservation $reservation){
        $reservation->delete();
        return redirect()->back();
    }

}

