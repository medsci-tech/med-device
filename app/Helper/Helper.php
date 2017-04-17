<?php
namespace App\Helper;

//use Curl\Curl;

/**
 * Class Helper
 * @package App\Helper
 */
class Helper
{

    /**
     * 发送数据
     * @param String $url     请求的地址
     * @param int  $method 1：POST提交，0：get
     * @param Array  $data POST的数据
     * @return String
     * @author  lxhui
     */
    public  function tocurl($url, $data,$method){
        $headers = array(
            "Content-type: application/json;charset='utf-8'",
            "Authorization:". env('API_TOKEN'),
            "Accept: application/json",
            "Cache-Control: no-cache","Pragma: no-cache",
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); //设置超时
        if(0 === strpos(strtolower($url), 'https')) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //从证书中检查SSL加密算法是否存在
        }
        //设置选项，包括URL
        if($method) // post提交
        {
            curl_setopt($ch, CURLOPT_POST,  True);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        $response =json_decode($output,true);
        return $response;
    }
    /**
     * @param $file
     * @return mixed
     */
    public function qiniuUpload($file)
    {
        $clientName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $newName = md5(date('ymdhis') . $clientName) . "." . $extension;
        $disk = \Storage::disk('qiniu');
        $contents = file_get_contents($file->getRealPath());
        $disk->put($newName, $contents);
        return $disk->getDriver()->downloadUrl($newName);
    }


}