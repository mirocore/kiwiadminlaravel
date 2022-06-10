<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use App\Models\Cliente;
use App\Models\Renovacion;
use App\Models\Hosting;
use App\Models\Dominio;
use App\Models\Ssl;
use App\Models\Subtrabajo;
use Illuminate\Http\Request;

class RenovacionesController extends Controller
{
    public function formNuevo(Trabajo $trabajo)
    {
        
        // CLIENTE
        $cliente = Cliente::where('id_cliente', '=', $trabajo->id_cliente)->get();
        if(count($cliente) == 0){
            $cliente = null;
        }else{
            $cliente = $cliente[0];
        }
        
        // IMPORTE
        $subtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        $importe = 0;
        if(count($subtrabajos) > 0){
            foreach($subtrabajos as $subtrabajo){
                $importe += $subtrabajo->importe_subtrabajo;
            }
        }        
        
        return view('renovaciones/form-nuevo', compact('trabajo', 'importe', 'cliente'));
    }
    
    public function crear(Trabajo $trabajo, Request $request)
    {
        // DATOS RECIBIDOS
        $data = $request->input();
        $data['id_trabajo'] = $trabajo->id_trabajo;
        
        
        // GUARDO RENOVACION
        $nuevaRenovacion = new Renovacion;
        $nuevaRenovacion->notas_renovacion = $data['notas_renovacion'];
        $nuevaRenovacion->id_trabajo = $data['id_trabajo'];
        
        //HOSTING
        if($data['nombre_hosting'] || $data['importe_hosting']){
            $hosting = new Hosting;
            $hosting->nombre_hosting = $data['nombre_hosting'];
            $hosting->importe_hosting = $data['importe_hosting'];
            $hosting->save();
            $nuevaRenovacion->id_hosting = $hosting->id_hosting;
        }

        //DOMINIO
        if($data['nombre_dominio'] || $data['importe_dominio']){
            $dominio = new Dominio;
            $dominio->nombre_dominio = $data['nombre_dominio'];
            $dominio->importe_dominio = $data['importe_dominio'];
            $dominio->save();
            $nuevaRenovacion->id_dominio = $dominio->id_dominio;
        }
        
        //SSL
        if($data['importe_ssl']){
            $ssl = new Ssl;
            $ssl->importe_ssl = $data['importe_ssl'];
            $ssl->save();
            $nuevaRenovacion->id_ssl = $ssl->id_ssl;
        }        
        
        $nuevaRenovacion->save();
        
        
        return redirect()->route('trabajos.index')->with('success', 'Los datos de renovación del trabajo ' . $trabajo->nombre . ' han sido añadidos a la base de datos.');
    }
    
    public function borrar(Trabajo $trabajo)
    {
        $renovacion = Renovacion::with('hosting', 'dominio', 'ssl')->where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        if(count($renovacion) > 0){
            $renovacion = $renovacion[0];
        }
        
        if($renovacion){
            // TIENE HOSTING?
            if($renovacion->hosting){
                $renovacion->hosting->delete();
            }
            // TIENE DOMINIO?
            if($renovacion->dominio){
                $renovacion->dominio->delete();
            }
            // TIENE SSL?
            if($renovacion->ssl){
                $renovacion->ssl->delete();
            }
            $renovacion->delete();
        }
        
        
        return redirect()->route('trabajos.index')->with('success', 'Los datos de renovación han sido borrados de la base de datos.');
    }
    
    public function formEditar(Trabajo $trabajo)
    {
        // RENOVACION
        $renovacion = Renovacion::with('hosting', 'dominio', 'ssl')->where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        $renovacion = $renovacion[0];
        
        
        // CLIENTE
        $cliente = Cliente::where('id_cliente', '=', $trabajo->id_cliente)->get();
        if(count($cliente) == 0){
            $cliente = null;
        }else{
            $cliente = $cliente[0];
        }
        
        // IMPORTE
        $subtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        $importe = 0;
        if(count($subtrabajos) > 0){
            foreach($subtrabajos as $subtrabajo){
                $importe += $subtrabajo->importe_subtrabajo;
            }
        } 
        
        return view('renovaciones/form-editar', compact('trabajo', 'importe', 'cliente', 'renovacion'));
    }
    
    public function editar(Trabajo $trabajo, Request $request)
    {
        // DATOS RECIBIDOS
        $input = $request->input();
        
        // BUSCO LA RENOVACION
         $renovacion= Renovacion::with('hosting', 'dominio', 'ssl')->where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        $renovacion = $renovacion[0];

        
        //HOSTING
        if($input['hosting']['nombre_hosting'] || $input['hosting']['importe_hosting']){
            // RECIBÍ DATOS PARA EDITAR
                if($renovacion['hosting']){
                    // HABIA UN SSL CREADO
                    $renovacion['hosting']['nombre_hosting'] = $input['hosting']['nombre_hosting'];
                    $renovacion['hosting']['importe_hosting'] = $input['hosting']['importe_hosting'];
                    $renovacion['hosting']->save();
                }else{
                    // NO HABIA UN SSL CREADO
                    $nuevoHosting = new Hosting;
                    $nuevoHosting->nombre_hosting = $input['hosting']['nombre_hosting'];
                    $nuevoHosting->importe_hosting = $input['hosting']['importe_hosting'];
                    $nuevoHosting->save();
                    $renovacion->id_hosting = $nuevoHosting->id_hosting;
                    $renovacion->save();
                }
        }else{
            //NO HAY DATOS RECIBIDOS
            if($renovacion['hosting']){
                // HAY UN HOSTING PREVIO
                $renovacion['hosting']->delete();
            }
        }
        
        //DOMINIO
        if($input['dominio']['nombre_dominio'] || $input['dominio']['importe_dominio']){
            // RECIBÍ DATOS PARA EDITAR
                if($renovacion['dominio']){
                    // HABIA UN SSL CREADO
                    $renovacion['dominio']['nombre_dominio'] = $input['dominio']['nombre_dominio'];
                    $renovacion['dominio']['importe_dominio'] = $input['dominio']['importe_dominio'];
                    $renovacion['dominio']->save();
                }else{
                    // NO HABIA UN SSL CREADO
                    $nuevoDominio = new Dominio;
                    $nuevoDominio->nombre_dominio = $input['dominio']['nombre_dominio'];
                    $nuevoDominio->importe_dominio = $input['dominio']['importe_dominio'];
                    $nuevoDominio->save();
                    $renovacion->id_dominio = $nuevoDominio->id_dominio;
                    $renovacion->save();
                }
        }else{
            //NO HAY DATOS RECIBIDOS
            if($renovacion['dominio']){
                // HAY UN HOSTING PREVIO
                $renovacion['dominio']->delete();
            }
        }
        
        // SSL
        if($input['ssl']['importe_ssl']){
            // RECIBÍ DATOS PARA EDITAR
                if($renovacion['ssl']){
                    // HABIA UN SSL CREADO
                    $renovacion['ssl']['importe_ssl'] = $input['ssl']['importe_ssl'];
                    $renovacion['ssl']->save();
                }else{
                    // NO HABIA UN SSL CREADO
                    $nuevoSSL = new Ssl;
                    $nuevoSSL->importe_ssl = $input['ssl']['importe_ssl'];
                    $nuevoSSL->save();
                    $renovacion->id_ssl = $nuevoSSL->id_ssl;
                    $renovacion->save();
                }
        }else{
            //NO HAY DATOS RECIBIDOS
            if($renovacion['ssl']){
                // HAY UN HOSTING PREVIO
                $renovacion['ssl']->delete();
            }
        }
        
        
        
        // EDITO
        $renovacion->update($input);
        
        return redirect()->route('trabajos.index')->with('success', 'Los datos de Hosting/Dominio del trabajo '.  $trabajo->nombre .'han sido actualizados.');
    }
    
}
