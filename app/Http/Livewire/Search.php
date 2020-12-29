<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use Livewire\Component;

class Search extends Component
{
    public String $query="lol";
    public $salle=[];

    public function updatedQuery(){
        if(strlen($this->query)>2){
            $words= "%".$this->query."%";
            $this->salle=Salle::where('name','like',$words)->orWhere('description','like',$words)->get();
            dd($this->salle);
        }

    }
    public function render()
    {
        return view('livewire.search');
    }
}
