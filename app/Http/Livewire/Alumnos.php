<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;

class Alumnos extends Component
{
    public $alumnos;
    public $alumno=[];
    public $showModal=false;
    public $alumnoId;
    public $successMsg = '';

    protected $rules = [
        'alumno.nombre' => 'required',
        'alumno.apellido_pat' => 'required',
        'alumno.apellido_mat' => 'nullable',
        'alumno.promedio'=> 'required',
    ];
    protected $messages = [
        'alumno.nombre.required' => 'El nombre de la persona es requerido.',
        'alumno.apellido_pat.required' => 'El apellido de la persona es requerido',
        'alumno.promedio.required' =>'Promedio requerido',
    ];


    public function render()
    {
        $this->alumnos=Alumno::all();
        return view('livewire.alumnos');
    }

    public function crar(){
        $this->alumno['promedio']=100;
        $this->showModal = true;
    }

    public function guardar(){
        $this->validate();
        if (!is_null($this->alumnoId)) {
            $this->alumno->save();
            $mensaje="Alumno editado con éxito";
        } else {
            Alumno::create($this->alumno);
            $mensaje="Alumno creado con éxito";
        }
        $this->alumnos=Alumno::all();
        $this->alumnoId=null;
        $this->alumno=[];
        $this->showModal = false;
        $this->successMsg = $mensaje;
    }
    
    public function editar($alumno_id){   
        $this->alumno=Alumno::find($alumno_id);
        $this->alumnoId=$alumno_id;
        $this->showModal = true;
    }
    public function borrar($alumno_id){
        $alumno=Alumno::find($alumno_id);
        if($alumno){
            $alumno->delete();
            $mensaje="Alumno borrado con éxito";
        }
        $this->alumnos=Alumno::all();
        $this->showModal = false;
        $this->successMsg = $mensaje;
    }
    public function close(){
        $this->showModal = false;
    }
}
