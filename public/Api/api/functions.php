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



        $resArray['freeDate'] = explode('     ', $result['rawdata'][14])[1];
        $resArray['paidTill'] = explode('     ', $result['rawdata'][13])[1];
        $resArray['createdDate'] = explode('     ', $result['rawdata'][12])[1];
        echo '<pre>';
        var_dump($resArray);
        echo '</pre>';

    }
    function getSSLDomainData($dname)
    {
        $url = 'ssl://' . $dname . ':443';

        $context = stream_context_create(
            array(
                'ssl' => array(
                    'capture_peer_cert' => true,
                    'verify_peer' => false, // Т.к. промежуточный сертификат может отсутствовать,
                    'verify_peer_name' => false  // отключение его проверки.
                )
            )
        );

        $fp = stream_socket_client($url, $err_no, $err_str, 30, STREAM_CLIENT_CONNECT, $context);
        $cert = stream_context_get_params($fp);

        if (empty($err_no)) {
            $info = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);
            echo '<pre>';


            $resSSlArray['ssltill'] = date('Y-m-d', $info['validTo_time_t']);
            var_dump($resSSlArray);

            echo '</pre>';
        }

    }
    function getAllDomainInfo()
    {
        //1. Получаем все доменные имена 
        $domainNames = R::getCol('SELECT dname FROM listdomain');
        //2. Получаем информацию о домене(Даты регистраций< SSl)
        //$this->getWhoisDomainData($domainNames[1]);
        //$this->getSSLDomainData($domainNames[1]);
        $this->getSSLDomainData('vdpo73.ru');
    }
}
?>