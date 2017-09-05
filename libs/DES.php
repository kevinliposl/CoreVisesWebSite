<?php

class DES {

    public static function encrypt($data) {
        $key = md5(utf8_encode("key"), true);
        $key .= substr($key, 0, 8);
        $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
        $len = strlen($data);
        $pad = $blockSize - ($len % $blockSize);
        $data .= str_repeat(chr($pad), $pad);
        $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');

        return base64_encode($encData);
    }

    public static function decrypt($data) {
        $key = md5(utf8_encode("key"), true);
        $key .= substr($key, 0, 8);
        $data = base64_decode($data);
        $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');
        $block = mcrypt_get_block_size('tripledes', 'ecb');
        $len = strlen($data);
        $pad = ord($data[$len - 1]);

        return substr($data, 0, strlen($data) - $pad);
    }

}
