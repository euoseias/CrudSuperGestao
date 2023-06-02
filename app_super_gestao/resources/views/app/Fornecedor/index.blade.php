<h3>Fornecedores</h3>

@isset($fornecedores)

    @forelse($fornecedores as $indice => $fornecedor)

        Interação atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
            Primeira iteração do loop
        @endif

        @if ($loop->last)
            Ultima iteração do loop

            <br>
            Total de registros: {{ $loop->count }}
        @endif
        <hr>
    @empty
        Não ecxistem fornecedores cadastrados!
    @endforelse
@endisset
