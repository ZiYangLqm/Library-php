<?php
class Crypt3Des {
	var $key;
	var $iv;
	function Crypt3Des(){
		$this->key = DEC_KEY;
		$this->iv = DEC_IV_KEY;
	}

	function encrypt($str){

		$size = mcrypt_get_block_size (MCRYPT_3DES, MCRYPT_MODE_CBC );
		$str = $this->pkcs5Pad ( $str, $size );
		$str =  mcrypt_cbc(MCRYPT_3DES, $this->key, $str, MCRYPT_ENCRYPT, $this->iv ) ;
//      $str = strtoupper( bin2hex($str) );
		$str = base64_encode($str);
		return $str;
		
/*
		App::uses('HttpSocket', 'Network/Http');
		$http = new HttpSocket();
		$url = SERVICE_URL."/encode";
		$response = $http->post($url, array(
				'plainText' => $input,
		));
		return $response->body;*/
	}

	function decrypt($str){
		$strBin = base64_decode( $str) ;
// 		$strBin = $this->hex2bin( strtolower($strBin) );
		$str = mcrypt_cbc( MCRYPT_3DES,( $this->key), $strBin, MCRYPT_DECRYPT, $this->iv );
		$str = $this->pkcs5Unpad( $str );
		return $str;

/*
		App::uses('HttpSocket', 'Network/Http');
		$http = new HttpSocket();
		$url = SERVICE_URL."/decode";
		$response = $http->post($url, array(
		        'encryptText' => $encrypted,
		));
		return $response->body;
*/


	}


	function hex2bin($hexData) {    
        $binData = "";    
        for($i = 0; $i  < strlen ( $hexData ); $i += 2) {    
            $binData .= chr ( hexdec ( substr ( $hexData, $i, 2 ) ) );    
        }  
        return $binData;  
    }  

    function pkcs5Pad($text, $blocksize) {  
        $pad = $blocksize - (strlen ( $text ) % $blocksize);  
        return $text . str_repeat ( chr ( $pad ), $pad );  
    }  

    function pkcs5Unpad($text) {  
        $pad = ord ( $text {strlen ( $text ) - 1} );    
        if ($pad > strlen ( $text )) 
        	return false;  
        if (strspn ( $text, chr ( $pad ), strlen ( $text ) - $pad ) != $pad)   
        	return false;      
        return substr ( $text, 0, - 1 * $pad );  
    } 

	function PaddingPKCS7($data) {
		$block_size = mcrypt_get_block_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
		$padding_char = $block_size - (strlen($data) % $block_size);
		$data .= str_repeat(chr($padding_char),$padding_char);
		return $data;
	}
}