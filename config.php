<?php
return [
	//URI to get token, must be static value
	//'token_url' => 'https://api-seguridad.sunat.gob.pe/v1/clientesextranet/*SET_HERE_YOUR_CLIENT_ID*/oauth2/token/',
	'token_url' => 'https://api-seguridad.sunat.gob.pe/v1/clientesextranet/e05ebcf3-8789-41f2-af4e-5dddb750639e/oauth2/token/',
	//URI to query a bill
	//'query_url' => 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes/*SET_HERE_YOUR_RUC*/validarcomprobante',
	'query_url' => 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes/20601257140/validarcomprobante',
	//must be static value
	'grant_type' => 'client_credentials',
	//must be static value too
	'scope' => 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes',

	//set here your client_id key
	'client_id' => 'e05ebcf3-8789-41f2-af4e-5dddb750639e',
	//set here your client_secret key
	'client_secret' => 'DlWoeIsmrJjjW06sdWJ7Ng=='
];