<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Kohana_OAuth2_Provider_Mailchimp extends OAuth2_Provider {

	public $name = 'mailchimp';

	public function url_authorize()
	{
		return 'https://login.mailchimp.com/oauth2/authorize';
	}

	public function url_access_token()
	{
		return 'https://login.mailchimp.com/oauth2/token';
	}

	public function url_metadata()
	{
		return 'https://login.mailchimp.com/oauth2/metadata';
	}

	public function metadata(OAuth2_Token_Access $token, array $params = NULL)
	{
		$request = OAuth2_Request::factory('resource', 'GET', $this->url_metadata(), array(
				'access_token' => $token->token,
			))
			->required('access_token', TRUE)
			;

		if ($params)
		{
			// Load user parameters
			$request->params($params);
		}

		return json_decode($this->execute($request));
	}

	public function execute(OAuth2_Request $request, array $options = NULL)
	{
		$options[CURLOPT_HTTPHEADER][] = 'Expect:';
		$options[CURLOPT_HTTPHEADER][] = 'Accept: application/json';

		return parent::execute($request, $options);
	}

}
