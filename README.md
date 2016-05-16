# WebSmser
A web interface for sending and receiving SMS using Twillio SDK

#Installation
* Clone repository to your localhost
* Download composer globally from https://getcomposer.org/doc/00-intro.md
* Navigate to WebSmser folder 
* Run `composer install`
* Change `config/sms_creds.yml` file to add `account_id`, `auth_token`, `sender` from Twilio
* Copy  `config/sms_creds.yml` file to `config\dist` folder
* Web interface is located inside web directory : localhost/WebSmser/web
