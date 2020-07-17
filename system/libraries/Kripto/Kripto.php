<?php

class CI_kripto {
	var $data = null;
	var $key = "bijb1qazbijb1qaz"; // harus 16, 24 dan 32 karakter
	var $iv = "bijbk3y!";
	var $bit_check = 8;

    public function encrypt($text) {
    	$key = $this->key;
    	$iv = $this->iv;
    	$bit_check = $this->bit_check;

	    $text_num =str_split($text,$bit_check);
	    $text_num = $bit_check-strlen($text_num[count($text_num)-1]);

	    for ($i=0;$i<$text_num; $i++) {
	    	$text = $text . chr($text_num);
	    }

	    $cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,"","cbc","");
	    mcrypt_generic_init($cipher, $key, $iv);
	    $decrypted = mcrypt_generic($cipher,$text);
	    mcrypt_generic_deinit($cipher);

	    return base64_encode($decrypted);
	}

	public function decrypt($encrypted_text){
    	$key = $this->key;
    	$iv = $this->iv;
    	$bit_check = $this->bit_check;

	    $cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,"","cbc","");
	    mcrypt_generic_init($cipher, $key, $iv);
	    $decrypted = mdecrypt_generic($cipher,base64_decode($encrypted_text));
	    mcrypt_generic_deinit($cipher);
	    $last_char=substr($decrypted,-1);
	    for($i=0;$i<$bit_check-1; $i++) {
	    	if(chr($i)==$last_char) {
			    $decrypted=substr($decrypted,0,strlen($decrypted)-$i);
			    break;
	    	}
	    }
	    return $decrypted;
    }

    function fnEncrypt($sValue)
	{
		$sSecretKey = $this->key;
	    return rtrim(
	        base64_encode(
	            mcrypt_encrypt(
	                MCRYPT_RIJNDAEL_256,
	                $sSecretKey, $sValue,
	                MCRYPT_MODE_ECB,
	                mcrypt_create_iv(
	                    mcrypt_get_iv_size(
	                        MCRYPT_RIJNDAEL_256,
	                        MCRYPT_MODE_ECB
	                    ),
	                    MCRYPT_RAND)
	                )
	            ), "\0"
	        );
	}

	function fnDecrypt($sValue)
	{
		$sSecretKey = $this->key;
	    return rtrim(
	        mcrypt_decrypt(
	            MCRYPT_RIJNDAEL_256,
	            $sSecretKey,
	            base64_decode($sValue),
	            MCRYPT_MODE_ECB,
	            mcrypt_create_iv(
	                mcrypt_get_iv_size(
	                    MCRYPT_RIJNDAEL_256,
	                    MCRYPT_MODE_ECB
	                ),
	                MCRYPT_RAND
	            )
	        ), "\0"
	    );
	}

	function byteStr2byteArray($s) {
		return array_slice(unpack("C*","\0".$s),1);
	}

	function call($msg) {
		$byte_array = $this->byteStr2byteArray($msg);
		for($i=0;$i<count($byte_array);$i++) {
			printf("0x%02x ", $byte_array[$i]);
		}

		return $byte_array;
	}

	function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
}