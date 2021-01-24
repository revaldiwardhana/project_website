<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function kirim_otp($no_tujuan, $isi_pesan){
    $email_api      = urlencode("obbyistiyono09@gmaiL.com");
    $passkey_api  = urlencode("Hm123123");
    $no_hp_tujuan = urlencode($no_tujuan);
    $isi_pesan      = urlencode($isi_pesan);

    $url  = "https://reguler.medansms.co.id/sms_api.php?action=kirim_sms&email=".$email_api."&passkey=".$passkey_api."&no_tujuan=".$no_hp_tujuan."&pesan=".$isi_pesan;
    $result = file_get_contents($url);
    $data = explode("~~~", $result);

    /*echo $data[0]; //1=SUKSES, selain itu GAGAL
    echo $data[1]; //Jumlah Nomor Tujuan Valid
    echo $data[2]; //Jumlah Nomor Tujuan yang dapat dikirim SMS
    echo $data[3]; //Total Kredit yang digunakan
    echo $data[4]; //Sisa Kredit
    echo $data[5]; //Jenis Paket SMS (1=SMS Gratis, 0=SMS Reguler/SMS Center/SMS Masking*/
    return $data;
}

function check_login($user_logedin){
  if($user_logedin != TRUE)
      {
                //jika memang session belum terdaftar, maka redirect ke halaman login
                redirect("Login");
      }
}


function random($angka){
   
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';  
        $string = '';  
        for($i = 0; $i < $angka; $i++) {  
         $pos = rand(0, strlen($karakter)-1);  
         $string .= $karakter{$pos};  
        }  
        return $string;  
      

  }



 function send_email(){
      $ci =& get_instance();
      $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://mail.baguswebmaster.com',
             'smtp_user' => 'admin@baguswebmaster.com',
             'smtp_pass' => 'R7M8A40WIN5A',
             'smtp_port' => '465',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        
        return $config;
    }


?>