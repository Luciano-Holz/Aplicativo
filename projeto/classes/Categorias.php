<?php

require_once 'Crud.php';

class Categorias extends Crud{

	protected $table = 'categorias';
	private $nome;
	private $disfuncao;
	private $ativo;
	private $concentracao;
	private $modoDeUso;
	private $formulas;

	public function getNome(){
		return $this->nome;
	}
	public function getDisfuncao(){
		return $this->disfuncao;
	}
	public function getAtivo(){
		return $this->ativo;
	}
	public function getConcentracao(){
		return $this->concentracao;
	}
	public function getModoDeUso(){
		return $this->modoDeUso;
	}
	public function getFormulas(){
		return $this->formulas;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setDisfuncao($disfuncao){
		$this->disfuncao = $disfuncao;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
	public function setConcentracao($concentracao){
		$this->concentracao = $concentracao;
	}
	public function setModoDeUso($modoDeUso){
		$this->modoDeUso = $modoDeUso;
	}
	public function setFormulas($formulas){
		$this->formulas = $formulas;
	}

	public function insert(){
		$sql  = "INSERT INTO $this->table (nome, disfuncao, ativo, concentracao, modoDeUso, formulas) VALUES (:nome, :disfuncao, :ativo, :concentracao, :modoDeUso, :formulas)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':disfuncao', $this->disfuncao);
		$stmt->bindParam(':ativo', $this->ativo);
		$stmt->bindParam(':concentracao', $this->concentracao);
		$stmt->bindParam(':modoDeUso', $this->modoDeUso);
		$stmt->bindParam(':formulas', $this->formulas);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, disfuncao = :disfuncao, ativo = :ativo, concentracao = :concentracao, modoDeUso = :modoDeUso, formulas = :formulas WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':disfuncao', $this->disfuncao);
		$stmt->bindParam(':ativo', $this->ativo);
		$stmt->bindParam(':concentracao', $this->concentracao);
		$stmt->bindParam(':modoDeUso', $this->modoDeUso);
		$stmt->bindParam(':formulas', $this->formulas);
		return $stmt->execute();
	}
	
}