<?php
class Format
{
    public static function create_slug($string) {
        $search = array (
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
            ) ;
        $replace = array ('a', 'e', 'i', 'o', 'u', 'y', 'd', 'A', 'E', 'I', 'O', 'U', 'Y', 'D', '-', ) ;
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
        return $string;
    }

    public static function num_format($number,$precision=0)
    {
        $precision = ($precision == 0 ? 1 : $precision);
        $pow = pow(10, $precision);
        $value = (int)((trim($number)*$pow))/$pow;

        return number_format($value,$precision);
    }

    public static function formatCurrency($number, $suffix = ' ₫'){
        if( !empty($number) ) {
            return number_format($number,0,'','.').$suffix;
        } return null;
    }

    public static function validationSearch($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = addslashes($data);
        $data = str_replace(["'",'"',"''","=","/","\\"], [''], $data);
        return $data;
    }

    public static function formatPhone($phone) {
        if(strlen($phone) == 11) {
            if(  preg_match( '/^\d(\d{2})(\d{4})(\d{4})$/', $phone,  $matches ) ) {
                $result = '(0' . $matches[1] . ') ' .$matches[2] . ' ' . $matches[3];
                return $result;
            }
        } else {
            if(  preg_match( '/^\d(\d{3})(\d{3})(\d{3})$/', $phone,  $matches ) ) {
                $result = '(0' . $matches[1] . ') ' .$matches[2] . ' ' . $matches[3];
                return $result;
            }
        }
    }

    public static function formatTime($timezone)
    {
        if(!empty($timezone)) {
            $date = getdate($timezone);
            if(strlen($date['mday']) === 1) {
                $date['mday'] = "0".$date['mday'];
            }
            if(strlen($date['mon']) === 1) {
                $date['mon'] = "0".$date['mon'];
            }
            return "{$date['mday']}/{$date['mon']}/{$date['year']}";
        } return null;
    }

    public static function formatGender($gender) {
        $data = [
            "male"   => "Anh",
            "female" => "Chị"
        ];
        return $data[$gender];
    }
}