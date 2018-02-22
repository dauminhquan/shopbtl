<?php

namespace Controller\Admin;
use Model\Anhsanpham;
use Model\Loaisanpham;
use Model\Sanpham;

class IndexController
{
    private  $sanpham;
    private $loaisp;
    private $anh;
    public function __construct()
    {
        $this->anh = new Anhsanpham();
        $this->sanpham = new Sanpham();
        $this->loaisp = new Loaisanpham();
    }

    public function index()
    {
        view('admin/index');
    }
    public function danhsachsanpham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['submit_delete']))
            {
                $id = (int)$_POST['submit_delete'];
                $sp = $this->sanpham->findId($id);
                if($sp == false)
                {
                    die("Đã xảy ra lỗi");
                }
                $all_url_anh = $this->anh->query("SELECT url FROM anh_sanpham WHERE id_sanpham = $id");

                if(count($all_url_anh) > 0 && $all_url_anh != 0)
                {
                    foreach ($all_url_anh as $img)
                    {
                        $url = $_SERVER['DOCUMENT_ROOT'].'/shopbtl/public/'.$img->url;
                        unlink($url);
                    }
                }
                //xoa xong anh
                if(!$this->sanpham->delete())
                {
                    die("da xay ra loi");
                }
            }

        }
        $table_name = $this->sanpham->table;
        $data = $this->sanpham->query("SELECT * FROM $table_name");
        view('admin/danhsachsanpham',['data' => $data]);
    }
    public function sanpham($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['submit']))
            {
                if(isset($_FILES['anh_sanpham']))
                {

                    if($_FILES['anh_sanpham']['name'][0] !="")
                    {

                        $all_file = $this->reArrayFiles($_FILES['anh_sanpham']);
                        $this->checkExtesion($all_file);
                        foreach ($all_file as $file) {
                            $url = $this->moveFile($file['name'],$file['tmp_name']);
                            if(!$this->anh->insert(['id_sanpham' => (int)$id,'url' => $url]))
                            {
                                die('Không thể kết nối đến csdl');
                            }
                        }
                    }

                }

                if(!$this->sanpham->update(['ten_sanpham' => $_POST['ten_sanpham'],'id_loaisanpham' => (int)$_POST['id_loaisanpham'],'gia_sanpham' => (int)$_POST['gia_sanpham'],'giam_gia' => (int)$_POST['giam_gia']
                ,
                    'gioi_thieu' => $_POST['gioi_thieu'],
                    'luu_y' => $_POST['luu_y']
                ],(int)$id))
                {
                    die('Lỗi update');
                }
            }


        }
        $sp = $this->sanpham->findId((int)$id);

        if(gettype($sp) != "object")
        {
            die('sản phẩm không tồn tại');
        }

        $ds_loaisp = $this->loaisp->query('SELECT * FROM loaisanpham');
        $ds_anh = $this->anh->query("SELECT * FROM anh_sanpham WHERE id_sanpham = $sp->id");
        view('admin/sanpham',['dsanh' => $ds_anh,'dsloaisp' => $ds_loaisp, 'sp' => $sp,'id' => $id]);
    }
    public function themsanpham()
    {
        if($_SERVER['REQUEST_METHOD'] === "POST")
        {


            $this->sanpham->insert([
                'ten_sanpham' => $_POST['ten_sanpham'],
                'gia_sanpham' => (int)$_POST['gia_sanpham'],
                'id_loaisanpham' => (int) $_POST['id_loaisanpham'],
                'gioi_thieu' => $_POST['gioi_thieu'],
                'giam_gia' => (int) $_POST['giam_gia'],
                'luu_y' => $_POST['luu_y']]);

            if(isset($_FILES['anh_sanpham']))
            {
                $id = (int)$this->sanpham->query('SELECT MAX(id) as id from sanpham')[0]->id;
                if($_FILES['anh_sanpham']['name'][0] !="")
                {

                    $all_file = $this->reArrayFiles($_FILES['anh_sanpham']);
                    $this->checkExtesion($all_file);
                    foreach ($all_file as $file) {
                        $url = $this->moveFile($file['name'],$file['tmp_name']);
                        if(!$this->anh->insert(['id_sanpham' => (int)$id,'url' => $url]))
                        {
                            die('Không thể kết nối đến csdl');
                        }
                    }
                }

            }
        }

            $ds_loaisp = $this->loaisp->query('SELECT * FROM loaisanpham');

            view('admin/themsanpham',['dsloaisp' => $ds_loaisp]);

    }
    public function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];

            }
        }

        return $file_ary;
    }
    public function checkExtesion($arr)
    {
        foreach ($arr as $item)
        {
            $info = pathinfo($item['name']);
            $ext = $info['extension'];
            if($ext != "jpg" && $ext != "jpeg" &&    $ext != "png")
            {
                echo $ext;
                die("Lỗi file tải lên");
            }
        }
    }
    public function moveFile($file_name,$tmp_name)
    {
        $info = pathinfo($file_name);
        $ext = $info['extension']; // get the extension of the file
        $newname = time().'.'.$ext;

        $target = $_SERVER['DOCUMENT_ROOT'].'/shopbtl/public/img/'.$newname;
        move_uploaded_file( $tmp_name, $target);
        return 'img/'.$newname;
    }
}