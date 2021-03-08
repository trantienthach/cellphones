$(function () {

    __construct();

    function __construct() {
        handleCateProdPCLogo();
        handleCateProdMbLogo();
        handleLoadCateProdMaxOrder();
    }

    function handleLoadCateProdMaxOrder() {
        let orderData = {
            "baseURl_ajax" : "?controller=CateProd&action=handleGetCateProdMaxOrder",
            "inputAppend"  : ".order_max"
        };
        $.ajax ({
            url : orderData['baseURl_ajax'],
            method : "POST",
            dataType : "json",
            success : (data) => {
                $(orderData['inputAppend']).val(data['orderMax']);
                console.log(data['order']);
                console.log(data);
            },
            error(xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
            }
        })
    }

    function handleCateProdPCLogo() {
        let handleCateProdPCLogo = {
            "btnFile" : "#cateprod_banner_pc_fake",
            "inputFile" : "#cateprod_banner_pc",
            "extendAllow"    : ['jpg', 'jpeg', 'svg', 'gif', 'png'],
            "FileSize"       : 5242880,
            "spaceAppendImg" : "#cateprod_banner_pc_append",
            "spaceAppendInput" : "#cateprod_banner_pc_append_input",
            "imgDefault"     : "./public/images/logo/no_image-50x50.png",
            "baseURL_ajax"   : '?controller=CateProd&action=uploadBannerPC'
        }
        $(handleCateProdPCLogo['btnFile']).change(function () {
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
                            $(handleCateProdPCLogo['spaceAppendImg']).attr('src',e.currentTarget.result);
                            $(handleCateProdPCLogo['spaceAppendInput']).val(e.currentTarget.result);
                            $(handleCateProdPCLogo['fileInput']).attr('value',srcImg);
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
                    notificationAlert('error', 'Tên file không hợp lệ, chỉ chấp nhận '  + handleCateProdPCLogo['extendAllow'].join(", ") +  '', 5000);
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
            if ($.inArray(extendFile, handleCateProdPCLogo['extendAllow']) == -1) {
                return false;
            } return true;
        }

        function checkFileSizePC(fSize) {
            if (fSize > handleCateProdPCLogo['FileSize']){
                return false;
            } return true;
        }

        function resetFileImgPC() {
            $(handleCateProdPCLogo['btnFile']).val('');
            $(handleCateProdPCLogo['spaceAppendImg']).attr('src', handleCateProdPCLogo['imgDefault']);
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
                url         : handleCateProdPCLogo['baseURL_ajax'],
                method      : "POST",
                data        : formdata,
                contentType : false,
                processData : false,
                dataType    : "json",
                success     : function(data) {
                    console.log(data);
                    $(handleCateProdPCLogo['inputFile']).val( JSON.stringify(data) );
                },
                error       : function(xhr,ajaxOptions,thrownError ) {
                    console.log (xhr.status);
                    console.log (thrownError);
                }
            });
        }
    }

    //** BANNER MOBIE */


    function handleCateProdMbLogo() {
        let handleCateProdMBLogo = {
            "btnFile" : "#cateprod_banner_mb_fake",
            "inputFile" : "#cateprod_banner_mb",
            "extendAllow"    : ['jpg', 'jpeg', 'svg', 'gif', 'png'],
            "FileSize"       : 5242880,
            "spaceAppendImg" : "#cateprod_banner_mb_append",
            "spaceAppendInput" : "#cateprod_banner_mb_append_input",
            "imgDefault"     : "./public/images/logo/no_image-50x50.png",
            "baseURL_ajax"   : '?controller=Cate&action=uploadBannerMB'
        }
        $(handleCateProdMBLogo['btnFile']).change(function () {
            handleInputfileCateProdMB(this);
        });

        function handleInputfileCateProdMB(fileEL) {
            if (fileEL.files[0]) {
                // người dùng đã chọn ảnh
                let fileOjb = fileEL.files[0];
                if (checkExtendFileImgMB(fileOjb['name'])) {
                    //Tên đuôi file hợp lệ
                    if (checkFileSizeMB(fileOjb['size'])) {
                        let fileReader = new FileReader();
                        let formData = new FormData();
                        formData.append('cateprod_banner_mb', fileEL.files[0]);
                        fileReader.onload = function(e){
                            let srcImg = fileEL.files[0].name;
                            $(handleCateProdMBLogo['spaceAppendImg']).attr('src',e.currentTarget.result);
                            $(handleCateProdMBLogo['spaceAppendInput']).val(e.currentTarget.result);
                            $(handleCateProdMBLogo['fileInput']).attr('value',srcImg);
                            appendImgURLInputHiddenMB(formData);
                        }
                        fileReader.readAsDataURL(fileEL.files[0]);
                    }
                    else {
                        notificationAlert('error', 'Dung lượng file không vượt quá 5MB ', 5000);
                        resetFileImgMB();
                    }
                }
                else {
                    // Tên đuôi file không hợp lệ
                    notificationAlert('error', 'Tên file không hợp lệ, chỉ chấp nhận '  + handleCateProdMBLogo['extendAllow'].join(", ") +  '', 5000);
                    resetFileImgMB();
                }
            }
            else {
                notificationAlert('error', ' Người dùng chưa chọn ảnh ');
                resetFileImgMB();
            }
        }


        function checkExtendFileImgMB(fileName) {
            let extendFile = fileName.split('.').pop().toLowerCase();
            /**
             * Sử dụng hàm $.inArray() của jqery kiểm tra đuôi file có tồn tại , trả về -1 là không có
             */
            if ($.inArray(extendFile, handleCateProdMBLogo['extendAllow']) == -1) {
                return false;
            } return true;
        }

        function checkFileSizeMB(fSize) {
            if (fSize > handleCateProdMBLogo['FileSize']){
                return false;
            } return true;
        }

        function resetFileImgMB() {
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

        function appendImgURLInputHiddenMB (formdata) {
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

});