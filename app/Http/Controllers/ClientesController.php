<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Symfony\Component\VarDumper\VarDumper;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $cliente = Cliente::get();

        if(empty($cliente)) {
            return response()->json(['data' => null, 'status' => 'error', 'message' => 'Não há nenhum registro para ser exibido.']); 
        }
        return (['data' => $cliente, 'status' => 'success', 'message' => '']);

    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) { 
    //  $validation = Cliente::cliente_validacao($request);
      
      
      $data = $request->all();
      
        $cliente = new Cliente;
        $cliente->nome = @$data['nome'];
        $cliente->cpf = @$data['cpf'];
        $cliente->identidade_numero = @$data['identidade_numero'];
        $cliente->identidade_validade = @$data['identidade_validade'];
        $cliente->identidade_emissor = @$data['identidade_emissor'];
        $cliente->endereco_logradouro = @$data['endereco_logradouro'];
        $cliente->endereco_numero = @$data['endereco_numero'];
        $cliente->endereco_complemento = @$data['endereco_comlemento'];
        $cliente->endereco_bairro = @$data['endereco_bairro'];
        $cliente->endereco_cidade = @$data['endereco_cidade'];
        $cliente->endereco_estado = @$data['endereco_estado'];
        $cliente->email = @$data['email'];
        $cliente->telefone = @$data['telefone'];
       
  
        if ($cliente->save()) {
          $cliente->get();
          return response()->json(['data' => $cliente, 'status' => 'success', 'message' => 'Registro adicionado com sucesso.']);
        } else {
          return response()->json(['data' => '', 'status' => 'error', 'message' => 'Não foi possível adicionar o registro, verifique os dados preenchidos.']);
        }
      }
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
      
        $cliente = Cliente::findOrFail($id);
  
        if(!isset($cliente)) {
          return response()->json(['data' => null, 'status' => 'error', 'message' => 'Registro não localizado.']); 
        }
        return (['data' => $cliente, 'status' => 'success', 'message' => '']);
  
      }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
      
       $validation = Cliente::cliente_validacao($request);
  
        $data = $request->all();
  
        $cliente = Cliente::findOrFail($data['id']);
        if($cliente->fill($data)->save()) {
          return (['data' => $cliente, 'status' => 'success', 'message' => 'Registro atualizado com sucesso.']);
        } else {
          return response()->json(['data' => null, 'status' => 'error', 'message' => 'Não foi possível atualizar o registro.']);
        }
  
      }
  
    public function destroy($id) {

      $cliente = Cliente::findOrFail($id);
      if($cliente->delete()) {
        return (['data' => $cliente, 'status' => 'success', 'message' => 'Registro deletado com sucesso.']);
      } else {
        return response()->json(['data' => null, 'status' => 'error', 'message' => 'Não foi possível deletar o registro.']);
      }

    }
}

