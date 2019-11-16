<?php
    class AjaxVerificar{
        public $number;
        public $email;
        public $apiKey;
        public function AjxValidarCorreo(){
            $ch =  curl_init('http://apilayer.net/api/check?access_key='.$this->apiKey.'&email='.$this->email.'&smtp=1&format=1');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $validationResult = json_decode($json,  true);
            echo json_encode($validationResult);
        }
        public function AjxValidarTelefono(){
            $ch =  curl_init('http://apilayer.net/api/validate?access_key='.$this->apiKey.'&number='.$this->number.'&country_code=CO&format=1');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            curl_close($ch);
            $validationResult = json_decode($json,  true);
            echo json_encode($validationResult);
        }
    }
    if(isset($_GET["email"])){
        $oBJEC_AJAX = new AjaxVerificar();
        $oBJEC_AJAX ->email = $_GET["email"];
        $oBJEC_AJAX ->apiKey= 'bdf6da844098b58d89a18f9d9cd2a6b4';
        $oBJEC_AJAX -> AjxValidarCorreo();
    }
    if(isset($_GET["number"])){
        $oBJEC_AJAX = new AjaxVerificar();
        $oBJEC_AJAX ->number= $_GET["number"];
        $oBJEC_AJAX ->apiKey= '6d4b5facab5de4f11f9940d003e51033';
        $oBJEC_AJAX -> AjxValidarTelefono();
    }
?>