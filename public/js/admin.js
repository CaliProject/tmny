$(function () {
    $("[editor]").summernote({
        lang: 'zh-CN',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'link', 'hr']]
        ],
        placeholder: '输入内容...'
    });
});