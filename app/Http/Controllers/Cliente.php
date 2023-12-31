<?php

namespace App\Http\Controllers;

use App\Models\cliente as ModelsCliente;
use Illuminate\Http\Request;

class Cliente extends Controller
{
    
    public function cadastrarClienteView(){
        return view('cadastrarClienteView');
    }
    public function cadastrarCliente(Request $request){
        ModelsCliente::create([
            'Nome' => $request->nome,
            'Rua' => $request->rua,
            'Endereco' => $request->endereco,
            'Bairro' => $request->bairro,
            'Cidade' => $request->cidade,
            'Estado' => $request->estado,
            'Pais' => $request->pais
        ]);
		return redirect('listarClientes');
    }
    public function listarClientes(){
        return view('listarClientes', ['clientes'=> ModelsCliente::all(), 'cliente' => ModelsCliente::all()]);
    }
    public function excluirCliente($id){
        ModelsCliente::where('id', $id)->delete();
        return redirect('/listarClientes');
    }
    public function atualizarClienteView($id){
       return view('atualizarCliente', ['cliente'=> ModelsCliente::where('id', $id)->first()]);
    }
	public function atualizarCliente(Request $request){
		ModelsCliente::where('id', $request->id)->update([
			'Nome' => $request->nome,
			'Rua'=> $request->rua,
			'Endereco' => $request->endereco,
			'Bairro' => $request->bairro,
			'Cidade' => $request->cidade,
			'Estado'=> $request->estado,
			'Pais' => $request->pais
        ]);
		
		return redirect('/listarClientes');
		}
}
