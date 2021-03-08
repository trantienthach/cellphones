<?php

class BrandController extends BaseController {

    private $BrandModel;

    public function __construct()
    {
        $this->BrandModel = $this->model("BrandModel");
    }

    public function index() {
        $this->view("Frontend.Brand.index");
    }

    public function add(){

        if( isset( $_POST['addBrand_action'] ) ) {
            $error = [];
            global $error;

            /**
             * -- check status
             */
            $brand_is_status = !empty($_POST['brand_status']) ? "on" : "off";

            /**
             * -- check brand name
             */
            if( empty($_POST['brand_name']) ) {
                $error['brand_name'] = "<span class='error'>(*) Vui lòng nhập tên thương hiệu</span>";
            } else {
                $brand_name = $_POST['brand_name'];
            }

            /**
             * -- check brand logo
             */
            if( empty($_POST['brand_logo']) ) {
                $error['brand_logo'] = "<span class='error'>(*) Vui lòng chọn logo thương hiệu</span>";
            } else {
                $brand_logo_file = json_decode($_POST['brand_logo'], true);
                if( !empty($brand_logo_file['targetFile']) ) {
                    $brand_logo_tmp = $brand_logo_file['tmp_name'];
                    $brand_logo = $brand_logo_file['targetFile']; // "public/img/a.png"
                } else {
                    $brand_logo = $_POST['brand_logo']; // '{'target':'?','tmp_name':'?'}'
                }
                $_POST['brand_logo'] = $brand_logo;
            }

            /**
             * check order
             */
            $brand_order = !empty($_POST['brand_order']) ? (int)$_POST['brand_order'] : $this->BrandModel->getOrderMax()+1;

            /**
             * check brand metal title
             */
            if (!empty($_POST['brand_meta_keywords'])) {
                $brand_meta_keywords = $_POST['brand_meta_keywords'];
            }

            if (!empty($_POST['brand_meta_title'])) {
                $brand_meta_title = $_POST['brand_meta_title'];
            }
            else {
                $error['brand_meta_title'] = "<span class='error'>(*) Vui lòng nhập tiêu đề thương hiệu</span>";
            }

            if(!empty($_POST['brand_meta_desc'])) {
                $brand_meta_desc = $_POST['brand_meta_desc'];
            }
            else {
                $error['brand_meta_desc'] = "<span class='error'>(*) Vui lòng nhập mô tả thương hiệu</span>";
            }

            if(!empty($_POST['brand_meta_url'])) {
                $brand_meta_url = $_POST['brand_meta_url'];
            }
            else {
                $error['brand_meta_url'] = "<span class='error'>(*) Vui lòng nhập đường dẫn seo </span>";
            }

            if( empty($error) ) {
                if( !$this->BrandModel->checkBrandExists($brand_name) ) {
                    $dataBrand = [
                        "brand_name" => $brand_name,
                        "brand_logo" => $brand_logo,
                        "brand_order" => $brand_order,
                        "brand_meta_title" => $brand_meta_title,
                        "brand_meta_desc" => $brand_meta_desc,
                        "brand_meta_url" => $brand_meta_url,
                        "brand_meta_keywords" => $brand_meta_keywords,
                        "brand_create_date" => time(),
                        "brand_creator_id" => "1",
                        "brand_is_status" => $brand_is_status
                    ];
                    $brand_id = $this->BrandModel->addBrandNew($dataBrand);
                    if( is_int($brand_id) ) {
                        if( !empty($brand_logo_tmp) ) {
                            move_uploaded_file( json_decode($brand_logo_tmp), $brand_logo );
                        }
                        $dataStatusAddBrand = [
                            "status" => "success",
                            "notifi" => "Thêm dữ liệu thành công"
                        ];
                    } else {
                        $dataStatusAddBrand = [
                            "status" => "error",
                            "notifi" => "Thêm dữ liệu không thành công"
                        ];
                    }
                } else {
                    $dataStatusAddBrand = [
                        "status" => "error",
                        "notifi" => "Thương hiệu đã tồn tại"
                    ];
                }
            } else {
                $dataStatusAddBrand = [
                    "status" => "error",
                    "notifi" => "Một số dữ liệu bạn chưa hoàn thành hoặc dữ liệu không hợp lệ"
                ];
            }
        }

        $this->view("Frontend.Brand.add");
    }
    public function update(){

        if( isset( $_POST['addBrand_action'] ) ) {
            $error = [];
            global $error;

            $brand_is_status = !empty($_POST['brand_status']) ? "on" : "off";

            if( empty($_POST['brand_name']) ) {
                $error['brand_name'] = "<span class='error'>(*) Vui lòng nhập tên thương hiệu</span>";
            } else {
                $brand_name = $_POST['brand_name'];
            }

            if( empty($_POST['brand_logo']) ) {
                $error['brand_logo'] = "<span class='error'>(*) Vui lòng chọn logo thương hiệu</span>";
            } else {
                $brand_logo_file = json_decode($_POST['brand_logo'], true);
                if(!empty($brand_logo_file['targetFile'])) {
                    $brand_logo_tmp = $brand_logo_file['tmp_name'];
                    $brand_logo = $brand_logo_file['targetFile'];
                }
                else {
                    $brand_logo = $_POST['brand_logo'];
                }
                $_POST['brand_logo'] = $brand_logo;
            }
        }

        $this->view("Frontend.Brand.update");
    }

    public function uploadLogoBrand() {
        if( $_SERVER['REQUEST_METHOD'] ) {
            $targetDir  = "public/uploads/brands/";
            $fileName   = pathinfo( $_FILES['brand_logo']['name'], PATHINFO_FILENAME );
            $fileExtend = strtolower(pathinfo( $_FILES['brand_logo']['name'], PATHINFO_EXTENSION ));
            $targetFile = $targetDir . md5( time() . $fileName ) . "." . $fileExtend;
            $dataAjax = [
                "tmp_name" => $_FILES['brand_logo']['tmp_name'],
                "targetFile" => $targetFile
            ];
            echo json_encode($dataAjax);
        }
    }

    public function handleGetMaxOrder() {
        $dataAjax = [
            "orderMax" => $this->BrandModel->getOrderMax()
        ];
        echo json_encode($dataAjax);
    }

}
