<?php
/*如何知道图片的类型和大xiao
 * 利用getimagesize（），获得以下属性
Array
(
    [0] => 533      //宽
    [1] => 300      //高
    [2] => 2        //图片类型 jpg
    [3] => width="533" height="300"
    [bits] => 8
    [channels] => 3
    [mime] => image/jpeg
)
 *
 *
$arr = getimagesize('./sanyecao.jpg');
echo image_type_to_mime_type($arr[2]),'类型<br/>';
print_r($arr);
*/
//先获得图片的信息
//水印，把制定图片复制到目标上，并加上透明效果
//缩略图:把大尺寸图片复制到小尺寸图片上
namespace App\Org;
class ImageTool{
    //image info 分析图片的信息，返回信息数组
    public static function imageInfo($image){
        //判断文件是否存在
        if(!file_exists($image)){
            return false;
        }
        $info = getimagesize($image);
        if($info == false){
            return false;
        }
        $img['width'] = $info['0'];
        $img['height'] = $info['1'];
        $img['ext'] = substr($info['mime'],strpos($info['mime'],'/')+1);
        //print_r($img);
        return $img;
    }
    //加水印
    //string $dst   带操作图片
    //$wter         水印图片
    //$savepath     保存路径  不填则默认替换原始图
    //$alpha        水印透明度
    //$pos          水印位置 0：左上角 1：右上角 2：左下角 3：右下角
    public static function water($dst,$water,$save=NULL,$pos=2,$alpha=50){
        if(!file_exists($dst) || !file_exists($water)){
            echo '文件不存在';
            return false;
        }
        //保证水印不能比带操作图片大
        $dinfo = self::ImageInfo($dst);     //原始图片信息
        $winfo = self::ImageInfo($water);   //水印图片信息

        //水印图片不能大于操作图片
        if($winfo['height']>$dinfo['height'] || $winfo['width']>$dinfo['width']){
            return false;
        }
        //加水印，把两张图都读到画布上  根据类型创建画布 动态加载函数
        $dfunc = 'imagecreatefrom'.$dinfo['ext'];
        $wfunc = 'imagecreatefrom'.$winfo['ext'];
        if(!function_exists($dfunc) || !function_exists($wfunc)){
            return false;
        }
        //动态加载函数来创建画布
        $dim = $dfunc($dst);        //创建带操作画布
        $wim = $wfunc($water);      //创建水印画布
        //根据水印位置计算粘贴坐标
        switch($pos){
            case 0:             //左上角
                $posx = 0;
                $posy = 0;
                break;
            case 1:             //右上角
                $posx = $dinfo['width']-$winfo['width'];
                $posy = 0;
                break;
            case 3:             //左下角
                $posx = $dinfo['width']-$winfo['width'];
                $posy = $dinfo['height']-$winfo['height'];
                break;
            case 2:
            default:            //默认右下角
                $posx = 0;
                $posy = $dinfo['height']-$winfo['height'];
                break;
        }
        //正式加水印
        imagecopymerge($dim,$wim,$posx ,$posy ,0 ,0 ,$winfo['width'],$winfo['height'],$alpha);
        //保存图片
        if(!$save){
            $save = $dst;
            unlink($dst);       //删除原图
        }
        $createfunc = 'image'.$dinfo['ext'];
        $createfunc($dim,$save);
        imagedestroy($dim);
        imagedestroy($wim);
        return true;
    }
    //生成缩略图
    //
    //
    public static function thumb($dst,$save=NULL,$widht=200,$height=200)
    {
        $dinfo = self::ImageInfo($dst);
        //var_dump(self::ImageInfo($dst));
        //var_dump($dinfo);
        //判断待处理图片是否存在
        if($dinfo == false){
            return false;
        }
        //处理缩放
        //计算缩放比例
        $calc = min($widht/$dinfo['width'],$height/$dinfo['height']);

        //创建画布
        $dfunc = 'imagecreatefrom'.$dinfo['ext'];
        //echo $dfunc;
        //动态加载函数来创建画布
        $dim = $dfunc($dst);        //创建带操作画布
        //创建缩略画布
        $tim = imagecreatetruecolor($widht,$height);
        $white = imagecolorallocate($tim,255,255,255);
        //填充缩略画布
        imagefill($tim,0,0,$white);
        $dwidht = $dinfo['width']*$calc;
        $dheight = $dinfo['height']*$calc;

        //留白计算
        $paddingx = (int)($widht - $dwidht)/2;
        $paddingy = (int)($height - $dheight)/2;
        //复制并缩略
        imagecopyresampled($tim,$dim,$paddingx,$paddingy,0,0,$dwidht,$dheight,$dinfo['width'],$dinfo['height']);
        //保存图片
        if(!$save){
            $save = $dst;
            unlink($dst);
        }
        $createfunc = 'image'.$dinfo['ext'];
        $createfunc($tim,$save);
        imagedestroy($dim);
        imagedestroy($tim);
        return true;
    }
    //生成验证码
    public static function captcha($width=55,$height=28){
        //造化布
        $image = imagecreatetruecolor($width,$height);
        $d_image = imagecreatetruecolor($width,$height);
        //造背景色
        $gray = imagecolorallocate($image,200,200,200);
        $d_gray = imagecolorallocate($d_image,200,200,200);
        //填充背景色
        imagefill($image,0,0,$gray);
        imagefill($d_image,0,0,$d_gray);
        //造随机字体颜色
        $color = imagecolorallocate($image,mt_rand(0,125),mt_rand(0,125),mt_rand(0,125));
        //造随机线条颜色
        $color1 = imagecolorallocate($image,mt_rand(100,125),mt_rand(100,125),mt_rand(0,125));
        $color2 = imagecolorallocate($image,mt_rand(100,125),mt_rand(100,125),mt_rand(0,125));
        $color3 = imagecolorallocate($image,mt_rand(100,125),mt_rand(100,125),mt_rand(0,125));
        //在画布上画线
        imageline($image,mt_rand(0,50),mt_rand(0,25),mt_rand(0,50),mt_rand(0,25),$color1);
        imageline($image,mt_rand(0,50),mt_rand(0,25),mt_rand(0,50),mt_rand(0,25),$color2);
        imageline($image,mt_rand(0,50),mt_rand(0,25),mt_rand(0,50),mt_rand(0,25),$color3);

        //在画布上写字
        $text = substr(str_shuffle('abcdefghijkmnpqrstuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ23456789'),0,1);
        //session_start();
        $_SESSION['vc'] = $text;
        imagestring($image,5,7,5,$text,$color);

        for($i = 0; $i<60; $i++){
            $offset = 3;        //最大波动频率
            $round = 2;         //两个周期
            $posy =round( SIN($i*$round*2*M_PI/60)*$offset);
            imagecopy($d_image,$image,$i,$posy,$i,0,1,25);
        }
        //显示，销毁
        ob_clean();
        header('content-type:image/jpeg');
        imagejpeg($d_image);
        imagedestroy($d_image);
        imagedestroy($image);

        return $text;
    }
}
//print_r(ImageTool::imageInfo('./sanyecao.jpg'));
//生成水印图
/*
var_dump(ImageTool::water('./sanyecao.jpg','./xiao.png','./aaa1.jpg',0));
var_dump(ImageTool::water('./sanyecao.jpg','./xiao.png','./aaa2.jpg',1));
var_dump(ImageTool::water('./sanyecao.jpg','./xiao.png','./aaa3.jpg',2));
var_dump(ImageTool::water('./sanyecao.jpg','./xiao.png','./aaa4.jpg',3));
 */
/*
生成留白的等比例缩略图
 */
/*
var_dump(ImageTool::thumb('./sanyecao.jpg','./sanyecao1.jpg',200,200));
var_dump(ImageTool::thumb('./sanyecao.jpg','./sanyecao2.jpg',200,300));
var_dump(ImageTool::thumb('./sanyecao.jpg','./sanyecao3.jpg',300,200));
 */
//生成验证码
$tool = new ImageTool;
$aa = $tool -> captcha();
//var_dump($aa);
?>