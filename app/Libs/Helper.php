<?php

namespace App\Libs;

use App\Libs\ucpass\Ucpass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class Helper
{

    /**
     * @param array $data
     * @param int $status
     * @param array $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public static function response(array $data = [], $status = 200, array $headers = [])
    {
        $code = 200;
        $content = [
            'code' => $code,
            'msg' => 'success',
            'data' => $data,
        ];
        //Log::debug('response------------- ' . json_encode($content));
        return response($content, $status, $headers);
    }

    /**
     * @param int $code
     * @param array $data
     * @param array $replaces
     * @param int $status
     * @param array $headers
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public static function responeseError($code = 500, array $data = [], $replaces = [], $status = 200, array $headers = [])
    {

        $errMsg = ErrorCode::getErrMsg();
        $content = [
            'code' => $code,
            'msg' => isset($errMsg[$code]) ? $errMsg[$code] : '',
        ];
        if ($replaces) {
            $newReplaces = [];
            foreach ($replaces as $k => $replace) {
                $newReplaces['{' . $k . '}'] = $replace;
            }
            $content['msg'] = strtr($content['msg'], $newReplaces);
        }
        $content = array_merge($content, $data);
        //Log::error('response error----------- ' . json_encode($content));
        return response($content, $status, $headers);

    }

    //生成随机验证码
    public static function rand_verify_code($num)
    {

        $count = 0;
        $str = '';
        while ($count < $num) {
            $str .= rand(0, 9);
            $count++;
        }

        return $str;

    }

    public static function sendShortMessage($options, $appId, $to, $templateId, $msg)
    {
        $ucpaas = New Ucpass($options);
        //发送模板短信
        return $ucpaas->templateSMS($appId, $to, $templateId, $msg);

    }

    public static function arrayToXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_array($val)) {
                $xml .= "<" . $key . ">" . arrayToXml($val) . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    public static function postXmlCurl($url, $xmlData)
    {
        $header[] = "Content-type: text/xml";      //定义content-type为xml,注意是数组
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            printcurl_error($ch);
        }
        curl_close($ch);
        return $response;
    }

    public static function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }

    /*
     * 验证签名(按Asci从小到大排序)
     * @param $data
     * @param $key
     * @return bool
     */
    public static function commonCheckSign($data, $key)
    {
        if (!isset($data['sign'])) {
            return false;
        }

        $sign = $data['sign'];
        unset($data['sign']);
        ksort($data);

        $str = '';
        if ($data) {
            foreach ($data as $row) {
                $str .= $row;
            }
        }
        $str .= $key;

        return md5($str) === $sign;
    }

    /**
     * 过滤后，返回必要的字段
     * @param $arrFilter
     * @param $arrData
     * @param bool $returnKey
     * @param array $allowEmptys
     * @return array|bool|string
     */
    public static function arrayRequiredCheck($arrFilter, $arrData, $returnKey = false, $allowEmptys = [])
    {
        $data = [];
        foreach ($arrFilter as $filter) {
            if (array_key_exists($filter, $arrData) && $arrData[$filter] !== '' && $arrData[$filter] !== null) {
                $data[$filter] = $arrData[$filter];
            } elseif (in_array($filter, $allowEmptys)) {
                $data[$filter] = null;
            } else {
                if ($returnKey) {
                    return $filter;
                } else {
                    return false;
                }
            }
        }
        return $data;
    }

    public static function getQrUrl($imgPath)
    {
        $qrcode = new \QrReader($imgPath);
        $url = $qrcode->text();
        //有时会解析失败，解析失败调用api来解析
        if (!$url) {
            Log::error('qr decode fail with data ' . $imgPath);
            $qrApi = new QrApi();
            $url = $qrApi->qrdecode($imgPath);
            if (!$url) {
                Log::error('qr decode fail for api with data ' . $imgPath);
                return false;
            }
        }
        return $url;

    }

    /**
     * 转成一维数组
     * @param array $array
     * @param $keyname
     */
    public static function transToOneDimensionalArray(array $array, $keyname)
    {
        if ($array) {
            foreach ($array as &$item) {
                $item = $item[$keyname];
            }
        }
        return $array;
    }

    /**
     * @param $array
     * @param $key
     * @param $value
     */
    public static function transToKeyValueArray($array, $key, $value)
    {
        $data = [];
        foreach ($array as $row) {
            $data[$row[$key]] = $row[$value];
        }
        return $data;
    }

    public static function readExcelFromRequest(Request $request, $filename)
    {
        try {
            $file = $request->file($filename)->getRealPath();
            $inputFileType = \PHPExcel_IOFactory::identify($file);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($file);
            $sheet = $objPHPExcel->getSheet(0);
            $data = $sheet->toArray();
            return $data;
        } catch (\Exception $e) {
            Log::error('read excel error ' . $e->getMessage());
            return false;
        }
    }

    /**
     * 数据导出
     * @param array $title 标题行名称
     * @param array $data 导出数据
     * @param string $fileName 文件名
     * @param string $savePath 保存路径
     * @param bool $type false--保存   true--下载
     * @return string   返回文件全路径
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     */
    public static function exportExcel($title = array(), $data = array(), $fileName = '', $savePath = './', $isDown = true)
    {
        $obj = new \PHPExcel();

        //横向单元格标识
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

        $obj->getActiveSheet()->setTitle('sheet名称');   //设置sheet名称
        $_row = 1;   //设置纵向单元格标识
        if ($title) {
            $_cnt = count($title);
            $obj->getActiveSheet()->mergeCells('A' . $_row . ':' . $cellName[$_cnt - 1] . $_row);   //合并单元格
            $obj->setActiveSheetIndex(0)->setCellValue('A' . $_row, '数据导出：' . date('Y-m-d H:i:s'));  //设置合并后的单元格内容
            $_row++;
            $i = 0;
            foreach ($title AS $v) {   //设置列标题
                $obj->setActiveSheetIndex(0)->setCellValue($cellName[$i] . $_row, $v);
                $i++;
            }
            $_row++;
        }

        //填写数据
        if ($data) {
            $i = 0;
            foreach ($data AS $_v) {
                $j = 0;
                foreach ($_v AS $_cell) {
                    $obj->getActiveSheet()->setCellValue($cellName[$j] . ($i + $_row), $_cell);
                    $j++;
                }
                $i++;
            }
        }

        //文件名处理
        if (!$fileName) {
            $fileName = uniqid(time(), true);
        }

        $objWrite = \PHPExcel_IOFactory::createWriter($obj, 'Excel2007');

        if ($isDown) {   //网页下载
            header('pragma:public');
            //header('Content-Type: application/vnd.ms-excel');
            header("Content-Disposition:attachment;filename=$fileName.xlsx");
            $objWrite->save('php://output');
            exit;
        }

        //$_fileName = iconv("utf-8", "gb2312", $fileName);   //转码
        $_savePath = $savePath . $fileName . '.xlsx';
        $objWrite->save($_savePath);

        return $savePath . $fileName . '.xlsx';
        //exportExcel(array('姓名','年龄'), array(array('a',21),array('b',23)), '档案', './', true);
    }

    /**
     * @creator Jimmy
     * @data 2018/1/05
     * @desc 数据导出到excel(csv文件)
     * @param string $filename 如date("Y年m月j日").'-test.csv'
     * @param array $tileArray 所有列名称
     * @param array $dataArray 所有列数据
     */
    public static function simpleExportExcel($tileArray = [], $dataArray = [], $filename)
    {
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 0);
        ob_end_clean();
        ob_start();
        header("Content-Type: text/csv");
        header("Content-Disposition:filename=" . $filename);
        $fp = fopen('php://output', 'w');
        fwrite($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));//转码 防止乱码(比如微信昵称(乱七八糟的))
        fputcsv($fp, $tileArray);
        $index = 0;
        foreach ($dataArray as $item) {
            if ($index == 1000) {
                $index = 0;
                ob_flush();
                flush();
            }

            $index++;
            fputcsv($fp, $item);
        }

        ob_flush();
        flush();
        ob_end_clean();
        return true;
    }


}