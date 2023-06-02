<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
  
      
          /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<pre>';
        echo $request->input('email');
        echo '</pre>';
          */

//ENVIAR DADOS INDIVIADUAIS

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        */

//ENVIAR DADOS EM MASSA

        // Outro modelo de enviar dados para o banco de dados
        //$contato =  new SiteContato();
       // $contato->create($request->all()); 
        //$contato->save();
        //print_r($contato->getAttributes());
/*
        $motivo_contatos = [
          '1' => 'Dúvida',
          '2' => 'Elogio',
          '3' => 'Reclamação'
      ];
*/
      $motivo_contatos = MotivoContato::all();

      return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request){
 
       $regras = [
        'nome' => 'required|min:3|max:40|unique:site_contatos',
        'telefone' => 'required',
        'email' => 'email',
        'motivo_contatos_id' => 'required',
        'mensagem' => 'required|max:2000'
       ];

       $feedback =
       [ 
       'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
       'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
       'nome.unique' => 'O nome já está cadastrado',
       'email.email' => 'O email informado não é válido',
       'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
       'required' => 'O campo :attribute deve ser preenchido',
       ];

       $request->validate( $regras, $feedback ); 

 /*
      //realizar a validação dos dados no formulario recebidos no resquest
      $request->validate([
        'nome' => 'required|min:3|max:40|unique:site_contatos',
        'telefone' => 'required',
        'email' => 'email',
        'motivo_contatos_id' => 'required',
        'mensagem' => 'required|max:2000'
      ],
      [
      // Exemplo de custumização para campos especificos sobrepoes as msg padronizadas


        //'nome.required' => 'O campo nome precisa ser preenchido',
        'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
        'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
        'nome.unique' => 'O nome já está cadastrado',
        'email.email' => 'O email informado não é válido',
        'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
       // 'telefone.required' => 'O campo nome precisa ser preenchido',

        // Exemplo de custumização para mais de 10 validações

        //'required' => 'O campo deve ser preenchido',

         //Exemplo para mensagens genericas deixando um pouco mais dinamicas
        'required' => 'O campo :attribute deve ser preenchido',

      ]); 
      
    */

     SiteContato::create($request->all()); 
     return redirect()->route('site.index');
    }
}
