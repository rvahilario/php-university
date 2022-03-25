<?php
class Estoque {
  private $produtos;

  public function __construct() {
    $getArgumentos = func_get_args();
    $numeroDeArgumentos = func_num_args();

    if (method_exists($this, $constructAuxiliar = '__construct'.$numeroDeArgumentos)) {
        call_user_func_array(array($this, $constructAuxiliar), $getArgumentos);
    }
  }

  public function __construct0() {
    $this->produtos = array();
  }

  public function __construct1($produtosIniciais) {
    $this->produtos = $produtosIniciais;
  }

  public function adicionarProduto($produto) {
    if(!array_key_exists($produto->descricao(), $this->produtos)) {
      $this->produtos[$produto->descricao()] = array();
    }
    $this->produtos[$produto->adicionarQuantidade()];
  }

  public function removerProduto($produto) {
    $this->produtos[$produto->diminuirQuantidade()];
  }

  public function quantidade($descricao) {
    if(!array_key_exists($descricao, $this->produtos)) {
      return 0;
    }
    $produto = array_keys($this->produtos, ($descricao));
    return $this->produtos[$produto[0]]->quantidadeDoProduto();
  }
}

class Produto {
  private $descricaoTextual;
  private $tipo;
  private $prazoValidade;
  private $valorUnitario;
  private $quantidade;

  public function __construct($descricaoTextual, $tipo, $prazoValidade, $valorUnitario) {
    $this->descricaoTextual = $descricaoTextual;
    $this->tipo = $tipo;
    $this->prazoValidade = $prazoValidade;
    $this->valorUnitario = $valorUnitario;
    $this->quantidade = 1;
  }

  public function mudarValorUnitario($novoValor) {
    $this->valorUnitario = $novoValor;
  }

  public function descricao() {
    return $this->descricaoTextual;
  }

  public function quantidadeDoProduto() {
    return $this->quantidade;
  }

  public function adicionarQuantidade() {
    $this->quantidade = ++$this->quantidade;
  }

  public function diminuirQuantidade() {
    $this->quantidade = --$this->quantidade;
  }
}
?>