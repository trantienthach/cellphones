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
        <<?php {{ view("Inc.header"); }} ?>
        <?php {{ view("Inc.sidebar"); }} ?>
        <main class="main_content">
            <form action="" method="POST">
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
                            <button type="submit" class="btn_item btn_primary" name="addCateProd_action">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                <span>Lưu</span>
                            </button>
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
                            <div id="table_content">
                                <div class="nav_tabs d_flex align_items_center">
                                    <a class="active tab_item" href="#tab_general">Tổng quan</a>
                                    <a class="tab_item" href="#tab_data">Dữ liệu</a>
                                </div>
                                <div class="tab_content">
                                    <!-- Start alert notification -->
                                    <div class="alert_wrap">
                                        <div class="alert  position_relative" data-status="">
                                            <i class="fa fa-check-circle" style="margin-right: 5px;"></i>
                                            <span></span>
                                            <button type="button" class="close position_absolute">x</button>
                                        </div>
                                    </div>
                                    <!-- End alert notification -->

                                    <div class="tab_pane" id="tab_general">
                                        <div class="form_group status_wrap d_flex align_items_center">
                                            <label for="status_value" class="form_label">Trạng thái</label>
                                            <div class="switch_status">
                                                <label for="status_value" class="status_toogle on">
                                                    <input type="checkbox" <?php {{ echo Validation::form_value("cate_prod_status") == "on" ? "checked" : null; }} ?> checked name="cate_prod_status" id="status_value" class="d_none">
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="content_group">
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateprod_name" class="form_label"><strong style="color: #f00;">*</strong> Tên danh mục sản phẩm</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" value="<?php {{ echo Validation::form_value("cateprod_name"); }} ?>" name="cateprod_name" id="cateprod_name" placeholder="Nhập tên danh mục" autocomplete="off" spellcheck="false">
                                                    <?php {{ echo Validation::form_error("cateprod_name"); }} ?>
                                                </div>
                                            </div>

                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateprod_order" class="form_label">Số TT MAX</label>
                                                <div class="form_input">
                                                    <input disabled style="width: 100px; text-align: center;" class="hidden_input_number form_control order_max" type="number" min="1" name="cateprod_order">
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateprod_order" class="form_label">Số thứ tự</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="number" min="1" name="cateprod_order" id="cateprod_order" value="<?php {{echo Validation::form_value("cateprod_order");}} ?>" placeholder="Thứ tự hiển thị" autocomplete="off" spellcheck="false">
                                                </div>
                                            </div>

                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateprod_meta_desc" class="form_label"><strong style="color: #f00;">*</strong> Mô tả</label>
                                                <div class="form_input">
                                                    <textarea class="form_control" name="cateprod_meta_desc" id="cateprod_meta_desc" placeholder="Mô tả danh mục" spellcheck="false"><?php {{ echo Validation::form_value("cateprod_meta_desc"); }} ?></textarea>
                                                    <p class="caption">Ký tự đã dùng: 0/70</p>
                                                    <?php {{ echo Validation::form_error("cateprod_meta_desc"); }} ?>
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="cateprod_meta_title" class="form_label">Thẻ tiêu đề </label>
                                                <div class="form_input">
                                                    <input class="form_control" value="<?php {{ echo Validation::form_value("cateprod_meta_title"); }} ?>" type="text" name="cateprod_meta_title" id="cateprod_meta_title" placeholder="Thẻ tiêu đề (Meta title)" autocomplete="off" spellcheck="false">
                                                    <?php {{ echo Validation::form_error("cateprod_meta_title"); }} ?>
                                                </div>
                                            </div>
                                            <div class="form_group d_flex align_items_center">
                                                <label for="search_gg_info" class="form_label">Xem trước kết quả tìm kiếm</label>
                                                <div class="form_input">
                                                    <div class="google_title"><?php echo Validation::form_value("cateprod_meta_title"); ?></div>
                                                    <div class="google_url">
                                                        <span class="default">https://thachcellphones.vn/<?php echo Validation::form_value("cateProd_seo_url"); ?></span><span class="url"></span>
                                                    </div>
                                                    <div class="google_desc"><?php echo Validation::form_value("cateprod_meta_desc"); ?></div>
                                                </div>
                                            </div>
                                            <div class="form_group seoUrl cateProd_seo_url d_flex align_items_center">
                                                <label for="cateProd_seo_url" class="form_label">Đường dẫn SEO</label>
                                                <div class="form_input">
                                                    <input class="form_control" type="text" value="<?php {{ echo Validation::form_value("cateProd_seo_url"); }} ?>" id="cateProd_seo_url" name="cateProd_seo_url" placeholder="Đường dẫn SEO" autocomplete="off" spellcheck="false">
                                                    <input type="hidden" name="cateProd_seo_url" value="<?php {{ echo Validation::form_value("cateProd_seo_url"); }} ?>">
                                                    <?php {{ echo Validation::form_error("cateProd_seo_url"); }} ?>
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
                                                    <option value="">Áo Phông > Áo Khoát</option>
                                                    <option value="">Áo Phông > quần kaki</option>
                                                    <option value="">Áo Sơ Mi</option>
                                                    <option value="">Áo Vest</option>
                                                    <option value="">Phụ Kiện</option>
                                                    <option value="">Quần Dài</option>
                                                    <option value="">Quần Sooc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="cateprod_banner_pc" class="form_label">Banner PC</label>
                                            <div class="form_input">
                                                <label for="cateprod_banner_pc_fake">
                                                    <span class="thumbNail banner __PC">
                                                        <img src="./public/images/logo/no_image-50x50.png" class="img_cover full_size" id="cateprod_banner_pc_append" width="200" alt="">
                                                    </span>
                                                    <input type="file" id="cateprod_banner_pc_fake" name="cateprod_banner_pc_fake" class="d_none">
                                                    <input type="hidden" id="cateprod_banner_pc_append_input" name="cateprod_banner_pc_append_input" class="d_none">
                                                    <input type="hidden" id="cateprod_banner_pc" name="cateprod_banner_pc" class="d_none">

                                                </label>
                                            </div>
                                        </div>
                                        <div class="form_group d_flex align_items_center">
                                            <label for="cateprod_banner_mb" class="form_label">Banner Mobile</label>
                                            <div class="form_input">
                                                <label for="cateprod_banner_mb_fake">
                                                    <span class="thumbNail banner __mobile">
                                                        <img src="./public/images/logo/no_image-50x50.png" class="img_cover full_size" id="cateprod_banner_mb_append" alt="">
                                                    </span>
                                                    <input type="file" id="cateprod_banner_mb_fake" name="cateprod_banner_mb_fake" class="d_none">
                                                    <input type="hidden" id="cateprod_banner_mb_append_input" name="cateprod_banner_mb_append_input" class="d_none">
                                                    <input type="hidden" id="cateprod_banner_mb" name="cateprod_banner_mb" class="d_none">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </main>
            <?php { {
                    view("Inc.footer");
                }
            } ?>
    </div>
    <script type="text/javascript" src="./public/js/config/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/app/cateProd.ajax.js"></script>
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
    <script>
        //========= ##### handle keyup word and append ##### ==========//
        var metaTitleEl = document.querySelector("#cateprod_meta_title");
        var metaDescEl = document.querySelector("#cateprod_meta_desc");
        var seoUrlEl = document.querySelector("#cateProd_seo_url");

        metaTitleEl.addEventListener('keyup', function() {
            let vl = this.value;
            let spaceAppend = document.querySelector(".google_title");
            appendKeyWord(vl, spaceAppend);
        });

        metaDescEl.addEventListener('keyup', function() {
            let vl = this.value;
            let spaceAppend = document.querySelector(".google_desc");
            appendKeyWord(vl, spaceAppend);
        });


        seoUrlEl.addEventListener('keyup', function() {
            let vl = this.value;
            let spaceAppend = document.querySelector(".google_url .url");
            document.querySelector("[name='cateProd_seo_url']").value = slug_string(vl);
            appendKeyWord(slug_string(vl), spaceAppend);
        });


        function appendKeyWord(keyWord, placeAppend) {
            placeAppend.innerText = keyWord;
        }

        function slug_string(str) {
            str = str.toLowerCase();
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
            str = str.replace(/-+-/g, "-");
            str = str.replace(/^\-+|\-+$/g, "");
            if (str === undefined) {
                return false;
            } else {
                return str;
            }
        }

        // handle notification status add cate new
        var alertStatusAddCateEl = document.querySelector('.alert');
        if (alertStatusAddCateEl !== null) {
            var buttonCloseAlertEl = document.querySelector(".alert .close");
            if (alertStatusAddCateEl.getAttribute('data-status') === 'true') {
                alertStatusAddCateEl.classList.add('open');
                setTimeout(function() {
                    alertStatusAddCateEl.classList.remove('open');
                }, 5000);
            }

            buttonCloseAlertEl.addEventListener('click', function() {
                alertStatusAddCateEl.classList.remove('open');
            });
        }
    </script>
    <?php { {
            view("Inc.script");
        }
    } ?>
</body>

</html>