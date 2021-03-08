<?php


class CateProdController extends BaseController {

    private $CateProdModel;

    public function __construct()
    {
        $this->CateProdModel = $this->model("CateProdModel");
    }

    public function index() {
        $this->view("Frontend.CatesProd.index");
    }

    public function add(){


        if( isset( $_POST['addCateProd_action'] ) ) {
            $error = [];
            global $error;

            /**
             * -- check status
             */
            $cate_prod_status = !empty($_POST['cate_prod_status']) ? "on" : "off";

            /**
             * -- check name
             */
            if( empty($_POST['cateprod_name']) ) {
                $error['cateprod_name'] = "<span class='error'>(*) Vui lòng nhập tên danh mục sản phẩm </span>";
            } else {
                $cateprod_name = $_POST['cateprod_name'];
            }

            /**
             * -- check brand logo
             */

            /**
             * check brand metal title
             */
            if (!empty($_POST['cateprod_meta_title'])) {
                $cateprod_meta_title = $_POST['cateprod_meta_title'];
            }
            else {
                $error['cateprod_meta_title'] = "<span class='error'>(*) Vui lòng nhập tiêu đề thương hiệu</span>";
            }

            if(!empty($_POST['cateprod_meta_desc'])) {
                $cateprod_meta_desc = $_POST['cateprod_meta_desc'];
            }
            else {
                $error['cateprod_meta_desc'] = "<span class='error'>(*) Vui lòng nhập mô tả thương hiệu</span>";
            }

            if(!empty($_POST['cateProd_seo_url'])) {
                $cateProd_seo_url = $_POST['cateProd_seo_url'];
            }
            else {
                $error['cateProd_seo_url'] = "<span class='error'>(*) Vui lòng nhập đường dẫn seo </span>";
            }

            if( empty($error) ) {
                if( !$this->CateProdModel->checkCateProdExists($cateprod_name) ) {
                    $dataCateProd = [
                        "cateprod_name" => $cateprod_name,
                        "cateprod_meta_title" => $cateprod_meta_title,
                        "cateprod_meta_desc" => $cateprod_meta_desc,
                        "cateProd_seo_url" => $cateProd_seo_url,
                        "brand_create_date" => time(),
                        "brand_creator_id" => "1",
                        "cateprod_is_status" => $cate_prod_status
                    ];
                    $cateProd_id = $this->CateProdModel->addCateProdNew($dataCateProd);
                    if( is_int( $cateProd_id) ) {

                        $dataStatusAddCateProd = [
                            "status" => "success",
                            "notifi" => "Thêm dữ liệu thành công"
                        ];
                    } else {
                        $dataStatusAddCateProd = [
                            "status" => "error",
                            "notifi" => "Thêm dữ liệu không thành công"
                        ];
                    }
                } else {
                    $dataStatusAddCateProd = [
                        "status" => "error",
                        "notifi" => "Danh mục đã tồn tại"
                    ];
                }
            } else {
                 $dataStatusAddCateProd = [
                    "status" => "error",
                    "notifi" => "Một số dữ liệu bạn chưa hoàn thành hoặc dữ liệu không hợp lệ"
                ];
            }
        }

        $this->view("Frontend.CatesProd.add");
    }
    public function update(){
        $this->view("Frontend.CatesProd.update");
    }

    public function uploadBannerPC() {
        if( $_SERVER['REQUEST_METHOD'] ) {
            $targetDir  = "public/uploads/CatesProdPC/";
            $fileName   = pathinfo( $_FILES['cateprod_banner_pc']['name'], PATHINFO_FILENAME );
            $fileExtend = strtolower(pathinfo( $_FILES['cateprod_banner_pc']['name'], PATHINFO_EXTENSION ));
            $targetFile = $targetDir . md5( time() . $fileName ) . "." . $fileExtend;
            $dataAjax = [
                "tmp_name" => $_FILES['cateprod_banner_pc']['tmp_name'],
                "targetFile" => $targetFile
            ];
            echo json_encode($dataAjax);
        }
    }

    public function uploadBannerMB() {
        if( $_SERVER['REQUEST_METHOD'] ) {
            $targetDir  = "public/uploads/CatesProdMB/";
            $fileName   = pathinfo( $_FILES['cateprod_banner_mb']['name'], PATHINFO_FILENAME );
            $fileExtend = strtolower(pathinfo( $_FILES['cateprod_banner_mb']['name'], PATHINFO_EXTENSION ));
            $targetFile = $targetDir . md5( time() . $fileName ) . "." . $fileExtend;
            $dataAjax = [
                "tmp_name" => $_FILES['cateprod_banner_mb']['tmp_name'],
                "targetFile" => $targetFile
            ];
            echo json_encode($dataAjax);
        }
    }

    public function handleGetCateProdMaxOrder() {
        $dataAjax = [
            "orderMax" => $this->CateProdModel->getCateProdOrderMax()
        ];
        echo json_encode($dataAjax);
    }


}