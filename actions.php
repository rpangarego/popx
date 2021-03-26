<?php
require "inc/functions.php";

$module     = explode('_', $_GET['action'])[0];
$_action    = explode('_', $_GET['action'])[1];
$action_access = check_token($_POST['token']);

// ACTION LOGIN, LOGOUT & UPLOAD IMAGE
switch ($_GET['action']){

    // LOGIN
    case 'check_login':
        $username	= $_POST['username'];
        $password	= $_POST['password'];
        
        $result = $db->get_row("SELECT * FROM users WHERE username='$username' AND password='$password'");

        if ($result) {
            $_SESSION['userid']     = $result->id;
            $_SESSION['username']   = $result->username;
            $_SESSION['password']   = $result->password;
            $_SESSION['status']     = $result->status; // 1 = admin | 2 = headmaster | 3 = students
            $_SESSION['token']      = generate_token();

            // true = login successfully (redirect to index)
            echo true;
        } else {
            echo false;
        }
    break;

    // LOGOUT
    case 'logout':
        $_SESSION['userid']     = null;
        $_SESSION['username']   = null;
        $_SESSION['password']   = null;
        $_SESSION['status']     = null;
        $_SESSION['token']      = null;
        session_destroy();
        
        redirect_js('login');
        break;

    // UPLOAD IMAGE
    case 'upload_image':
        $temp = "images/upload/";
        if (!file_exists($temp))
            mkdir($temp);
        
        $filename       = $_POST['newfilename'];
        $fileupload     = $_FILES['fileupload']['tmp_name'];
        $ImageName      = $_FILES['fileupload']['name'];
        $ImageType      = $_FILES['fileupload']['type'];
        
        if (!empty($fileupload)){
            move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$filename); // Menyimpan file
        
            echo "File uploaded successfully";
        } else {
            echo "Failed to upload file";
        }
    break;

}


// MODULE ACTIONS
if ($action_access) {
    switch ($module){    
        // =================== POSTS ===================
        case 'posts':
            $id             = trim($_POST['id']);
            $title          = trim($_POST['title']);
            $description    = trim($_POST['description']);
            $writer         = trim($_POST['writer']);
    
            switch ($_action) {
                case 'tambah':
                    $query = $db->query("INSERT INTO posts(id, title, description, writer, created_at) VALUES (NULL,'$title','$description','$writer',current_timestamp())");
    
                    if ($query) {
                        echo "Data saved successfully!";
                    } else {
                        echo "Data failed to save. Details: ".$query;
                    }
                    break;
                
                case 'edit':
                    $query = $db->query("UPDATE posts SET title='$title', description='$description', writer='$writer' WHERE id='$id'");
    
                    if ($query) {
                        echo "Data updated successfully!";
                    } else {
                        echo "Failed to update data. Details:".$query;
                    }
                    break;
    
                case 'hapus':
                    $query = $db->query("DELETE FROM posts WHERE id='$id'");
            
                    if ($query) {
                        echo "Data deleted!";
                    } else {
                        echo "Failed to delete data. Details:".$query;
                    }
                    break;
            }
        break;
    
        // =================== FOODS ===================
        case 'foods':
            $id             = trim($_POST['id']);
            $menu          = trim($_POST['menu']);
            $category    = trim($_POST['category']);
            $price         = trim($_POST['price']);
    
            switch ($_action) {
                case 'tambah':
                    $query = $db->query("INSERT INTO foods(id, menu, category, price) VALUES (NULL,'$menu','$category',$price)");
    
                    if ($query) {
                        echo "Data saved successfully!";
                    } else {
                        echo "Data failed to save. Details: ".$query;
                    }
                    break;
                
                case 'edit':
                    $query = $db->query("UPDATE foods SET menu='$menu', category='$category', price='$price' WHERE id='$id'");
    
                    if ($query) {
                        echo "Data updated successfully!";
                    } else {
                        echo "Failed to update data. Details:".$query;
                    }
                    break;
    
                case 'hapus':
                    $query = $db->query("DELETE FROM foods WHERE id='$id'");
            
                    if ($query) {
                        echo "Data deleted!";
                    } else {
                        echo "Failed to delete data. Details:".$query;
                    }
                    break;
            }
        break;
    
        // =================== MAJORS ===================
        case 'majors':
            $id         = trim($_POST['id']);
            $major_code = trim($_POST['major_code']);
            $major      = trim($_POST['major']);
    
            switch ($_action) {
                case 'tambah':
                    $query = $db->query("INSERT INTO majors(id, major_code, major) VALUES (NULL,'$major_code','$major')");
    
                    if ($query) {
                        echo "Data saved successfully!";
                    } else {
                        echo "Data failed to save. Details: ".$query;
                    }
                    break;
    
                case 'edit':
                    $query = $db->query("UPDATE majors SET major_code='$major_code', major='$major' WHERE id='$id'");
    
                    if ($query) {
                        echo "Data updated successfully!";
                    } else {
                        echo "Failed to update data. Details:".$query;
                    }
                    break;
    
                case 'hapus':
                    $query = $db->query("DELETE FROM majors WHERE id='$id'");
            
                    if ($query) {
                        echo "Data deleted!";
                    } else {
                        echo "Failed to delete data. Details:".$query;
                    }
                    break;
            }
        break;
    
        // =================== STUDENTS ===================
        case 'students_tambah': 
            $id             = trim($_POST['id']);
            $full_name      = trim($_POST['full_name']);
            $birth_date     = trim($_POST['birth_date']);
            $birth_place    = $_POST['birth_place'];
            $gender         = $_POST['gender'];
            $city           = $_POST['city'];
            $major_id       = $_POST['major_id'];
            $food_id        = $_POST['food_id'];
            $image_url      = ($_POST['image_url']) ? $_POST['image_url'] : $_POST['tmp_image_url'] ;
    
    
            switch ($_action) {
                case 'tambah':
                    $query = $db->query("INSERT INTO students(id, full_name, birth_date, birth_place, gender, city, major_id, food_id, image_url, created_at) VALUES (NULL,'$full_name','$birth_date','$birth_place','$gender','$city','$major_id','$food_id','$image_url',current_timestamp())");
    
                    if ($query) {
                        echo "Data saved successfully!";
                    } else {
                        echo "Failed to save data. Details: ".$query;
                    }
                    break;
                
                case 'edit':
                    $query = $db->query("UPDATE students SET full_name='$full_name', birth_date='$birth_date', birth_place='$birth_place', gender='$gender', city='$city', major_id='$major_id', food_id='$food_id', image_url='$image_url' WHERE id='$id'");
    
                    if ($query) {
                        echo "Data updated successfully!";
                    } else {
                        echo "Failed to update data. Details:".$query;
                    }
                    break;
            
                case 'hapus':
                    $query = $db->query("DELETE FROM students WHERE id='$id'");
                    if ($query) {
                        echo "Data deleted!";
                    } else {
                        echo "Failed to delete data. Details:".$query;
                    }
                    break;
            }
        break;
    }
} else {
    echo "Failed to execute action! Invalid token.";
}

?>

