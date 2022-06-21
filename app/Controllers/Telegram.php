<?php

namespace App\Controllers;

use CURLFile;

class Telegram extends BaseController
{
    public function __construct()
    {
        $this->token  = "2127835848:AAGNZrWTzhrru6AvnstW9e1vLNu_k73tnvc";  // ganti token ini dengan token bot mu
        $this->chatid = "2109764937"; // ini id saya di telegram @hasanudinhs silakan diganti dan disesuaikan
        $this->pesan     = "Test Bot PSB-ALISHLAH\n\n";
    }

    public function sendMessage()
    {
        $method    = "sendMessage";
        $url    = "https://api.telegram.org/bot" . $this->token . "/" . $method;
        $post = [
            'chat_id' => $this->chatid,
            // 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
            'text' => $this->pesan
        ];

        $header = [
            "X-Requested-With: XMLHttpRequest",
            "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36"
        ];

        // hapus 1 baris ini:
        // die('Hapus baris ini sebelum bisa berjalan, terimakasih.');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_REFERER, $refer);
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $datas = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $debug['text'] = $this->pesan;
        $debug['code'] = $status;
        $debug['status'] = $error;
        $debug['respon'] = json_decode($datas, true);

        // print_r($debug);

        return 1;
    }

    public function sendPhoto($urlphoto = null, $caption = null)
    {
        $method    = "sendPhoto";
        $url    = "https://api.telegram.org/bot" . $this->token . "/" . $method;
        $post = [
            'chat_id' => $this->chatid,
            // 'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
            'photo' => new CURLFile(realpath($urlphoto)),
            'caption' => $caption
        ];

        $header = [
            "X-Requested-With: XMLHttpRequest",
            "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36"
        ];

        // hapus 1 baris ini:
        // die('Hapus baris ini sebelum bisa berjalan, terimakasih.');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_REFERER, $refer);
        //curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $datas = curl_exec($ch);
        $error = curl_error($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $debug['text'] = $this->pesan;
        $debug['code'] = $status;
        $debug['status'] = $error;
        $debug['respon'] = json_decode($datas, true);

        // print_r($debug);
    }
}
