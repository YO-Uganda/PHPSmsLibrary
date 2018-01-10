<?php

class YoSMS {
	/**
     * The Yo! SMS API Username
     * Required.
     * You may obtain the API Username from Yo! Support.
     * @var string
     */
	public $username;

	/**
     * The Yo! SMS API Password
     * Required.
     * You may obtain the API Password from Yo! Support.
     * @var string
     */
	public $password;

	/**
     * The Origin of the SMS
     * Required.
     * This can be set to your shortcode e.g. 6969 or set to a customized alphanumeric
     * string of less than 11 characters.
     * Note: Customized Sender-id are only supported for MTN and UTL Mobile Networks
     * Default is 6969
     * @var string
     */
	public $origin = "6969";

	/**
     * YoSMS constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
    * Set the API Origin
    * @param string $origin The Origin of the SMS to use
    * @return void
    */
    public function set_origin($origin){
    	$this->origin = $origin;
    }

    /**
    * Send SMS Request to SMS Gateway
    * This sends an SMS to a user or set of users
    * @param string $message the SMS message you would like to send
    * @param string $to the phone numbers you would like the SMS to be sent to (Comma Separated)
    * @return array
    */
	public function send_sms($message, $to){
		$url = "http://smgw1.yo.co.ug:9100/sendsms";
		$url .= "?ybsacctno=".$this->username;
		$url .= "&password=".$this->password;
		$url .= "&origin=".$this->from;
		$url .= "&sms_content=".urlencode($message);
		$url .= "&destinations=".$to;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_VERBOSE=>false,
		    CURLOPT_URL => $url,
		));
		$response = curl_exec($curl);
		curl_close($curl);

		parse_str($response, $result);
		if(isset($result['ybs_autocreate_status']) && ($result['ybs_autocreate_status']=='OK')){
			return array('status'=>'OK');
		}
		return array('status'=>'ERROR', 'message'=>$result['ybs_autocreate_message']);
	}
}