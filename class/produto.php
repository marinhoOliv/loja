<?php 
	class Produto {
		private $id;
		private $nome;
		private $preco;
		private $descricao;
		private $categoria;
		private $usado;

		//toda funcao dentro de uma classe se torna um método
		public function valorComDesconto ($valor = 0.1)
		{
			if($valor <= 0.5 && $valor > 0) {
				$this->setPreco($this->preco - $this->preco * $valor);
				return $this->preco;
			} 
		}

		public function getId()
		{
			return $this->id;
		}

		public function setId($id)
		{
			$this->id = $id;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function setNome($nome)
		{
			$this->nome = $nome;
		}

		public function getPreco()
		{
			return $this->preco;
		}

		public function setPreco($preco)
		{
			if($preco > 0) {
				$this->preco = $preco;
			}
		}

		public function getDescricao()
		{
			return $this->descricao;
		}

		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}

		public function isUsado()
		{
			return $this->usado;
		}

		public function setUsado($usado)
		{
			$this->usado = $usado;
		}

		public function getCategoria()
		{
			return $this->categoria;
		}

		public function setCategoria($categoria)
		{
			$this->categoria = $categoria;
		}
	}
?>
