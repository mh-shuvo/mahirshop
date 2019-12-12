<?php
	
	namespace App\Http\Controllers;
	
	use Illuminate\Http\Request;
	use GuzzleHttp\Client;
	use App\SmsLog;
	
	class SendSmsController extends Controller
	{
		private $test;
		
		private $numbers;
		
		private $message;
		
		private $actionFrom;
		
		public function __construct(array $numbers, $message, $actionFrom = null,$test = false,$auto = true)
		{
			$this->test = $test;
			$this->numbers = $numbers;
			$this->message = $message;
			$this->actionFrom = $actionFrom;
			if($auto){
				$this->sendSms();
			}
		}
		
		public function sendSms()
		{
			$params = [
            'sender' => config('sms.sender'),
            'body' => $this->message,
            'recipient' => implode (",", $this->numbers),
            'userid' => config('sms.username'),
            'password' => config('sms.password'),
			];
			
			if (!$this->test) {
				
				return $this->send($params);
				} else {
				return [
				'code' => 200,
				'status' => "success",
				'count' => 1
				];
			}
		}
		
		public function send($params)
		{
			$args = http_build_query($params, '', '&');
			$headers = array();
			$handle = curl_init(config('sms.url'));
			if (false === $handle) { // error starting curl
				throw new \Exception('0 - Couldn\'t start curl');
				} else {
				curl_setopt($handle, CURLOPT_URL, config('sms.url'));
				curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($handle, CURLOPT_TIMEOUT, 60);
				curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 4); // set higher if you get a "28 - SSL connection timeout" error
				curl_setopt($handle, CURLOPT_HEADER, true);
				curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
				$curlversion = curl_version();
				curl_setopt($handle, CURLOPT_USERAGENT, 'PHP '.phpversion().' + Curl '.$curlversion['version']);
				curl_setopt($handle, CURLOPT_REFERER, null);
				curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, true); // set false if you get a "60 - SSL certificate problem" error
				curl_setopt($handle, CURLOPT_POSTFIELDS, $args);
				curl_setopt($handle, CURLOPT_POST, true);
				$response = curl_exec($handle);
				if ($response) {
					$response = substr($response, strpos($response, "\r\n\r\n") + 4); // remove http headers
					} else { // http response code != 200
					throw new \Exception(curl_errno($handle).' - '.curl_error($handle));
				}
				curl_close($handle);
			}
			
			$response = json_decode($response);
			
			$smsLog = new SmsLog();
			$smsLog->sender = config('sms.sender');
			$smsLog->massage = $this->message;
			$smsLog->to = implode (",", $this->numbers);
			$smsLog->status = $response->status;
			$smsLog->action = $this->actionFrom;
			$smsLog->status_details = json_encode($response);
			$smsLog->save();
			
			// if (200 != $response->code) {
				// throw new \Exception(json_encode($response->message));
			// }
			
			return response()->json($response);
		}
	}
