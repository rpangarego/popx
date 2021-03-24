var fileImage;

$(document).ready(function() {
    loadData();

    //load form
    $("#content-data").on("click", "#add-button", function(e){
        clearAlert();
        loadForm(e);
    });

    $("#content-data").on("click", "#edit-button", function(e){
        clearAlert();
        loadForm(e);
    });

    //button cancel
    $("#content-data").on("click", "#cancel-button", loadData);

    //save data 
    $("#content-data").on("submit", "#form", function(e) {
        e.preventDefault();
        var action = e.target.dataset.formStatus;
        // var formModule = e.target.dataset.formModule;
        // var formAction = e.target.dataset.formAction;
        var imageUrl = '';

        if (fileImage !== undefined && fileImage !== null) {
            imageUrl = uploadFileImage();
        }

        // action (<modul>_tambah/<modul>_edit) -> actions.php?action=<modul>_tambah
        $.ajax({
            url: 'actions.php?action='+action,
            type: 'post',
            data: $(this).serialize() + '&image_url='+imageUrl,
            success: function(data) {
                loadData();
                showAlert(data);
            }
        });
    });

    //delete data based on id
    $("#content-data").on("click", "#delete-button", function(e) {
        var id = e.target.dataset.id;
        var action = e.target.dataset.action;
        var confirmDelete = confirm("Hapus data id " + id + "?");
        var urlAction = 'actions.php?action=' + action;

        if (confirmDelete) {
            $.ajax({
                url: urlAction,
                type: 'post',
                data: {
                    id: id
                },
                success: function(data) {
                    loadData();
                    showAlert(data);
                }
            });
        }
    });
})

function loadData() {
    var pathname    = window.location.href;
    var module      = pathname.split('m=')[1]?.split('&')[0];
    var moduleLink  = `module/${module}/data.php`;

    if (module !== undefined) {
        $.ajax({
            url: moduleLink,
            type: 'get',
            success: function(data) {
                $('#content-data').html(data);
            }
        });    
    }
}

function loadForm(e) {
    var id          = e.target.dataset.id;
    var pathname    = window.location.href;
    var module      = pathname.split('m=')[1]?.split('&')[0];
    var moduleLink  = `module/${module}/form.php`;

    var formAction  = (!id) ? 'tambah' : 'edit';
    var formStatus  = module + '_' + formAction;

    $.ajax({
        url: moduleLink,
        type: 'get',
        data: {
            id: id,
            form_status: formStatus,
            form_module: module,
            form_action: formAction
        },
        success: function(data) {
            $('#content-data').html(data);
            fileImage = document.getElementById('fileimage');
        }
    });
}

function generateNewFilename(extension){
    var result           = Date.now().toString();
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    for ( var i = 0; i < 30; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result+'.'+extension;
}

function uploadFileImage(){
    const fileupload = $('#fileimage').prop('files')[0];

    if (fileupload) {
        var filename = fileupload['name'].split('.');
        var newfilename = generateNewFilename(filename[filename.length-1]);
    
        if (newfilename && fileupload) {
            let formData = new FormData();
            formData.append('fileupload', fileupload);
            formData.append('newfilename', newfilename);
    
            $.ajax({
                type: 'POST',
                url: "actions.php?action=upload_image",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert(data);
                },
                error: function() {
                    alert("Failed to upload file");
                }
            });
        }
        return newfilename;
    }
    return '';    
}

function showAlert(message){
    var alert = `<div class="alert" style="width:50%; background-color: pink; padding: 10px; margin-bottom: 2rem; border-radius: 6px; ">${message}</div>`;
    var bootstrapAlert = `<div class="alert alert-success alert-dismissible fade show" role="alert">
    ${message}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>`;
    $('.alert-container').html(bootstrapAlert);
    // document.querySelector('.alert-container>.alert').addEventListener('click', clearAlert);
}

function clearAlert(){
    $('.alert-container').empty();
}

