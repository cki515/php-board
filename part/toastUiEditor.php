
<!-- 코드 미러 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css" />

<!-- Editor -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

<!-- 토스트 UI 에디터, CSS 코어 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />

<script>
    
    function ToastEditor__getBodyFromXTemplate($el) {
        return $el.html().trim().replace(/<!--REPLACE:script-->/gi, 'script');
    }
    function ToastEditor__init() {
        $('.toast-editor.toast-editor-viewer:not(.toast-editor-loaded)').each(
            function (index, el) {
                var $el = $(this);
                var initialValue = ToastEditor__getBodyFromXTemplate($el.prev());
                var editor = new toastui.Editor.factory({
                    el: el,
                    viewer: true,
                    initialValue: initialValue,
                });
                $el.addClass('toast-editor-loaded');
                $el.data('data-toast-editor', editor);
            });

        $('.toast-editor:not(.toast-editor-loaded)').each(
            function (index, el) {
                var $el = $(this);
                var height = jq_attr($el, 'data-toast-editor-height', '500px');
                var initialEditType = jq_attr($el,
                    'data-toast-editor-initialEditType', "markdown");
                var previewStyle = jq_attr($el,
                    'data-toast-editor-previewStyle', "vertical");
                var initialValue = ToastEditor__getBodyFromXTemplate($el.prev());
               
                var editor = new toastui.Editor({
                    el: el,
                    height: height,
                    initialEditType: initialEditType,
                    previewStyle: previewStyle,
                    initialValue: initialValue,
                });
                
                $el.addClass('toast-editor-loaded');
                $el.data('data-toast-editor', editor);
        });
    }
    
    $(function () {
        ToastEditor__init();
    });
</script>
