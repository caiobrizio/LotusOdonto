<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;


class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {

            $consulta = Consulta::get();
    
            if(empty($consulta)) {
                return response()->json(['data' => null, 'status' => 'error', 'message' => 'Não há nenhum registro para ser exibido.']); 
            }
            return (['data' => $consulta, 'status' => 'success', 'message' => '']);
    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    //  $validation = Consulta::consulta_validacao($request);
      
      
      $data = $request->all();
      
      $consulta = new Consulta();
      $consulta->data = @$data['nome'];
      $consulta->horario = @$data['horario'];
      $consulta->descricao = @$data['descricao'];
      $consulta->valor = @$data['valor'];
      $consulta->pagamento = @$data['pagamento'];


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
      {
      
        $consulta = Consulta::findOrFail($id);
  
        if(!isset($consulta)) {
          return response()->json(['data' => null, 'status' => 'error', 'message' => 'Registro não localizado.']); 
        }
        return (['data' => $consulta, 'status' => 'success', 'message' => '']);
  
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validation = Consulta::cliente_validacao($request);
  
      $data = $request->all();

      $consulta = Consulta::findOrFail($data['id']);
      if($consulta->fill($data)->save()) {
        return (['data' => $consulta, 'status' => 'success', 'message' => 'Registro atualizado com sucesso.']);
      } else {
        return response()->json(['data' => null, 'status' => 'error', 'message' => 'Não foi possível atualizar o registro.']);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         {

            $consulta = Consulta::findOrFail($id);
            if($consulta->delete()) {
              return (['data' => $consulta, 'status' => 'success', 'message' => 'Registro deletado com sucesso.']);
            } else {
              return response()->json(['data' => null, 'status' => 'error', 'message' => 'Não foi possível deletar o registro.']);
            }
      
          }
      }
    }

