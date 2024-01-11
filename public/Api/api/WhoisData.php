<?php
//убираем Warnings при отсутствии SSL
ini_set('display_errors', 'Off');

class WhoisData
{
    //1. Читаем все домены
    //2. Узнаем всю информацию о каждом домене 
    //3. Записываем в таблицу актуальную информацию 
    // function test2($dname)
    // {
    //     $g = stream_context_create(array("ssl" => array("capture_peer_cert" => true)));
    //     // $r = fopen("https://vdpo73.ru", "rb", true, $g) or  die (error_get_last());
    //     if (!fopen("https://$dname/", "rb", false, $g)) {
    //         echo "Сертификат отсутствует";
    //         exit;
    //     }

    //     $r = fopen("https://$dname/", "rb", false, $g);
    //     $cert = stream_context_get_params($r);
    //     $certinfo = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);
    //     echo "Certificate info: <pre>" . print_r($certinfo, true) . "</pre>";

    //     $data['start'] = date("d.m.Y", $certinfo['validFrom_time_t']);
    //     $data['end'] = date("d.m.Y", $certinfo['validTo_time_t']);

    //     print_r($data);


    // }
    function test($dname)
    {
        $dnameData = [];
        $whois = new Whois();

        $query = $dname;
        $result = $whois->Lookup($query, false);
        echo "<pre>";
        var_dump($result);
        echo "</pre>";

    }
    function getWhoisDomainData($result)
    {
        $resultData = [];
        foreach ($result['rawdata'] as $value) {
            //created
            if (strpos($value, 'paid-till:') !== false) {
                $resultData['paidTill'] = date('Y-m-d', strtotime(explode('     ', $value)[1]));
            }
            if (strpos($value, 'Registry Expiry Date:') !== false) {
                $resultData['paidTill'] = $value;
            }
            if (strpos($value, 'Registrar Registration Expiration Date:') !== false) {
                $resultData['paidTill'] = $value;
            }
            if (strpos($value, 'created:') !== false) {
                $resultData['created'] = date('Y-m-d', strtotime(explode('     ', $value)[1]));
            }
            if (strpos($value, 'Creation Date:') !== false) {
                $resultData['created'] = $value;
            }
        }
        return $resultData;
    }
    function getSSLWhoisDomainData($dnameArray)
    {
        $dnameData = [];
        $whois = new Whois();

        foreach ($dnameArray as $i => $dname) {
            $query = $dname;
            $result = $whois->Lookup($query, false);

            $context = stream_context_create(array("ssl" => array("capture_peer_cert" => true)));

            if (!fopen("https://$dname", "rb", false, $context)) {
                $domainData = [
                    'dname' => $dname,
                    'paidtill' => $this->getWhoisDomainData($result)['paidTill'],
                    'datecreated' => $this->getWhoisDomainData($result)['created'],
                    'ssltill' => "НЕТ СЕРТИФИКАТА",

                ];
                $dnameData[] = $domainData;
            } else {
                $fp = fopen("https://$dname", "rb", false, $context);
                $cert = stream_context_get_params($fp);
                //var_dump($fp);
                //получаем всю SSl информацию о текущем домене
                $info = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);
                //конкретика
                echo "<pre style='background:black;color:white;'>";
                echo "</pre>";
                $sslTill = date('Y-m-d', $info['validTo_time_t']);
                //формируем массив массивов
                $domainData = [
                    'dname' => $dname,
                    'paidtill' => $this->getWhoisDomainData($result)['paidTill'],
                    'datecreated' => $this->getWhoisDomainData($result)['created'],
                    'ssltill' => $sslTill,

                ];
                $dnameData[] = $domainData;
            }
        }
        echo "<pre style='background:black;color:white;'>";
        var_dump($dnameData);
        echo "</pre>";
        return $dnameData;
        //var_dump($dnameData['salyt73.ru']['ssltill']);
    }
    //функция обновленич информации и записи в бд
    function sendAllDomainDataToDB($whoisSSLData)
    {
        R::wipe('dstat');
        foreach ($whoisSSLData as $key => $value) {
            $table = R::dispense('dstat');

            foreach ($value as $param => $value1) {
                $table->$param = $value1;
                R::store($table);

            }

        }
    }
    function getAllDomainInfo()
    {
        //1. Получаем все доменные имена 
        $domainNames = R::getCol('SELECT dname FROM listdomain');
        //2. Получаем информацию о домене(Даты регистраций самого домена)
        //3. Получаем всю информацию о SSL домена

        $this->sendAllDomainDataToDB($this->getSSLWhoisDomainData($domainNames));
        //$this->getSSLWhoisDomainData($domainNames);
    }
    function getAllDomainData($limit)
    {
        $domainsInfo = R::getAll("SELECT * FROM  dstat ORDER BY id DESC limit " . $limit);
        //$domainsInfo = R::findAll("dstat");
        return $domainsInfo;
        //var_dump($domainsInfo);
    }
}
?>