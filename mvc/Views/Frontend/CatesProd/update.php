
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
        <<?php {{  view("Inc.header");}} ?>
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
                        <a class="btn_item btn_primary" href="">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            <span>Lưu</span>
                        </a>
                        <a class="btn_item btn_default" href="">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            <span>Hủy</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table_content container_fluid">
                <div class="panel_table">
                    <div class="panel_heading">
                        <h2 class="panel_title">
                            <i class="fa fa-pencil"></i>
                            <span>Thêm danh mục</span>
                        </h2>
                    </div>
                    <div class="panel_body">
                        <form action="" method="POST">
                            <div id="table_content">
                                <div class="nav_tabs d_flex align_items_center">
                                    <a class="active tab_item" href="#tab_general">Tổng quan</a>
                                    <a class="tab_item" href="#tab_data">Dữ liệu</a>
                                </div>
                                <div class="tab_content">
                                    <div class="tab_pane" id="tab_general">
                                        <div class="form_group status_wrap d_flex align_items_center">
                                            <label for="status_value" class="form_label">Trạng thái</label>
                                            <div class="switch_status">
                                                <label for="status_value" class="status_toogle on">
                                                    <input type="checkbox" checked id="status_value" class="d_none">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="content_group">
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateProdName" class="form_label">Tiêu đề</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" name="cateProdName" id="cateProdName" placeholder="Nhập tên danh mục" autocomplete="off" spellcheck="false">
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateProdDesc" class="form_label">Mô tả</label>
                                                <div class="form_input">
                                                    <textarea class="form_control" name="cateProdDesc" id="cateProdDesc" placeholder="Mô tả danh mục" spellcheck="false"></textarea>
                                                    <p class="caption">Ký tự đã dùng: 0/70</p>
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateProdMetaTitle" class="form_label">Thẻ tiêu đề (Meta title)</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" name="cateProdMetaTitle" id="cateProdMetaTitle" placeholder="Thẻ tiêu đề (Meta title)" autocomplete="off" spellcheck="false">
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateProdMetaDesc" class="form_label">Thẻ mô tả (Meta desc)</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" name="cateProdMetaDesc" id="cateProdMetaDesc" placeholder="Thẻ mô tả (Meta desc)" autocomplete="off" spellcheck="false">
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="search_gg_info" class="form_label">Xem trước kết quả tìm kiếm</label>
                                                <div class="form_input">
                                                    <div class="google_title">Pham Dinh Hung</div>
                                                    <div class="google_url">
                                                        <span class="default">phamdinhhung.com/</span>
                                                        <span class="url">pham-dinh-hung</span>
                                                    </div>
                                                    <div class="google_desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo, magni!</div>
                                                </div>
                                            </div>
                                            <div class="form_group cateProd_seo_url d_flex align_items_center">
                                                <label for="cateProd_seo_url" class="form_label">Đường dẫn SEO</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" id="cateProd_seo_url" name="cateProd_seo_url" placeholder="Đường dẫn SEO" autocomplete="off" spellcheck="false">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_pane" id="tab_data">
                                        <div class="form_group d_flex align_items_center">
                                            <label for="parent_id" class="form_label">Danh mục cha</label>
                                            <div class="form_input">
                                                <select class="form_control" name="parent_id" id="parent_id">
                                                    <option value="">--- Chọn ---</option>
                                                    <option value="">Áo Len</option>
                                                    <option value="">Áo Măng Tô</option>
                                                    <option value="">Áo Phông</option>
                                                    <option value="">Áo Phông  >  Áo Khoát</option>
                                                    <option value="">Áo Phông  >  quần kaki</option>
                                                    <option value="">Áo Sơ Mi</option>
                                                    <option value="">Áo Vest</option>
                                                    <option value="">Phụ Kiện</option>
                                                    <option value="">Quần Dài</option>
                                                    <option value="">Quần Sooc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="cateProdMiniIcon" class="form_label">Mini icon</label>
                                            <div class="form_input">
                                                <label for="cateProdMiniIcon">
                                                    <input type="file" id="cateProdMiniIcon" class="d_none">
                                                    <span class="thumbNail small">
                                                        <img class="img_cover full_size" src="./public/images/logo/no_image-50x50.png" alt="">
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="cateProdBannerPC" class="form_label">Banner PC</label>
                                            <div class="form_input">
                                                <label for="cateProdBannerPC">
                                                    <input type="file" id="cateProdBannerPC" class="d_none">
                                                    <span class="thumbNail banner __PC">
                                                        <img src="./public/images/logo/no_image-50x50.png" width="200" alt="">
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="cateProdBannerMobile" class="form_label">Banner Mobile</label>
                                            <div class="form_input">
                                                <label for="cateProdBannerMobile">
                                                    <input type="file" id="cateProdBannerMobile" class="d_none">
                                                    <span class="thumbNail banner __mobile">
                                                        <img src="./public/images/logo/no_image-50x50.png" alt="">
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php {{ view("Inc.footer"); }} ?>
        <?php {{ view("Inc.script"); }} ?>
    </div>
    <script class="handle_show_tab_pane">
        activePageTab();
        function activePageTab() {
            let elActive = document.querySelector("#table_content .nav_tabs .tab_item.active");
            let idPane = (elActive.getAttribute('href')).split("#")[1];
            let elPane = document.getElementById(idPane);
            (document.querySelectorAll(".tab_pane")).forEach(el => {
                el.style.display = "none";
            });
            elPane.style.display = "block";
        }
        let listBtnEl = document.querySelectorAll("#table_content .nav_tabs .tab_item");
        listBtnEl.forEach(el => {
            el.addEventListener('click', function() {
                event.preventDefault();
                listBtnEl.forEach(el => {
                    el.classList.remove('active');
                });
                this.classList.add('active');
                activePageTab();
            });
        });
    </script>
</body>
</html>