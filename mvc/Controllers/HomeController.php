<?php
/**
 * __construct: Là một method sẽ tự động đc chạy ngay sau khi đối tượng được khởi tạo
 */
class HomeController extends BaseController {

    // khởi tạo model
    private $HomeModel;

    public function __construct()
    {
        $this->HomeModel = $this->model("HomeModel");
        // <=> $this->HomeModel = HomeModel
    }

    public function index() {
        $this->view("Frontend.Homes.index", []);
    }

}