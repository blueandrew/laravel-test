var exampleModal = document.getElementById('exampleModal');
if (exampleModal){
    exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var note_id = button.getAttribute('data-note-id')

        fetch('/note/'+note_id, {method: 'get'})
        .then((response) => response.json())
        .then( data =>{
            document.getElementById('noteId').value = data['id'];
            document.getElementById('title').value = data['title'];
            document.getElementById('url').value = data['url'];
        }).catch(function(err) {
            console.log('錯誤:', err);
        })
    })
}