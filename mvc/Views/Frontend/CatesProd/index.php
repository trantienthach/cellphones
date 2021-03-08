<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/config/helper.css">
    <link rel="stylesheet" href="./public/css/style/layout.css">
    <link rel="stylesheet" href="./public/css/style/home.css">
    <title>Bảng điều khiển</title>
</head>
<body>
    <div id="dashboardApp" class="showAside position_relative">
        <?php {{  view("Inc.header");}} ?>
        <?php {{  view("Inc.sidebar"); }} ?>
        <main class="main_content">
            <div class="page_header">
                <div class="container_fluid d_flex justify_content_between align_items_center">
                    <div class="d_flex align_items_end">
                        <h1>Danh mục</h1>
                        <ol class="breadcrumb d_flex align_items_center">
                            <li>
                                <a href="">Trang chủ</a>
                            </li>
                            <li class="active">
                                <a href="">Danh mục</a>
                            </li>
                        </ol>
                    </div>
                    <div class="d_flex align_items_center">
                        <a class="btn_item btn_primary" href="?controller=CateProd&action=add">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <span>Thêm mới</span>
                        </a>
                        <a class="btn_item btn_default" href="">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            <span>Làm mới</span>
                        </a>
                    </div>
                </div>
                <div class="container_fluid">
                    <div class="action_wrap d_flex align_items_center">
                        <div class="page_action_item filter grid_column_4">
                            <div class="value d_flex align_items_center">
                                <a class="item active" href="">Tất cả</a>
                                <a class="item" href="">Hiện</a>
                                <a class="item" href="">Ẩn</a>
                            </div>
                        </div>
                        <div class="page_action_item search grid_column_5">
                            <div class="value d_flex align_items_center w_100">
                                <form action="" class="search_module w_100">
                                    <div class="form_group position_relative">
                                        <input type="text" name="searchStr" class="form_control" placeholder="Nhập tên danh mục bài muốn tìm kiếm..." autocomplete="off" spellcheck="false">
                                        <button type="submit" name="" class="form_button position_absolute">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            <span>Tìm kiếm</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table_content container_fluid">
                <div class="panel_table">
                    <div class="panel_heading">
                        <h2 class="panel_title">
                            <i class="fa fa-list"></i>
                            <span>Danh sách</span>
                        </h2>
                    </div>
                    <div class="panel_body">
                        <div id="table_content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            <input class="checkAllButton" type="checkbox" name="">
                                        </td>
                                        <td>Hình ảnh</td>
                                        <td>
                                            <a class="asc" href="">
                                                <span>Tên danh mục</span>
                                            </a>
                                        </td>
                                        <td>Danh mục cha</td>
                                        <td>Ngày tạo</td>
                                        <td>Trạng thái</td>
                                        <td>Chuyển đổi</td>
                                        <td>Cập nhật</td>
                                        <td>Xóa</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="checkItem" type="checkbox" name="">
                                        </td>
                                        <td class="image">
                                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                                        </td>
                                        <td>Bếp hồng ngoại</td>
                                        <td>Bếp điện từ</td>
                                        <td>22/10/2001</td>
                                        <td class="status on">Hiện</td>
                                        <td class="switch_status">
                                            <label for="status" class="status_toogle on">
                                                <span class="lever"></span>
                                            </label>
                                        </td>
                                        <td class="update">
                                            <a href="?controller=CateProd&action=update">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="delete">
                                            <a href="">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkItem" type="checkbox" name="">
                                        </td>
                                        <td class="image">
                                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                                        </td>
                                        <td>Bếp hồng ngoại</td>
                                        <td>Bếp điện từ</td>
                                        <td>22/10/2001</td>
                                        <td class="status on">Hiện</td>
                                        <td class="switch_status">
                                            <label for="status" class="status_toogle on">
                                                <span class="lever"></span>
                                            </label>
                                        </td>
                                        <td class="update">
                                            <a href="">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="delete">
                                            <a href="">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkItem" type="checkbox" name="">
                                        </td>
                                        <td class="image">
                                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                                        </td>
                                        <td>Bếp hồng ngoại</td>
                                        <td>Bếp điện từ</td>
                                        <td>22/10/2001</td>
                                        <td class="status on">Hiện</td>
                                        <td class="switch_status">
                                            <label for="status" class="status_toogle on">
                                                <span class="lever"></span>
                                            </label>
                                        </td>
                                        <td class="update">
                                            <a href="">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="delete">
                                            <a href="">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkItem" type="checkbox" name="">
                                        </td>
                                        <td class="image">
                                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                                        </td>
                                        <td>Bếp hồng ngoại</td>
                                        <td>Bếp điện từ</td>
                                        <td>22/10/2001</td>
                                        <td class="status on">Hiện</td>
                                        <td class="switch_status">
                                            <label for="status" class="status_toogle on">
                                                <span class="lever"></span>
                                            </label>
                                        </td>
                                        <td class="update">
                                            <a href="">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="delete">
                                            <a href="">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkItem" type="checkbox" name="">
                                        </td>
                                        <td class="image">
                                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                                        </td>
                                        <td>Bếp hồng ngoại</td>
                                        <td>Bếp điện từ</td>
                                        <td>22/10/2001</td>
                                        <td class="status on">Hiện</td>
                                        <td class="switch_status">
                                            <label for="status" class="status_toogle on">
                                                <span class="lever"></span>
                                            </label>
                                        </td>
                                        <td class="update">
                                            <a href="">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="delete">
                                            <a href="">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="checkItem" type="checkbox" name="">
                                        </td>
                                        <td class="image">
                                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                                        </td>
                                        <td>Bếp hồng ngoại</td>
                                        <td>Bếp điện từ</td>
                                        <td>22/10/2001</td>
                                        <td class="status on">Hiện</td>
                                        <td class="switch_status">
                                            <label for="status" class="status_toogle on">
                                                <span class="lever"></span>
                                            </label>
                                        </td>
                                        <td class="update">
                                            <a href="">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="delete">
                                            <a href="">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php {{ view("Inc.footer"); }} ?>
        <?php {{ view("Inc.script"); }} ?>
    </div>

    <script class="checked_list">
        let btnCheckAllBtn = document.querySelector("input[type='checkbox'].checkAllButton");
        let listBtnCheck   = document.querySelectorAll("input[type='checkbox'].checkItem");
        btnCheckAllBtn.addEventListener('click', function() {
            if(this.checked) {
                listBtnCheck.forEach(el=> {
                    el.checked = true;
                });
            } else {
                listBtnCheck.forEach(el=> {
                    el.checked = false;
                });
            }
        });
    </script>

    <script class="checked_list">
        let btnCheckAllBtn = document.querySelector("input[type='checkbox'].checkAllButton");
        let listBtnCheck   = document.querySelectorAll("input[type='checkbox'].checkItem");
        btnCheckAllBtn.addEventListener('click', function() {
            if(this.checked) {
                listBtnCheck.forEach(el=> {
                    el.checked = true;
                });
            } else {
                listBtnCheck.forEach(el=> {
                    el.checked = false;
                });
            }
        });
    </script>
    <script class="handle_toggle_input_status">
        let btnToggle = document.querySelectorAll("#table_content table.table tr .toogle_status");
        btnToggle.forEach(el => {
            el.addEventListener('click', function() {
                if(this.classList.contains('on')) {
                    this.classList.remove('on');
                    this.classList.add('off');
                } else {
                    this.classList.remove('off');
                    this.classList.add('on');
                }
            });
        });
    </script>
</body>
</html>