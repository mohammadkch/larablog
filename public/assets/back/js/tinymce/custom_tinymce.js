tinymce.init({
    selector: '#post',
    language: 'fa',
});

// tinymce.init({
//     selector: '#description',
//     plugins: 'advlist link image lists',
//     a_plugin_option: true,
//     a_configuration_option: 400,
//     language: 'fa',
// });


const image_upload_handler_callback = (blobInfo, progress) => new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.withCredentials = false;

    xhr.open('POST', 'uploadImage');
    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

    xhr.upload.onprogress = (e) => {
        progress(e.loaded / e.total * 100);
    };

    xhr.onload = () => {
        if (xhr.status === 403) {
            reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
            return;
        }

        if (xhr.status < 200 || xhr.status >= 300) {
            reject('HTTP Error: ' + xhr.status);
            return;
        }

        const json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            reject('Invalid JSON: ' + xhr.responseText);
            return;
        }

        resolve(json.location);
    };

    xhr.onerror = () => {
        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };

    const formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
});


// tinymce.init({
//     selector: '#description',
//     plugins: 'image',
//     toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',
//
//     // without images_upload_url set, Upload tab won't show up
//     images_upload_url: 'post/uploadImage',
//
//     // override default upload handler to simulate successful upload
//     images_upload_handler: image_upload_handler_callback
// });

const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

tinymce.init({
    selector: '#description',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
    ],
    images_upload_url: 'uploadImage',
    images_upload_handler: image_upload_handler_callback
});

//
// tinymce.init({
//     selector: '#description',
//
//     image_class_list: [
//         {title: 'img-responsive', value: 'img-responsive'},
//     ],
//     height: 500,
//     setup: function (editor) {
//         editor.on('init change', function () {
//             editor.save();
//         });
//     },
//     plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
//     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
//     tinycomments_mode: 'embedded',
//     tinycomments_author: 'Author name',
//     image_title: true,
//     automatic_uploads: true,
//     images_upload_url: 'uploadImage',
//     file_picker_types: 'image',
//     file_picker_callback: function(cb, value, meta) {
//         var input = document.createElement('input');
//         input.setAttribute('type', 'file');
//         input.setAttribute('accept', 'image/*');
//         input.onchange = function() {
//             var file = this.files[0];
//
//             var reader = new FileReader();
//             reader.readAsDataURL(file);
//             reader.onload = function () {
//                 var id = 'blobid' + (new Date()).getTime();
//                 var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
//                 var base64 = reader.result.split(',')[1];
//                 var blobInfo = blobCache.create(id, file, base64);
//                 blobCache.add(blobInfo);
//                 cb(blobInfo.blobUri(), { title: file.name });
//             };
//         };
//         input.click();
//     }
// });
