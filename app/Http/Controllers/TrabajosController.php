<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use App\Models\Trabajo;
use App\Models\Subtrabajo;
use App\Models\Servicio;
use App\Models\Pago;
use App\Models\Cobro;
use App\Models\Renovacion;
use App\Models\Hosting;
use App\Models\Dominio;
use App\Models\Ssl;
use Illuminate\Http\Request;

class TrabajosController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::with('clientes')->orderBy('id_trabajo', 'desc')->paginate(10);
        foreach($trabajos as $trabajo){
            // IMPORTE
            $importe = 0;
            $subtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
            foreach($subtrabajos as $subtrabajo){
                $importe += $subtrabajo->importe_subtrabajo;
            }
            $trabajo['importe'] = $importe;
            // COBRO
            $cobrado = 0;
            $cobros = Cobro::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
            foreach($cobros as $cobro){
                $cobrado += $cobro->importe_cobro;
            }
            $trabajo['cobrado'] = $cobrado;
            // PAGOS
            $pagos = Pago::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
            $deuda_empleado = false;
            foreach($pagos as $pago){
                if($pago->estado_pago == 'no'){
                    $deuda_empleado = true;
                }
            }
            $trabajo['deuda_empleado'] = $deuda_empleado;
            
            // RENOVACIONES
            $renovaciones = Renovacion::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
            $trabajo['renovacion'] = $renovaciones;
            

        }
        return view('trabajos/listado', compact('trabajos'));
    }
    
    
    
    
    
    
    public function ver($id)
    {
        // TRABAJOS
        $trabajo = Trabajo::with('servicios')->findOrFail($id);
        
        // CLIENTES
        if($trabajo->id_cliente == null){
            $cliente = false;
        }else{
            $cliente = Cliente::findOrFail($trabajo->id_cliente);
        }
        
        $subtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        
        // PAGOS
        $pagos = Pago::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        foreach($pagos as $pago){
            $pago->empleado = Usuario::where('id_usuario', '=', $pago->id_usuario)->get();
        }
        
        // COBROS
        $cobros = Cobro::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        
        // EMPLEADOS
        $empleados = [];
        if(count($pagos) > 0){
            $usuarios = Usuario::all();
            foreach($pagos as $pago){
                foreach($usuarios as $usuario){
                    if($usuario->id_usuario == $pago->id_usuario){
                        $empleados[] = $usuario;
                    }
                }
            }
        }
        
        // RENOVACIONES
        $renovacion = Renovacion::with('hosting', 'dominio', 'ssl')->where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        if(count($renovacion) >0){
            $renovacion = $renovacion[0];
        }else{
            $renovacion = null;
        }
        return view('trabajos/ver', compact('trabajo', 'cliente', 'subtrabajos', 'pagos', 'cobros' , 'empleados', 'renovacion'));
    }
    
    
    
    
    
    
    public function formNuevo()
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        
        return view('trabajos/form-nuevo', compact('clientes', 'usuarios', 'servicios'));
    }
    
    
    
    
    
    
    public function crear(Request $request)
    {
        // PIDO LA DATA DEL FORM
        $newData = $request->input();
        $subtrabajos = $request->subtrabajo;
        

        
        
        // VALIDACION
        $request->validate(Trabajo::$rules, Trabajo::$messages);        
        
        //DATOS DEL CLIENTE
        if($request->id_cliente){
            // SE SELECCIONÓ EL ID DEL CLIENTE
            $dataTrabajo['id_cliente'] = $request->id_cliente;
        }elseif(!$request->id_cliente && $request->nombre_cliente == null && $request->email_cliente == null){
            $dataTrabajo['id_cliente'] = null;
        }else{
            // SE INGRESÓ EL CLIENTE MANUALMENTE
            $dataCliente['nombre'] = $request->nombre_cliente;
            $dataCliente['email'] = $request->email_cliente;
            $dataCliente['telefono'] = $request->telefono_cliente;
            $dataCliente['fecha_contratacion'] = $request->fecha_contratacion;
            $dataCliente['notas_contratacion'] = $request->notas_cliente;
            // REGISTRO AL CLIENTE
            $cliente = Cliente::create($dataCliente);
            $dataTrabajo['id_cliente'] = $cliente->id_cliente;
        }
        
        // DATOS PARA EL TRABAJO
        $dataTrabajo['nombre'] = $request->nombre;
        $dataTrabajo['estado'] = $request->estado;
        $dataTrabajo['fecha_contratacion'] = $request->fecha_contratacion;
        $dataTrabajo['fecha_alta'] = $request->fecha_alta;
        $dataTrabajo['descripcion'] = $request->descripcion;
        
        // NUEVO REGISTRO DEL TRABAJO
        $trabajo = Trabajo::create($dataTrabajo);
        
        // SERVICIOS
        $trabajo->servicios()->attach($request->get('servicios'));
        
        // SUBTRABAJO
        if(count($request->subtrabajo) == 1 && $request->subtrabajo[0]["'importe_subtrabajo'"] == 0){
            // NO HAY SUBTRABAJOS QUE INGRESAR
        }else{
            foreach($subtrabajos as $subtrabajo){
                $dataSubtrabajo['nombre_subtrabajo'] = $subtrabajo["'nombre_subtrabajo'"];
                $dataSubtrabajo['importe_subtrabajo'] = $subtrabajo["'importe_subtrabajo'"];
                $dataSubtrabajo['id_trabajo'] = $trabajo->id_trabajo;
                $sub = Subtrabajo::create($dataSubtrabajo);
            }
        }
        
        // PAGO
        if($request->empleado_asignado){
            $pagos = $request->empleado_asignado;
            foreach($pagos as $pago){
                $pagoNuevo = new Pago;
                $pagoNuevo->id_usuario = $pago;
                $pagoNuevo->id_trabajo = $trabajo->id_trabajo;
                $pagoNuevo->estado_pago = 'no';
                $pagoNuevo->save();
            }
        }
        
                  
        
        
        // VUELVO AL LISTADO
        return redirect()->route('trabajos.index')->with('success', 'El trabajo ' . $trabajo->nombre . ' ha sido añadido a la base de datos.');
    }
    
    
    
    
    
    
    
    
    public function borrar($id)
    {      
        $trabajo = Trabajo::findOrFail($id);
        
        //RENOVACIONES
        $renovacion = Renovacion::with('hosting', 'dominio', 'ssl')->where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        if(count($renovacion) > 0){
            $renovacion = $renovacion[0];
        }else{
            $renovacion = new Renovacion;
            $renovacion->hosting = null;
            $renovacion->dominio = null;
            $renovacion->ssl = null;
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
        
        //BORRO LOS SUBTRABAJOS
        $subtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        foreach($subtrabajos as $sub){
            $sub->delete();
        }
        
        // BORRO LOS SERVICIOS    
        $trabajo->servicios()->detach();
        
        // BORRO LOS PAGOS
        $pagos = Pago::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        foreach($pagos as $pago){
            $pago->delete();
        }
        
        // BORRO TODOS LOS COBROS
        $cobros = Cobro::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        foreach($cobros as $cobro){
            $cobro->delete();
        }
        
        
        // BORRO EL TRABAJO
        $trabajo->delete();
        
        return redirect()->route('trabajos.index')->with('success', 'El trabajo ' . $trabajo->nombre . ' ha sido borrado del sistema');
    }
    
    
    
    
    
    
    public function formEditar(Trabajo $trabajo)
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        $servicios = Servicio::all();
        $subtrabajos = Subtrabajo::where('id_trabajo', "=", $trabajo->id_trabajo)->get();

        return view('trabajos/form-editar', compact('trabajo', 'clientes', 'usuarios', 'servicios', 'subtrabajos'));
    } 
    
    
    
    
    
    
    public function editar(Request $request, Trabajo $trabajo)
    {
        // DATOS RECIBIDOS
        $input = $request->input();
        $subtrabajos = $request->subtrabajo;
        
        // VALIDACION
        $request->validate(Trabajo::$rules, Trabajo::$messages);        
        
        //DATOS DEL CLIENTE
        if($request->id_cliente){
            // SE SELECCIONÓ EL ID DEL CLIENTE
            $dataTrabajo['id_cliente'] = $request->id_cliente;
        }elseif(!$request->id_cliente && $request->nombre_cliente == null && $request->email_cliente == null){
            $dataTrabajo['id_cliente'] = null;
        }else{
            // SE INGRESÓ EL CLIENTE MANUALMENTE
            $dataCliente['nombre'] = $request->nombre_cliente;
            $dataCliente['email'] = $request->email_cliente;
            $dataCliente['telefono'] = $request->telefono_cliente;
            $dataCliente['fecha_contratacion'] = $request->fecha_contratacion;
            $dataCliente['notas_contratacion'] = $request->notas_cliente;
            // REGISTRO AL CLIENTE
            $cliente = Cliente::create($dataCliente);
            $dataTrabajo['id_cliente'] = $cliente->id_cliente;
        }      
        
        // DATOS PARA EL TRABAJO
        $dataTrabajo['nombre'] = $request->nombre;
        $dataTrabajo['estado'] = $request->estado;
        $dataTrabajo['fecha_contratacion'] = $request->fecha_contratacion;
        $dataTrabajo['fecha_alta'] = $request->fecha_alta;
        $dataTrabajo['descripcion'] = $request->descripcion;
        
        // GUARDO LA ACTUALIZACION DEL TRABAJO
        $trabajo->update($dataTrabajo);
        
        // ACTUALIZO SERVICIOS
        $trabajo->servicios()->detach();
        $trabajo->servicios()->attach($request->get('servicios'));
        
        // BORRO LOS SUBTRABAJOS ANTERIORES
        $oldSubtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        foreach($oldSubtrabajos as $old){
            $old->delete();
        }
        
        // GUARDO LOS SUBTRABAJOS NUEVOS
        if(count($request->subtrabajo) == 1 && $request->subtrabajo[0]["'importe_subtrabajo'"] == 0){
            // NO HAY SUBTRABAJOS QUE INGRESAR
        }else{
            foreach($subtrabajos as $subtrabajo){
                $dataSubtrabajo['nombre_subtrabajo'] = $subtrabajo["'nombre_subtrabajo'"];
                $dataSubtrabajo['importe_subtrabajo'] = $subtrabajo["'importe_subtrabajo'"];
                $dataSubtrabajo['id_trabajo'] = $trabajo->id_trabajo;
                $sub = Subtrabajo::create($dataSubtrabajo);
            }
        }         
        
        return redirect()->route('trabajos.index')
            ->with('success', 'Han sido actualizados los datos del trabajo ' . $trabajo->nombre);
    }

    
    
    
    
    
    public function traerUsuarios()
    {
        $usuarios = Usuario::all();
        return $usuarios;
    }
    
    
    
    
    
    
    public function formPago(Trabajo $trabajo){
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
        
        // USUARIOS
        $usuarios = Usuario::all();
        
        // PAGOS
        $pagos = Pago::where('id_trabajo', "=", $trabajo->id_trabajo)->get();
        
        return view('trabajos/pagos', compact('trabajo', 'cliente', 'importe', 'usuarios', 'pagos'));
    }
    
    
    
    
    
    
   public function editarPago(Request $request, Trabajo $trabajo)
   {
       // PAGO RECIBIDO
       $datas = $request->pago;
       
       // BORRO LOS PAGOS ANTERIORES
       $oldPagos = Pago::where('id_trabajo', "=", $trabajo->id_trabajo)->get();
       foreach($oldPagos as $old){
            $old->delete();
       }
       
       // REGISTRO LOS NUEVOS
       if($datas){
           foreach($datas as $data){
               $data['id_trabajo'] = $trabajo->id_trabajo;
               $pagoNuevo = Pago::create($data);
           }
       }
       
       return redirect()->route('trabajos.index')->with('success', 'Los pagos del trabajo ' . $trabajo->nombre . ' han sido actualizados');
   }
    
    
    
    
    
    
    public function formCobro(Trabajo $trabajo){        
        // COBRO
        $cobros = Cobro::where('id_trabajo', "=", $trabajo->id_trabajo)->get();
        
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
        
        return view('trabajos/cobros', compact('cobros', 'trabajo', 'cliente', 'importe'));
    }    
 
    
    
    
    
   public function editarCobro(Request $request, Trabajo $trabajo)
   {            
       // DATOS RECIBIDOS
       $datas = $request->cobro;
       $trabajo = $request->trabajo;
       
       // IMPORTE
        $importe = 0;
        $subtrabajos = Subtrabajo::where('id_trabajo', '=', $trabajo->id_trabajo)->get();
        foreach($subtrabajos as $subtrabajo){
            $importe += $subtrabajo->importe_subtrabajo;
        }
       
       // COBRADO
       $cobrado = 0;
       foreach($datas as $cob){
            $cobrado += $cob['importe_cobro'];
        }
       
       if($cobrado > $importe){
        return back()->with('error', 'La cantidad cobrada supera al importe')->withInput();
       }

       // BORRO LOS PAGOS ANTERIORES
       $oldCobros = Cobro::where('id_trabajo', "=", $trabajo->id_trabajo)->get();
       foreach($oldCobros as $old){
            $old->delete();
       }
       
       // REGISTRO LOS NUEVOS
       if($datas){
           foreach($datas as $data){
               $data['id_trabajo'] = $trabajo->id_trabajo;
               $cobroNuevo = Cobro::create($data);
           }
       }
       
       return redirect()->route('trabajos.index')->with('success', 'Los cobros del trabajo ' . $trabajo->nombre . ' han sido actualizados');
   }   
    
    

    

    
}
