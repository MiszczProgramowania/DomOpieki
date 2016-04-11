/**
 * Created by GrzegorzOLD on 4/8/2016.
 */
    
    tinymce.init({
        selector: 'input[name="description"]',
        plugins: ['autosave autoresize','advlist autolink lists link image charmap print preview hr anchor pagebreak ',             'searchreplace wordcount visualblocks visualchars code fullscreen',             'insertdatetime media nonbreaking save table contextmenu directionality',             'emoticons template paste textcolor colorpicker textpattern imagetools'         ],
        width: '100%',
        height: 400,
        autoresize_min_height: 400,
        language : 'pl',
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image print media | forecolor backcolor emoticons | bullist numlist outdent indent| code',

        image_advtab: true
    });
