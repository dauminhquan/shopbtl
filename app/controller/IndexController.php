<?php 
	namespace Controller;
    use Model\Anhsanpham;
    use Model\Gioitinh;
    use Model\Loaisanpham;
    use Model\Sanpham;

    /**
	* 
	*/
	class IndexController
	{
		private $sanpham;
		private $gioitinh;
		private $loaisanpham;
		private $anh_sp;
		public function __construct()
        {
            $this->gioitinh = new Gioitinh();
            $this->sanpham = new Sanpham();
            $this->loaisanpham = new Loaisanpham();
            $this->anh_sp = new Anhsanpham();
        }

        function index()
		{
		    $data = $this->sanpham->query('SELECT sanpham.* FROM sanpham LIMIT 12');
		    foreach ($data as $item)
            {
               $item->url = $this->anh_sp->query('SELECT url FROM anh_sanpham WHERE id_sanpham = '.(int)$item->id.' LIMIT 1')[0]->url;
            }

			view("index",['data' => $data]);
		}
		public function sanpham($id)
		{

            $data = $this->sanpham->findId((int)$id);
            $id= (int)$id;
            $anh_sp = $this->anh_sp->query("SELECT * FROM anh_sanpham WHERE id_sanpham = $id");
            if($data == false)
            {
                die("Không tồn tại sản phẩm");
            }
            $id_loaisp = (int)$data->id_loaisanpham;
            $cac_spkhac = $this->sanpham->query("SELECT sanpham.*,anh_sanpham.url FROM sanpham INNER JOIN anh_sanpham WHERE sanpham.id_loaisanpham = $id_loaisp AND sanpham.id!= $id LIMIT 1");

            view("sanpham",['data' => $data,'anh_sp' => $anh_sp,'cac_sanpham_khac' => $cac_spkhac]);
		}
		public function loaisanpham($id)
		{
		    $id = (int)$id;
		    $loaisanpham = $this->loaisanpham->findId((int)$id);
		    if(gettype($loaisanpham) != "object")
            {
                die('Loại sản phẩm không tồn tại');
            }

            $data = $this->sanpham->query("SELECT * from sanpham where id_loaisanpham = $id");

		    if($data != 0)
            {
                foreach ($data as $item)
                {
                    $id_sp = (int)$item->id;
                    $item->url = $this->anh_sp->query("SELECT url FROM anh_sanpham WHERE id_sanpham = $id_sp LIMIT 1")[0]->url;
                }
            }

            $ten_gioitinh = $this->gioitinh->query("SELECT * from gioi_tinh Where id = $loaisanpham->id_gioitinh")[0]->ten_gioitinh;


			view("loaisanpham", ['data' => $data,'ten_gioitinh' => $ten_gioitinh]);
		}
		public function thanhtoan()
		{
			view("thanhtoan");
		}
		public function checkout()
		{
			view("checkout");
		}
	}
 ?>