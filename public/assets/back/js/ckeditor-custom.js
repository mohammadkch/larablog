ClassicEditor
    .create(document.querySelector('#post'))
    .catch(error => {
        console.error(error);
    });


ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
        console.error(error);
    });
