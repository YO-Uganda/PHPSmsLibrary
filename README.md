# PHPSmsLibrary
YO SMS GATEWAY is two-way SMS service that gives both individuals and businesses the ability to send bulk SMS to their clients, as well as receive inbound SMS. YO SMS GATEWAY offers a rich API which enables seamless integration with other applications.

This is a library that will send SMS through the YO! SMS GATEWAY

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. Once content, you can use the same instructions to upload to your live system.

### Prerequisites

To use the library, you need to have a Yo! SMS Account on the Yo! Billing Server (YBS)

* YBS Account Number 
* SMS Gateway Password

### Installing

Download the file [YoSMS.php](YoSMS.php)

Include the file in your PHP Script using ```require '/path/to/YoSMS.php';```

This should load the library for use in your PHP Script

## Simple Examples

To send an SMS to one phone number, add the following snippet of code to your PHP Script:

```
$yoSMS = new YoSMS($username, $password);
$response = $yoSMS->send_sms('This is a test SMS message. Thank you.', '256770000000'); // 256770000000 is just an example phone number
if($response['status']=='OK'){
	// SMS was sent. Do as required.
}else{
	// SMS was not sent. The reason is echoed below
	print_r($response);
	echo $response['message'];
}
```

To send an SMS to more than one phone number, add the following snippet of code to your PHP script:

```
$yoSMS = new YoSMS($username, $password);
$response = $yoSMS->send_sms('This is a test SMS message. Thank you.', '256770000000,256780000000,256710000000,256750000000'); 
if($response['status']=='OK'){
	// SMSs were sent. Do as required.
}else{
	// SMSs were not sent. The reason is echoed below
	print_r($response);
	echo $response['message'];
}
```

That's it! You should now be ready to use YoSMS

## Built With

* [PHP](http://www.php.net/) - PHP Programming Language 

## Authors

* **Aziz Kirumira** - *Initial work* - [Yo (U) Ltd](https://github.com/YO-Uganda)

## Acknowledgments

* Gerald Begumisa
* Grace Kyeyune
* Joseph Tabajjwa
* Arnold Kunihira