// ========== ########## CREATE IMAGES DESC ########## ========== //
$(function() {
    var createImagesDesc = {
        wrapperEl : $("body"),
        btnCreate : "#btnCreate_rowImage",
        placeAppendData: $('table.table_images.table tbody'),
        rowOrderCurrent: $('table.table_images.table tbody tr:last-child').index() + 1,
        btnClear: "table.table_images.table tbody .btnClear",
        btnOpenFileManager : ".popover_content .button_image"
    };

    (createImagesDesc['wrapperEl']).delegate(createImagesDesc['btnOpenFileManager'], 'click', function() {
        let $input_id = $(this).parents('td').find("input[type='hidden']").attr('id');
        let html =
        `<div id="modal_filemanager">
            <iframe id="fancybox-frame1606273874780" name="fancybox-frame1606273874780" class="fancybox-iframe" allowfullscreen="allowfullscreen" allow="autoplay; fullscreen" src="./public/plugins/filemanager/dialog.php?type=0&amp;field_id=${$input_id}" scrolling="auto"></iframe>
        </div>`;
        createImagesDesc['wrapperEl'].prepend(html);
    });

    function responsive_filemanager_callback(field_id){
        var url = $('#'+field_id).val();
        $("#prod_avatar_src").attr('src',url);
    }

    (createImagesDesc['wrapperEl']).delegate(createImagesDesc['btnClear'], 'click', function() {
        $(this).parents('tr').remove();
        let numRow = $('table.table_images.table tbody tr:last-child').index() + 1;
        if(numRow === 0) {
            createImagesDesc['rowOrderCurrent'] = 0;
        }
    });
    (createImagesDesc['wrapperEl']).delegate(createImagesDesc['btnCreate'],'click', function() {
        event.preventDefault();
        let htmlEl = createHtmlElRow(createImagesDesc['rowOrderCurrent']);
        if(createImagesDesc['rowOrderCurrent'] == 0) {
            createImagesDesc['placeAppendData'].append(htmlEl);
        } else {
            createImagesDesc['placeAppendData'].find('tr:last-child').after(htmlEl);
        }
        createImagesDesc['rowOrderCurrent'] ++;
    });

    function createHtmlElRow(order) {
        return `<tr id="image_row${order}">
                    <td class="position_relative">
                        <div class="thumbNail">
                            <img src="./public/images/logo/no_image-50x50.png" alt="">
                        </div>
                        <div class="popover position_absolute">
                            <div class="popover_content">
                                <button type="button" class="button_image btn btn_primary" title="Thêm ảnh mô tả">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="button_clear btn btn_danger" title="Xóa ảnh này">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="prod_image_desc[${order}][image]" id="input_image${order}">
                    </td>
                    <td>
                        <input type="number" min="0" name="prod_image_desc[${order}][sort_order]" placeholder="Sắp xếp" class="form_control">
                    </td>
                    <td>
                        <button type="button" class="btn btn_danger btnClear">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </td>
                </tr>
                `;
    }
});


// ========== ########## CREATE SPECIAL ########## ========== //
$(function() {
    var createFlashSale = {
        wrapperEl : $("body"),
        btnCreate : "#btnCreate_rowFlashSale",
        placeAppendData: $('table.flash_sale tbody'),
        rowOrderCurrent: $('table.flash_sale tbody tr:last-child').index() + 1,
        btnClear: "table.flash_sale tbody .btnClear",
    };

    (createFlashSale['wrapperEl']).delegate(createFlashSale['btnClear'], 'click', function() {
        $(this).parents('tr').remove();
        let numRow = $('table.flash_sale tbody tr:last-child').index() + 1;
        if(numRow === 0) {
            createImagesDesc['rowOrderCurrent'] = 0;
        }
    });

    (createFlashSale['wrapperEl']).delegate(createFlashSale['btnCreate'],'click', function() {
        event.preventDefault();
        let htmlEl = createHtmlElRow(createFlashSale['rowOrderCurrent']);
        if(createFlashSale['rowOrderCurrent'] == 0) {
            createFlashSale['placeAppendData'].append(htmlEl);
        } else {
            createFlashSale['placeAppendData'].find('tr:last-child').after(htmlEl);
        }
        createFlashSale['rowOrderCurrent'] ++;
    });

    function createHtmlElRow(order) {
        return `<tr>
        <td id="flashSale_row${order}">
            <select class="form_control" name="prod_flashSale[0][customer_group_id]">
                <option value="">Mặc định</option>
                <option value="">Khách hàng tìm năng</option>
            </select>
        </td>
        <td>
            <input class="form_control" type="text" name="prod_flashSale[${order}][priority]" placeholder="Độ ưu tiên" autocomplete="off" spellcheck="false">
        </td>
        <td>
            <input class="form_control" type="number" name="prod_flashSale[${order}][price]" placeholder="Giá khuyến mãi" autocomplete="off" spellcheck="false">
        </td>
        <td>
            <div class="input_group">
                <input class="form_control dateStart_value" type="date" name="prod_flashSale[${order}][date_start]" placeholder="Thời gian bắt đầu" autocomplete="off" spellcheck="false">
            </div>
        </td>
        <td>
            <div class="input_group">
                <input class="form_control dateEnd_value" type="date" name="prod_flashSale[${order}][date_end]" placeholder="Thời gian kết thúc" autocomplete="off" spellcheck="false">
            </div>
        </td>
        <td>
            <button type="button" class="btn btn_danger btnClear">
                <i class="fa fa-minus-circle"></i>
            </button>
        </td>
    </tr>`;
    }
});

// ========== ########## CREATE SPECIAL ########## ========== //
$(function() {
    var createSpecial = {
        wrapperEl : $("body"),
        btnCreate : "#btnCreate_rowSpecial",
        placeAppendData: $('table.special.content tbody'),
        rowOrderCurrent: $('table.special.content tbody tr:last-child').index() + 1,
        btnClear: "table.special.content tbody .btnClear",
    };

    (createSpecial['wrapperEl']).delegate(createSpecial['btnClear'], 'click', function() {
        $(this).parents('tr').remove();
        let numRow = $('table.special.content tbody tr:last-child').index() + 1;
        if(numRow === 0) {
            createSpecial['rowOrderCurrent'] = 0;
        }
    });

    (createSpecial['wrapperEl']).delegate(createSpecial['btnCreate'],'click', function() {
        event.preventDefault();
        let htmlEl = createHtmlElRow(createSpecial['rowOrderCurrent']);
        if(createSpecial['rowOrderCurrent'] == 0) {
            createSpecial['placeAppendData'].append(htmlEl);
        } else {
            createSpecial['placeAppendData'].find('tr:last-child').after(htmlEl);
        }
        createSpecial['rowOrderCurrent'] ++;
    });

    function createHtmlElRow(order) {
        return `
        <tr id="special_row${order}">
            <td>
                <input class="form_control" type="text" name="prod_special[${order}]['title']" placeholder="Tiêu đề khuyến mãi" autocomplete="off" spellcheck="false">
            </td>
            <td>
                <input class="form_control" type="number" name="prod_special[${order}]['order']" placeholder="Thứ tự hiển thị" autocomplete="off" spellcheck="false">
            </td>
            <td>
                <input class="form_control" type="text" name="prod_special[${order}]['link']" placeholder="Link liên kết" autocomplete="off" spellcheck="false">
            </td>
            <td>
                <button type="button" class="btn btn_danger btnClear">
                    <i class="fa fa-minus-circle"></i>
                </button>
            </td>
        </tr>
        `;
    }
});


// ========== ########## CREATE IMAGES SPECAIL ########## ========== //
$(function() {
    var createSpecial = {
        wrapperEl : $("body"),
        btnCreate : "#btnCreate_rowSpecialImg",
        placeAppendData: $('table.special.images tbody'),
        rowOrderCurrent: $('table.special.images tbody tr:last-child').index() + 1,
        btnClear: "table.special.images tbody .btnClear",
    };

    (createSpecial['wrapperEl']).delegate(createSpecial['btnClear'], 'click', function() {
        $(this).parents('tr').remove();
        let numRow = $('table.special.images tbody tr:last-child').index() + 1;
        if(numRow === 0) {
            createSpecial['rowOrderCurrent'] = 0;
        }
    });

    (createSpecial['wrapperEl']).delegate(createSpecial['btnCreate'],'click', function() {
        event.preventDefault();
        let htmlEl = createHtmlElRow(createSpecial['rowOrderCurrent']);
        if(createSpecial['rowOrderCurrent'] == 0) {
            createSpecial['placeAppendData'].append(htmlEl);
        } else {
            createSpecial['placeAppendData'].find('tr:last-child').after(htmlEl);
        }
        createSpecial['rowOrderCurrent'] ++;
    });

    function createHtmlElRow(order) {
        return `
        <tr id="specialImg_row${order}">
            <td>
                <span class="thumbNail">
                    <img class="img_cover full_size" src="./public/images/logo/no_image-50x50.png" alt="">
                </span>
            </td>
            <td>
                <input class="form_control" type="text" name="prod_specialImg[${order}][price]" placeholder="Giá khuyến mãi" autocomplete="off" spellcheck="false">
            </td>
            <td>
                <input class="form_control" type="number" name="prod_specialImg[${order}][price]" placeholder="Giá khuyến mãi" autocomplete="off" spellcheck="false">
            </td>
            <td>
                <input class="form_control" type="text" name="prod_specialImg[${order}][price]" placeholder="Giá khuyến mãi" autocomplete="off" spellcheck="false">
            </td>
            <td>
                <button type="button" class="btn btn_danger btnClear">
                    <i class="fa fa-minus-circle"></i>
                </button>
            </td>
        </tr>
        `;
    }
});



function handleCateProdMBLogo() {
    let handleCateProdMBLogo = {
        "btnFile" : "#cateprod_banner_mb_fake",
        "inputFile" : "#cateprod_banner_,b",
        "extendAllow"    : ['jpg', 'jpeg', 'svg', 'gif', 'png'],
        "FileSize"       : 5242880,
        "spaceAppendImg" : "#cateprod_banner_mb_append",
        "spaceAppendInput" : "#cateprod_banner_mb_append_input",
        "imgDefault"     : "./public/images/logo/no_image-50x50.png",
        "baseURL_ajax"   : '?controller=Cate&action=uploadBannerMB'
    }
    $(handleCateProdMBLogo['btnFile']).change(function () {
        handleInputfileCateProdPC(this);
    });

    function handleInputfileCateProdPC(fileEL) {
        if (fileEL.files[0]) {
            // người dùng đã chọn ảnh
            let fileOjb = fileEL.files[0];
            if (checkExtendFileImgPC(fileOjb['name'])) {
                //Tên đuôi file hợp lệ
                if (checkFileSizePC(fileOjb['size'])) {
                    let fileReader = new FileReader();
                    let formData = new FormData();
                    formData.append('cateprod_banner_pc', fileEL.files[0]);
                    fileReader.onload = function(e){
                        let srcImg = fileEL.files[0].name;
                        $(handleCateProdMBLogo['spaceAppendImg']).attr('src',e.currentTarget.result);
                        $(handleCateProdMBLogo['spaceAppendInput']).val(e.currentTarget.result);
                        $(handleCateProdMBLogo['fileInput']).attr('value',srcImg);
                        appendImgURLInputHiddenPC(formData);
                    }
                    fileReader.readAsDataURL(fileEL.files[0]);
                }
                else {
                    notificationAlert('error', 'Dung lượng file không vượt quá 5MB ', 5000);
                    resetFileImgPC();
                }
            }
            else {
                // Tên đuôi file không hợp lệ
                notificationAlert('error', 'Tên file không hợp lệ, chỉ chấp nhận '  + handleCateProdMBLogo['extendAllow'].join(", ") +  '', 5000);
                resetFileImgPC();
            }
        }
        else {
            notificationAlert('error', ' Người dùng chưa chọn ảnh ');
            resetFileImgPC();
        }
    }


    function checkExtendFileImgPC(fileName) {
        let extendFile = fileName.split('.').pop().toLowerCase();
        /**
         * Sử dụng hàm $.inArray() của jqery kiểm tra đuôi file có tồn tại , trả về -1 là không có
         */
        if ($.inArray(extendFile, handleCateProdMBLogo['extendAllow']) == -1) {
            return false;
        } return true;
    }

    function checkFileSizePC(fSize) {
        if (fSize > handleCateProdMBLogo['FileSize']){
            return false;
        } return true;
    }

    function resetFileImgPC() {
        $(handleCateProdMBLogo['btnFile']).val('');
        $(handleCateProdMBLogo['spaceAppendImg']).attr('src', handleCateProdMBLogo['imgDefault']);
    }

    function notificationAlert(status = 'error', txtNotifi = 'Bạn chưa tạo thông báo cho chức năng', timeDelay = 2000) {
        $(".alert").addClass('alert_' + (status) + '');
        $(".alert").addClass('open');
        $(".alert span").text(txtNotifi);
        timeoutToggleAlert = setTimeout(function () {
            $(".alert").removeClass('open');
            $(".alert").removeClass('alert_error');
            $(".alert span").text('');
        }, timeDelay);
        let closeAlertEl = $(".alert .close");
        closeAlertEl.click(function () {
            $(".alert").removeClass('open');
            $(".alert span").text('');
        });
    }

    function appendImgURLInputHiddenPC (formdata) {
        $.ajax({
            url         : handleCateProdMBLogo['baseURL_ajax'],
            method      : "POST",
            data        : formdata,
            contentType : false,
            processData : false,
            dataType    : "json",
            success     : function(data) {
                console.log(data);
                $(handleCateProdMBLogo['inputFile']).val( JSON.stringify(data) );
            },
            error       : function(xhr,ajaxOptions,thrownError ) {
                console.log (xhr.status);
                console.log (thrownError);
            }
        });
    }
}
