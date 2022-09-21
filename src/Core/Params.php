<?php
declare(strict_types=1);

namespace Eancachi\InvoiceStatus\Core;

class Params
{

    private $configFile = "config.php";
    
    private $token_url = "";
    private $grant_type = "";
    private $scope = "";
    private $client_id = "";
    private $client_secret = "";

    public function __construct()
    {
        $configParams = include $this->configFile;
        $this->token_url = $configParams["token_url"];
        $this->grant_type = $configParams["grant_type"];
        $this->scope = $configParams["scope"];
        $this->client_id = $configParams["client_id"];
        $this->client_secret = $configParams["client_secret"];
    }

    public function getTokenUrl() :string
    {
        return $this->token_url;
    }

    public function setTokenUrl(string $token_url) :Params
    {
        $this->token_url = $token_url;
        return $this;
    }

    public function getGrantType() :string
    {
        return $this->grant_type;
    }

    public function setGrantType(string $grant_type) :Params
    {
        $this->grant_type = $grant_type;
        return $this;
    }

    public function getScope() :string
    {
        return $this->scope;
    }

    public function setScope(string $scope) :Params
    {
        $this->scope = $scope;
        return $this;
    }

    public function getClientId() :string
    {
        return $this->client_id;
    }

    public function setClientId(string $client_id) :Params
    {
        $this->client_id = $client_id;
        return $this;
    }

    public function getClientSecret() :string
    {
        return $this->client_secret;
    }

    public function setClientSecret(string $client_secret) :Params
    {
        $this->client_secret = $client_secret;
        return $this;
    }
}