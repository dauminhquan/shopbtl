<?php
namespace Controller\Admin;

use Model\Anhsanpham;

class ApiController
{
    private $content;
    public function xoaanh()
    {

        if($_SERVER['REQUEST_METHOD'] === "DELETE")
        {

            $request = $this->getRequest();
            if($request == false)
            {
                http_response_code(404);
                die();
            }
            if(!array_key_exists('id',$request))
            {
                http_response_code(404);
                die();
            }
            $anhsp = new Anhsanpham();
            $request = (object)$request;
            $anhsp->findId((int)$request->id);

            if($anhsp->me == false)
            {
                http_response_code(404);
                header('Content-type: application/json');
                echo json_encode(
                    [
                    "message" => "Khong tim thay anh"
                    ]
                );
                die();

            }
            else
            {

                if($anhsp->delete() == false)
                {
                    http_response_code(504);
                    die();
                }
                $url = $_SERVER['DOCUMENT_ROOT'].'/shopbtl/public/'.$anhsp->me->url;
                unlink($url);
                echo json_encode(
                [
                    "sc" => true
                ]
                );
                die();
            }

        }
        http_response_code(405);
        header('Content-type: application/json');
        echo json_encode(
            [
                "message" => "Khong tim thay anh"
            ]
        );
        die();
    }
    private function getRequest()
    {
        parse_str($this->getContent(), $request_vars );
        return $request_vars;
    }
    public function getContent()
    {
        if (null === $this->content)
        {
            if (0 === strlen(trim($this->content = file_get_contents('php://input'))))
            {
                $this->content = false;
            }

        }

        return $this->content;
    }
}