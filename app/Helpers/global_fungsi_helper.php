<?php


function kirim_email($attachment, $to, $title, $message)
{
    $email = \Config\Services::email();
    $email_pengirim = EMAIL_ALAMAT;
    $email_nama = EMAIL_NAMA;

    $config['protocol'] = "smtp";
    $config['SMTPHost'] = "smtp.gmail.com";
    $config['SMTPUser'] = $email_pengirim;
    $config['SMTPPass'] = EMAIL_PASSWORD;
    $config['SMTPPort'] = 587;
    $config['SPTPCrypto'] = "ssl";
    $config['mailType'] = "html";

    // $email->setNewline("\r\n");
    $email->initialize($config);
    $email->setFrom($email_pengirim, $email_nama);
    $email->setTo($to);

    if ($attachment) {
        $email->attach($attachment);
    }

    $email->setSubject($title);
    $email->setMessage($message);

    if (!$email->send()) {
        $data = $email->printDebugger(['headers']);
        print_r($data);
        return false;
    } else {
        return true;
    }
}
function nomor($currentPage, $jumlahBaris)
{
    if (is_null($currentPage)) {
        $nomor = 1;
    } else {
        $nomor = 1 + ($jumlahBaris * ($currentPage - 1));
    }
    return $nomor;
}

function tanggal_indonesia($parameter)
{
    $split1 = explode(" ", $parameter);
    $parameter1 = $split1[0];

    $bulan = [
        '1' => 'Januari', 'Feburuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember',
    ];
    $hari = [
        '1' => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
    ];
    $num = date('N', strtotime($parameter1));
    $split2 = explode("-", $parameter1);
    return $hari[$num] . ", " . $split2[2] . " " . $bulan[(int)$split2[1]] . " " . $split2[0];
}
function purify($dirty_html)
{
    $config = HTMLPurifier_Config::createDefault();
    $config->set('URI.AllowedSchemes', array('data' => True));
    $purifier = new HTMLPurifier($config);
    $clean_html = $purifier->purify($dirty_html);
    return $clean_html;
}