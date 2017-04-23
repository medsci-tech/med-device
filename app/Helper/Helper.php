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

    /**
     * @param int $start
     * @param int $end
     * @return string
     */
    public static function generateMessageVerify($start = 000000, $end = 999999)
    {
        return sprintf('%06d',random_int($start, $end));
    }

    /** 短信发送
     * @param $phone 电话
     * @param $message 发送内心
     * @return mixed
     */
    public  function sendCode($phone,$code,$message=null)
    {
        $message = $message ? $message : '验证码：'.$code.'【药械通】';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://sms-api.luosimao.com/v1/send.json");

        curl_setopt($ch, CURLOPT_HTTP_VERSION  , CURL_HTTP_VERSION_1_0 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 8);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPAUTH , CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD  , 'api:key-'.env('LUOSIMAO_API_KEY'));

        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('mobile' => $phone,'message' => $message));

        $res = curl_exec( $ch );
        $res = json_decode( $res,true);
        curl_close( $ch );
        return $res;
    }

    /** 短信合法验证
     * @param $phone 电话
     * @param $code 验证码
     * @return mixed
     */
    public static function checkCode($code,$phone)
    {
        /* 验证码验证 */
        $auth_code = \Cache::get($phone);
        if ($code != $auth_code)
            return false;
        else
            return true;
    }

}