<?php
/**
 * User: noah
 * Date: 2/26/13
  */

class Kohana_Oauth2_Provider_Gmail extends Kohana_OAuth2_Provider
{
	public $name = 'gmail';

	public function url_authorize()
	{
		return 'https://accounts.google.com/o/oauth2/auth';
	}

	public function url_access_token()
	{
		return 'https://accounts.google.com/o/oauth2/token';
	}
}