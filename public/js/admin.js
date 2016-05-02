$(function () {
    $("[editor]").summernote({
        lang: 'zh-CN',
        placeholder: '输入内容...'
    });
    $("select").select2({tags:true});

    // Dropzones
    Dropzone.options.dropzone = {
        url: '/admin/upload',
        init: function () {
            this.on('success', function (file, data) {
                if (data.status != "error") {
                    $code = '<img src="' + data.url + '" style="max-width: 100%;" />';
                    $("[editor]").summernote('code', $("[editor]").summernote('code') + '<br>' + $code);
                }
            });
        },
        paramName: 'image',
        maxFilesize: 3, // MB
        acceptedFiles: 'image/*',
        dictDefaultMessage: "可拖拽图片至此或点击来上传",
        dictFileTooBig: "上传失败, 图片大小不可超过{{maxFilesize}}MB",
        dictInvalidFileType: "文件类型错误"
    };
});

