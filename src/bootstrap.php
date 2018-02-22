<?php
include_once __DIR__.'/../config/route.php';
show_all_file(__DIR__.'/../app');
foreach ($route as $key => $value) {

    $oldkey = $key;

    if($key[0] != '/')
    {
        $key ='/'.$key;
    }

    if($key[strlen($key) - 1] != '/')
    {
        $key.= '/';
    }

    $route[$key] = $route[$oldkey];


    if($key!=$oldkey)
    {
        unset($route[$oldkey]);
    }

}




function kiem_tra_url($route,$string)
{
    $full_key = array_keys($route);
    $size = sizeof($full_key);
    if($string[0] != '/')
    {
        $string = '/'.$string;
    }
    if($string[strlen($string)- 1] != '/')
    {
        $string.= '/';
    }

    $string = explode('/', $string);
    $string =  array_diff( $string, array( '' ) );
    $string = array_slice($string,0);

    for ($i=0; $i < $size ; $i++) {
// tach size
        $root_key = $full_key[$i];
        if($full_key[$i][0] != '/')
        {
            $full_key[$i] = '/'.$full_key[$i];
        }
        if($full_key[$i][strlen($full_key[$i])- 1] != '/')
        {
            $full_key[$i].= '/';
        }

        $url_route = explode('/', $full_key[$i]);

        $url_route= array_diff( $url_route, array( '' ) );
        $url_route=array_slice($url_route,0);



        if(sizeof($url_route) != sizeof($string))
        {
            continue;
        }
        $sc = true;

        for ($j=0; $j <sizeof($url_route) ; $j++) {

            if($url_route[$j][0] == '{')
            {
                continue;
            }
            if($url_route[$j] != $string[$j])
            {
                $sc = false;
                break;
            }
        }
        if($sc == true)
        {
            return $root_key;
        }
    }
    return -1;
}

function tach_dulieu($url_key,$string)
{
    $url_route = explode('/', $url_key);
    $string = explode('/', $string);
    $arr_sc = [];
// loai bo phan tu trong
    $url_route= array_diff( $url_route, array( '' ) );
    $url_route=array_slice($url_route,0);
    $string= array_diff( $string, array( '' ) );
    $string=array_slice($string,0);

    for ($j=0; $j <sizeof($url_route) ; $j++) {
        if($url_route[$j][0] == '{')
        {
            $vl_key = str_replace('{','',$url_route[$j]);
            $vl_key = str_replace('}','',$vl_key);
            array_push($arr_sc, [
                'key' => $vl_key,
                'value' => $string[$j]
            ]);
        }

    }
    return $arr_sc;
}
function view($file_url,array $arr = null)
{
    if(!empty($arr))
    {
        foreach ($arr as $key => $value)
        {
            ${$key} = $value;
        }    
    }
    


    include_once __DIR__.'/../app/view/'.$file_url.'.php';
}
function thuc_thi()
{
    if(!isset($_GET['url']))
    {
        $_GET['url'] = '/';
    }
    $string = $_GET['url'];

    global $route;
    $success = kiem_tra_url($route, $string);

    if(-1 != $success)
    {

        $arr_sc = tach_dulieu($success, $string);
        $controller = explode('@', $route[$success]);

        $ut = $controller[0];
        $hs = new $ut();
        $fc = $controller[1];
        $sc = [];
        for ($i = 0;$i< count($arr_sc);$i++)
        {
            $key_name = key($arr_sc[$i]);
            $$key_name = $arr_sc[$i]['value'];
            array_push($sc,$$key_name);
        }
        $classMethod = new ReflectionMethod($ut,$fc);
        $argumentCount = count($classMethod->getParameters());

        if($argumentCount != count($sc))
        {
            print_r('Lỗi');
            die();
        }

        $data = $hs->$fc(...$sc);
//ok

    }
    else
    {
        die("Url không tồn tại");
    }
}

function show_all_file($url)
{
    $ctl = scandir($url,1);

 
    foreach ($ctl as $key => $value) {
        if($value!= '.' && $value != '..' && $value != 'view')
        {
            if(is_dir($url.'/'.$value))
            {

                show_all_file($url.'/'.$value);
                
               
            }
            else
            {
                spl_autoload_register(function () use ($value,$url) {
                include_once $url.'/'.$value;
            });
                
            }
        }

       
    }
}
function url_fontend($url)
{

    return str_replace("C:\\xampp\htdocs\\","http://localhost/",__DIR__.'/../public/'.$url);
}