/**
 * Created by GrzegorzOLD on 4/8/2016.
 */

    tinymce.init({
        selector: '[name="description"]',
        plugins: [             'autoresize','advlist autolink lists link image charmap print preview hr anchor pagebreak',             'searchreplace wordcount visualblocks visualchars code fullscreen',             'insertdatetime media nonbreaking save table contextmenu directionality',             'emoticons template paste textcolor colorpicker textpattern imagetools'         ],
        width: '100%',
        height: 400,
        autoresize_min_height: 400,
        language : 'pl'
    });
