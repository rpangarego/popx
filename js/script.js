var fileImage;
var usernameTxt;
var passwordTxt;
var loginForm;
var btnLogin;

$(document).ready(function() {
    pathLink = window.location.pathname.split('/');
    mainPath = pathLink[pathLink.length-1];

    if (mainPath === 'login') {
        login();
    } else {
        loadData();
    }

    //load form
    $("#content-data").on("click", "#add-button", function(e){
        clearAlert();
        loadForm(e);
    });

    $("#content-data").on("click", "#edit-button", function(e){
        clearAlert();
        loadForm(e);
    });

    //button batal
    $("#content-data").on("click", "#cancel-button", loadData);

    //simpan data 
    $("#content-data").on("submit", "#form", function(e) {
        e.preventDefault();
        var action = e.target.dataset.formStatus;
        var imageUrl = '';

        if (fileImage !== undefined && fileImage !== null) {
            imageUrl = uploadFileImage();
        }

        // action (<modul>_tambah/<modul>_edit) -> ex: actions.php?action=<modul>_tambah
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
        var id      = e.target.dataset.id;
        var action  = e.target.dataset.action;
        var token   = e.target.dataset.token
        var confirmDelete = confirm("Hapus data id " + id + "?");
        var urlAction     = 'actions.php?action=' + action;

        if (confirmDelete) {
            $.ajax({
                url: urlAction,
                type: 'post',
                data: {
                    id: id,
                    token: token
                },
                success: function(data) {
                    loadData();
                    showAlert(data);
                }
            });
        }
    });
})

function login() {
    usernameTxt = document.getElementById('username');
    passwordTxt = document.getElementById('password');
    loginForm   = document.getElementById('login-form');
    btnLogin    = document.getElementById('btn-login');

    loginForm.addEventListener('submit', (e)=>{
        e.preventDefault();
        checkLoginCredentials();
    })
}

function checkLoginCredentials() {
    username = usernameTxt.value;
    password = passwordTxt.value;

    if (!username || !password){
        showAlert("Username dan password wajib diisi.");
        disabledButton(false);
      
        if (!username) {
            usernameTxt.focus();
        } else if (!password) {
            passwordTxt.focus();
        }
        return false;
    }

    $.ajax({
        type	: "POST",
        url		: "actions.php?action=check_login",
        data	: "username="+username+
                  "&password="+password,
        success	: function(res){
            if (res == 1){ // 1 = true
                window.location.href = "index";
            } else {
                showAlert("Username or password wrong!");
                disabledButton(false);
                passwordTxt.value = "";
                passwordTxt.focus();
            }
        }
    });
}

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
                success: function (data) {
                    alert(data);
                },
                error: function () {
                    alert("Failed to upload file");
                }
            });
        }
        return newfilename;
    }
    return '';    
}

function disabledButton(state){ //status (true:show / false:hide)
    if (state) {
        btnLogin.classList.add('disabled');
        btnLogin.setAttribute('disabled','true');
    } else {
        btnLogin.classList.remove('disabled');
        btnLogin.removeAttribute('disabled');
    }
}

function showAlert(message){
    var alert = `<div class="alert" style="width:50%; background-color: pink; padding: 10px; margin-bottom: 2rem; border-radius: 6px; ">${message}</div>`;
    $('.alert-container').html(alert);
    document.querySelector('.alert-container>.alert').addEventListener('click', clearAlert);
}

function clearAlert(){
    $('.alert-container').empty();
}

