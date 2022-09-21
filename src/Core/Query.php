<?php
declare(strict_types=1);

namespace Eancachi\InvoiceStatus\Core;

class Query
{
	private $configFile = "config.php";
	private $query_url = "";
	
	private $numRuc;
	private $codComp;
	private $numeroSerie;
	private $numero;
	private $fechaEmision;
	private $monto;

	private $tokenKey;

	function __construct()
	{
		$configParams = include $this->configFile;
		$this->query_url = $configParams['query_url'];
	}

	public function setNumRuc(string $numRuc) :Query
	{
		$this->numRuc = $numRuc;
		return $this;
	}

	public function setCodComp(string $codComp) :Query
	{
		$this->codComp = $codComp;
		return $this;
	}

	public function setNumeroSerie(string $numeroSerie) :Query
	{
		$this->numeroSerie = $numeroSerie;
		return $this;
	}

	public function setNumero(int $numero) :Query
	{
		$this->numero = $numero;
		return $this;
	}

	public function setFechaEmision(string $fechaEmision) :Query
	{
		$this->fechaEmision = $fechaEmision;
		return $this;
	}

	public function setMonto(float $monto) :Query
	{
		$this->monto = $monto;
		return $this;
	}

	public function setTokenKey(string $tokenKey) :Query
	{
		$this->tokenKey = $tokenKey;
		return $this;
	}

	public function exec() :Object
	{
		$query_url = $this->query_url;

		$postFields = [
			'numRuc' => $this->numRuc,
			'codComp' => $this->codComp,
			'numeroSerie' => $this->numeroSerie,
			'numero' => $this->numero,
			'fechaEmision' => $this->fechaEmision,
			'monto' => $this->monto
		];
		$postFields = json_encode($postFields);
		$headersCURL = [
			'Authorization: Bearer ' . $this->tokenKey,
			'content-Type: application/json'
		];


		$execCURL = curl_init();
		curl_setopt($execCURL, CURLOPT_URL, $query_url);
		curl_setopt($execCURL, CURLOPT_HTTPHEADER, $headersCURL);
		curl_setopt($execCURL, CURLOPT_POSTFIELDS, $postFields);
		curl_setopt($execCURL, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($execCURL, CURLOPT_POST, 1);

		$execResponse = curl_exec($execCURL);
		curl_close($execCURL);

		return json_decode($execResponse);
	}
}