<?php

class Titular
{
    private Cpf $cpf;
    private string $nome;

    public function __construct(Cpf $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validaNome($nome);
        $this->nome = $nome;
    }
    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaCpf();
    }
    public function recuperaNome(): string
    {
        return $this->nome; 
    }
    private function validaNome(string $nome){
        if (strlen($nome) < 5){
            echo "Nome precisa ter mais que 5 caracteres";
            exit();
        }
    }
}