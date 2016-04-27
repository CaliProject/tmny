$(function () {
    $("[editor]").summernote({
        lang: 'zh-CN',
        placeholder: '输入内容...'
    });
    $("select").select2({tags:true});
});

