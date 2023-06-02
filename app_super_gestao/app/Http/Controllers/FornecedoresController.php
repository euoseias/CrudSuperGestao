<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\ViewNotFoundSolutionProvider;

class FornecedoresController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '11',
                'telefone' => '00000-0000'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85',
                'telefone' => '00000-0000'
            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '00000-0000'
            ]

        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
