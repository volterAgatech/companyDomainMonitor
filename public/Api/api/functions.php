<?php
class Functions
{
    //1. Читаем все домены
    //2. Узнаем всю информацию о каждом домене 
    //3. Записываем в таблицу актуальную информацию 
    function getWhoisDomainData($dname)
    {
        $whois = new Whois();
        $query = $dname;
        $result = $whois->Lookup($query, false);



        //$resArray['freeDate'] = explode('     ', $result['rawdata'][14])[1];
        $resArray['paidTill'] = explode('     ', $result['rawdata'][13])[1];
        $resArray['createdDate'] = explode('     ', $result['rawdata'][12])[1];
        echo '<pre>';
        var_dump($resArray);
        echo '</pre>';

    }
    function getSSLDomainData($dnameArray)
    {
        $dnameSSLData = [];
        foreach ($dnameArray as $i => $dname) {
            //echo $dname;
            # code...
            $url = 'ssl://' . $dname . ':443';

            $context = stream_context_create(
                array(
                    'ssl' => array(
                        'capture_peer_cert' => true,
                    )
                )
            );
            ini_set('display_errors', 'Off'); 
            $fp = stream_socket_client($url, $err_no, $err_str, 30, STREAM_CLIENT_CONNECT, $context);
            //var_dump($fp);
            if (!$fp) {
                $dnameSSLData[$dname] = "НЕТ СЕРТИФИКАТА";
               // return;
            } else {
                $cert = stream_context_get_params($fp);
                //var_dump($fp);
                //получаем всю SSl информацию о текущем домене
                $info = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);
                //конкретика
                echo "<pre style='background:black;color:white;'>";
                //var_dump($info);
                echo "</pre>";
                $sslTill = date('Y-m-d', $info['validTo_time_t']);
                //формируем массив обьектов
                //обьект
                $domainData = (object)[
                    
                    'ssltill' =>$sslTill,
                ];

                //$obj['ssltill'] = $sslTill;
                //$obj = new ArrayObject($obj);
                $dnameSSLData[$dname] = $domainData;
            }
        }
        echo "<pre style='background:black;color:white;'>";
        var_dump($dnameSSLData);
        echo "</pre>";
        var_dump( $dnameSSLData['salyt73.ru']->ssltill);
    }
    //2 способ 
    // function getSSLDomainData($dnameArray)
    // {
    //     $dnameSSLData = [];
    //     foreach ($dnameArray as $i => $dname) {
    //         //echo $dname;
    //         # code...
    //         $stream = stream_context_create(
    //             array(
    //                 'ssl' => array(
    //                     'capture_peer_cert' => true,
    //                     'verify_peer' => false, // Т.к. промежуточный сертификат может отсутствовать,
    //                     'verify_peer_name' => false  // отключение его проверки.
    //                 )
    //             )
    //         );
    //         $read = fopen("http://$dname", "rb", false, $stream);
    //         $cont = stream_context_get_params($read);
    //         $var = ($cont["options"]["ssl"]["peer_certificate"]);
    //         $result = (!is_null($var)) ? true : false;
    //         $dnameSSLData[$dname] = "сертификат " . $result;
    //     }
    //     // echo "<pre>";
    //     var_dump($dnameSSLData);
    //     // echo "</pre>";
    // }
    function getAllDomainInfo()
    {
        //1. Получаем все доменные имена 
        $domainNames = R::getCol('SELECT dname FROM listdomain');
        //2. Получаем информацию о домене(Даты регистраций самого домена)
        //$this->getWhoisDomainData($domainNames[1]);
        //3. Получаем всю информацию о SSL домена
        $this->getSSLDomainData($domainNames);
    }
}
?>