<?php defined('SYSPATH') or die('No direct script access.');
/**
 * OAuth Intuit Provider
 *
 * Documents for implementing Intuit OAuth can be found at
 * https://ipp.developer.intuit.com/0010_Intuit_Partner_Platform/0025_Intuit_Anywhere/1000_Getting_Started_With_IA/0600_OAuth_for_IA.
 *
 * [!!] This class does not implement the Intuit Data Services API. It is only an
 * implementation of standard OAuth with Intuit as the service provider.
 *
 * @package    Kohana/OAuth
 * @category   Provider
 * @author     Noah Goodrich
 * @copyright  (c) 2010 Kohana Team
 * @license    http://kohanaframework.org/license
 * @since      3.2.x
 */
class Kohana_OAuth_Provider_Intuit extends OAuth_Provider {

	/**
	 * @var string  Provider name
	 */
	public $name = 'intuit';

	/**
	 * @var string  Signature
	 */
	protected $signature = 'HMAC-SHA1';

	/**
	 * Request token URL
	 *
	 * @return string
	 */
	public function url_request_token()
	{
		return 'https://oauth.intuit.com/oauth/v1/get_request_token';
	}

	/**
	 * Authorize URL
	 *
	 * @return string
	 */
	public function url_authorize()
	{
		return 'https://appcenter.intuit.com/Connect/Begin';
	}

	/**
	 * Access token URL
	 *
	 * @return string
	 */
	public function url_access_token()
	{
		return 'https://oauth.intuit.com/oauth/v1/get_access_token';
	}

} // End Kohana_OAuth_Provider_Intuit
