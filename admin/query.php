<?php

include("config.php");
include("function.php");

 


if (isset($_POST['adminUsername'])) {
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = md5($_POST['adminPassword']);

    $sql = "SELECT adminPassword FROM admin WHERE adminUsername = ?";
    $result = select($sql, [$adminUsername], 's');

    if ($result && $row = mysqli_fetch_assoc($result)) {
        if ($adminPassword == $row['adminPassword']) {
            session_start();
            $_SESSION['adminUsername'] = $adminUsername;
            echo 1;
        } else {
            echo "Invalid Username or Password";
        }
    } else {
        echo "Invalid Username or Password";
    }
}


if (isset($_FILES['faviconImage'])) {

    $sqlSelect = "SELECT setting_value FROM settings WHERE setting_key = 'favicon';";
    $currentImage = selectSingleParams($sqlSelect);

    $image_name = rand() . rand() . time() . basename($_FILES["faviconImage"]["name"]);

    if (move_uploaded_file($_FILES["faviconImage"]["tmp_name"], "uploads/" . $image_name)) {

        if ($currentImage && file_exists("uploads/" . $currentImage)) {
            unlink("uploads/" . $currentImage);
        }

        $sqlUpdate = "UPDATE settings SET setting_value = ? WHERE setting_key = 'favicon';";
        $values = [$image_name];
        $param_types = 's';

        $result = updateIdAvaliable($sqlUpdate, $values, $param_types);
        if ($result) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }
    }
}

if (isset($_FILES['settingLogo'])) {

    $sqlSelect = "SELECT setting_value FROM settings WHERE setting_key = 'logo';";
    $currentImage = selectSingleParams($sqlSelect);

    $image_name = rand() . rand() . time() . basename($_FILES["settingLogo"]["name"]);
    if (move_uploaded_file($_FILES["settingLogo"]["tmp_name"], "uploads/" . $image_name)) {

        if ($currentImage && file_exists("uploads/" . $currentImage)) {
            unlink("uploads/" . $currentImage);
        }
        $sqlUpdate = "UPDATE settings SET setting_value = ? WHERE setting_key = 'logo';";
        $values = [$image_name];
        $param_types = 's';

        $result = updateIdAvaliable($sqlUpdate, $values, $param_types);
        if ($result) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }
    }
}

if (isset($_POST['updatecontactdata'])) {

    // Sanitize the input to prevent SQL injection
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
    $contactTime = mysqli_real_escape_string($conn, $_POST['contacttime']);
    $contactaddress = mysqli_real_escape_string($conn, $_POST['contactaddress']);
    $contactemail = mysqli_real_escape_string($conn, $_POST['contactemail']);

    // SQL query to update contact details
    $sqlUpdate = "UPDATE `contactus` SET `number` = ?, `address` = ?, `email` = ? , `time` = ? WHERE `id` = 1";

    // Prepare the statement
    if ($stmt = $conn->prepare($sqlUpdate)) {
        // Bind parameters
        $stmt->bind_param("ssss", $contactNumber, $contactaddress, $contactemail, $contactTime);

        // Execute the query
        if ($stmt->execute()) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }
    } else {
        echo 0; // Failure
    }
}


if (isset($_POST['facebooklink'])) {
   

    $facebooklink = $conn->real_escape_string($_POST['facebooklink']);
    $instagramlink = $conn->real_escape_string($_POST['instagramlink']);
    $youtubelink = $conn->real_escape_string($_POST['youtubelink']);
    $whatsappnumber = $conn->real_escape_string($_POST['whatsappnumber']);

    $sql = "UPDATE important_links SET 
            facebook_link = '$facebooklink', 
            instagram_link = '$instagramlink', 
            linkedin_link = '$youtubelink', 
            twitter_link = '$whatsappnumber' 
            WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo 0;
    }

}


if (isset($_POST['Disclaimer_Title'])) {

    // Insert new disclaimer data
    $sqlInsert = "INSERT INTO disclaimers (title, description) VALUES (?, ?)";
    $values = [$_POST['Disclaimer_Title'], $_POST['Disclaimer_Description']];
    $result = insert($sqlInsert, $values, 'ss');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['loadDisclaimer_Data'])) {
    // Load all disclaimers
    $result = selectalldata('disclaimers');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 Disclaimer_EditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger Disclaimer_DeleteById' data-id='$row[id]'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}

if (isset($_POST['deleteDisclaimer_ById'])) {
    // Delete disclaimer by ID
    $sql = "DELETE FROM disclaimers WHERE id = ?";
    $val = [$_POST['deleteDisclaimer_ById']];
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1;
    }
}

if (isset($_POST['loadDisclaimer_EditForm'])) {
    // Load disclaimer edit form data
    $sql = "SELECT * FROM disclaimers WHERE id = ?";
    $val = [$_POST['loadDisclaimer_EditForm']];
    $result = select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

if (isset($_POST['newDisclaimer_Title'])) {
    // Update disclaimer data
    $id = $_POST['Disclaimer_EditId'];
    $sqlUpdate = "UPDATE disclaimers SET title = ?, description = ? WHERE id = ?";
    $values = [$_POST['newDisclaimer_Title'], $_POST['newDisclaimer_Description'], $id];
    $param_types = 'ssi';

    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


// Insert new Terms and Condition
if (isset($_POST['TermsAndCondition_Title'])) {
    $title = $_POST['TermsAndCondition_Title'];
    $description = $_POST['TermsAndCondition_Description'];

    $sqlInsert = "INSERT INTO terms_and_conditions (title, description) VALUES (?, ?)";
    $values = [$title, $description];
    $result = insert($sqlInsert, $values, 'ss');
    
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

// Load all Terms and Conditions
if (isset($_POST['loadTermsAndCondition_Data'])) {
    $result = selectalldata('terms_and_conditions');
    
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 TermsAndCondition_EditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger TermsAndCondition_DeleteById' data-id='$row[id]'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
            ";
            $sr++;
        }
    }
}

// Delete Terms and Condition by ID
if (isset($_POST['deleteTermsAndCondition_ById'])) {
    $id = $_POST['deleteTermsAndCondition_ById'];
    $sql = "DELETE FROM terms_and_conditions WHERE id = ?";
    $val = [$id];
    $result = delete($sql, $val, 'i');
    
    if ($result) {
        echo 1; // Success
    }
}

// Load Terms and Condition Edit Form
if (isset($_POST['loadTermsAndCondition_EditForm'])) {
    $id = $_POST['loadTermsAndCondition_EditForm'];
    $sql = "SELECT * FROM terms_and_conditions WHERE id = ?";
    $val = [$id];
    $result = select($sql, $val, 'i');
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row); // Send data in JSON format
    }
}

// Update Terms and Condition
if (isset($_POST['newTermsAndCondition_Title'])) {
    $id = $_POST['TermsAndCondition_EditId'];
    $title = $_POST['newTermsAndCondition_Title'];
    $description = $_POST['newTermsAndCondition_Description'];

    $sqlUpdate = "UPDATE terms_and_conditions SET title = ?, description = ? WHERE id = ?";
    $values = [$title, $description, $id];
    $param_types = 'ssi'; // Define parameter types (string, string, integer)

    $result = update($sqlUpdate, $values, $param_types);
    
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}


if (isset($_POST['policy_Title'])) {
    $title = $_POST['policy_Title'];
    $description = $_POST['policy_Description'];
    
    $sql = "INSERT INTO policies (title, description) VALUES (?, ?)";
    $params = [$title, $description];
    
    $result = insert($sql, $params, 'ss');
    if ($result) {
        echo 1;  // Success
    } else {
        echo 0;  // Failure
    }
}


if (isset($_POST['loadpolicy_Data'])) {
    $result = selectalldata('policies');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 policy_EditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger policy_DeleteById' data-id='$row[id]'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}


if (isset($_POST['deletepolicy_ById'])) {
    $sql = "DELETE FROM policies WHERE id = ?";
    $val = [$_POST['deletepolicy_ById']];
    
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1;  // Success
    }
}

if (isset($_POST['loadpolicy_EditForm'])) {
    $sql = "SELECT * FROM policies WHERE id = ?";
    $val = [$_POST['loadpolicy_EditForm']];
    
    $result = select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

if (isset($_POST['newpolicy_Title'])) {
    $id = $_POST['policy_EditId'];
    $sqlUpdate = "UPDATE policies SET title = ?, description = ? WHERE id = ?";
    $values = [$_POST['newpolicy_Title'], $_POST['newpolicy_Description'], $id];
    $param_types = 'ssi';
    
    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1;  // Success
    } else {
        echo 0;  // Failure
    }
}


if (isset($_POST['sender_email'])) {

    
    $sender_email = mysqli_real_escape_string($conn, $_POST['sender_email']);
    $reply_to_email = mysqli_real_escape_string($conn, $_POST['reply_to_email']);
    
    // Update query for email_templates table
    $updateQuery = "UPDATE `email_templates` 
                    SET   `sender_email` = '$sender_email', 
                        `reply_to_email` = '$reply_to_email' 
                    WHERE `id` = 1"; // Adjust the WHERE clause based on your conditions

    if (mysqli_query($conn, $updateQuery)) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
} 


if (isset($_POST['aboutName'])) {

    // Sanitize the input to prevent SQL injection
    $aboutName = mysqli_real_escape_string($conn, $_POST['aboutName']);
    $aboutDescription = mysqli_real_escape_string($conn, $_POST['aboutDescription']);
    // $serviceDescription = mysqli_real_escape_string($conn, $_POST['serviceDescription']);

    // SQL query to update about details
    $sqlUpdate = "UPDATE `about` SET `name` = ?, `description` = ?  WHERE `id` = 1";

    // Prepare the statement
    if ($stmt = $conn->prepare($sqlUpdate)) {
        // Bind parameters
        $stmt->bind_param("ss", $aboutName, $aboutDescription);

        // Execute the query
        if ($stmt->execute()) {
            echo 1; // Success
        } else {
            echo 0; // Failure
        }

        // Close the statement
        $stmt->close();
    } else {
        echo 0; // Failure
    }
}


// Add Home Slider
if (isset($_POST['services_Title'])) {
    $image_name = rand() . rand() . basename($_FILES["services_Image"]["name"]);

    $sqlInsert = "INSERT INTO services (image, title, description) VALUES (?,  ?, ?)";
    $values = [
        $image_name,
        $_POST['services_Title'],
        $_POST['services_Description'],
    ];

    $result = insert($sqlInsert, $values, 'sss');

    if ($result) {
        move_uploaded_file($_FILES["services_Image"]["tmp_name"], "uploads/" . $image_name);
        echo 1;
    } else {
        echo 0;
    }
}

// Fetch all Home Sliders
if (isset($_POST['loadservices_Data'])) {
    $query = "SELECT * FROM services";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td><img src='uploads/{$row['image']}' alt='Image not found' height='100' width='100'></td>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary services_EditById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['id']}' 
                        data-bs-target='#Model'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-danger services_DeleteById' 
                        data-id='{$row['id']}' 
                        data-deleteimg='{$row['image']}'>
                        <i class='bx bx-trash fs-16'></i>
                    </button>
                </td>
            </tr>";
            $sr++;
        }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No data found.</td></tr>";
    }
}

// Delete Home Slider
if (isset($_POST['deleteservices_ById'])) {
    $id = $_POST['deleteservices_ById'];
    $img = $_POST['deleteservices_Img'];

    $sqlDelete = "DELETE FROM services WHERE id = ?";
    $result = delete($sqlDelete, [$id], 'i');

    if ($result) {
        $imagePath = 'uploads/' . $img;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        echo 1;
    } else {
        echo 0;
    }
}

// Load data for editing
if (isset($_POST['loadservices_EditForm'])) {
    $sql = "SELECT * FROM services WHERE id = ?";
    $result = select($sql, [$_POST['loadservices_EditForm']], 'i');

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

// Update Home Slider
if (isset($_POST['newservices_Title'])) {
    $id = $_POST['services_EditId'];

    $sqlSelect = "SELECT image FROM services WHERE id = ?";
    $currentImage = selectSingleValue($sqlSelect, [$id], 'i');

    $image_name = $currentImage;
    if (isset($_FILES['newservices_Image']) && $_FILES['newservices_Image']['error'] == UPLOAD_ERR_OK) {
        $image_name = rand() . rand() . basename($_FILES["newservices_Image"]["name"]);
        move_uploaded_file($_FILES["newservices_Image"]["tmp_name"], "uploads/" . $image_name);

        if ($currentImage && file_exists("uploads/" . $currentImage)) {
            unlink("uploads/" . $currentImage);
        }
    }

    $sqlUpdate = "UPDATE services SET image = ?, title = ?, description = ? WHERE id = ?";
    $values = [
        $image_name,
        $_POST['newservices_Title'],
        $_POST['newservices_Description'],
        $id,
    ];

    $result = update($sqlUpdate, $values, 'sssi');

    echo $result ? 1 : 0;
}


if (isset($_FILES['carouselImage'])) {

    $image_name = rand() . rand() . basename($_FILES["carouselImage"]["name"]);
    $sqlInsert = "INSERT INTO carousel (Image ) VALUES (?)";
    $values = [$image_name];
    $result = insert($sqlInsert, $values, 's');
    if ($result) {
        move_uploaded_file($_FILES["carouselImage"]["tmp_name"], "uploads/" . $image_name);
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadCarouselData'])) {
    $result = selectalldata('carousel');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td><img src='uploads/$row[Image]' alt='Image not found' height='100' width='100'></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger carouselDeleteById' data-id='$row[id]' data-deleteimg='$row[Image]' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}

if (isset($_POST['deleteCarouselById'])) {
    $sql = "DELETE FROM `carousel` WHERE id = ?";
    $val = [$_POST['deleteCarouselById']];
    $result =  delete($sql, $val, 'i');
    if ($result) {
        unlink('uploads/' . $_POST['deleteCarouselImg']);
        echo 1;
    }
}

if (isset($_POST['contactName'])) {
    // echo "Varshit";
    
    $sqlInsert = "INSERT INTO contactus_web (name, email ,  phone , message ) VALUES (?, ? , ? , ? )";
    $values = [$_POST['contactName'], $_POST['email'] , $_POST['phone'] , $_POST['message']];
    $result = insert($sqlInsert, $values, 'ssss');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadContactData'])) {
    $result = selectalldata('contactus_web');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[message]</td>
                <td><button type='button' class='btn btn-sm btn-soft-danger contactDeleteById' data-id='$row[id]' ' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}

if (isset($_POST['contactDeleteById'])) {

    $sql = "DELETE FROM `contactus_web` WHERE id = ?";
    $val = [$_POST['contactDeleteById']];
    $result =  delete($sql, $val, 'i');

    if ($result) {
        echo 1;
    }
}



// Insert new Terms and Condition
if (isset($_POST['Blog_Title'])) {
    $title = $_POST['Blog_Title'];
    $description = $_POST['Blog_Description'];

    $sqlInsert = "INSERT INTO  blog (title, description) VALUES (?, ?)";
    $values = [$title, $description];
    $result = insert($sqlInsert, $values, 'ss');
    
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

// Load all Terms and Conditions
if (isset($_POST['loadBlog_Data'])) {
    $result = selectalldata('blog');
    
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 Blog_EditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger Blog_DeleteById' data-id='$row[id]'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
            ";
            $sr++;
        }
    }
}

// Delete Terms and Condition by ID
if (isset($_POST['deleteBlog_ById'])) {
    $id = $_POST['deleteBlog_ById'];
    $sql = "DELETE FROM blog WHERE id = ?";
    $val = [$id];
    $result = delete($sql, $val, 'i');
    
    if ($result) {
        echo 1; // Success
    }
}

// Load Terms and Condition Edit Form
if (isset($_POST['loadBlog_EditForm'])) {
    $id = $_POST['loadBlog_EditForm'];
    $sql = "SELECT * FROM blog WHERE id = ?";
    $val = [$id];
    $result = select($sql, $val, 'i');
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row); // Send data in JSON format
    }
}

// Update Terms and Condition
if (isset($_POST['newBlog_Title'])) {
    $id = $_POST['Blog_EditId'];
    $title = $_POST['newBlog_Title'];
    $description = $_POST['newBlog_Description'];

    $sqlUpdate = "UPDATE blog SET title = ?, description = ? WHERE id = ?";
    $values = [$title, $description, $id];
    $param_types = 'ssi'; // Define parameter types (string, string, integer)

    $result = update($sqlUpdate, $values, $param_types);
    
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}


// Insert new Terms and Condition
if (isset($_POST['testimonials_Title'])) {
    $title = $_POST['testimonials_Title'];
    $description = $_POST['testimonials_Description'];

    $sqlInsert = "INSERT INTO  testimonials (title, description) VALUES (?, ?)";
    $values = [$title, $description];
    $result = insert($sqlInsert, $values, 'ss');
    
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

// Load all Terms and Conditions
if (isset($_POST['loadtestimonials_Data'])) {
    $result = selectalldata('testimonials');
    
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 testimonials_EditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger testimonials_DeleteById' data-id='$row[id]'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
            ";
            $sr++;
        }
    }
}

// Delete Terms and Condition by ID
if (isset($_POST['deletetestimonials_ById'])) {
    $id = $_POST['deletetestimonials_ById'];
    $sql = "DELETE FROM testimonials WHERE id = ?";
    $val = [$id];
    $result = delete($sql, $val, 'i');
    
    if ($result) {
        echo 1; // Success
    }
}

// Load Terms and Condition Edit Form
if (isset($_POST['loadtestimonials_EditForm'])) {
    $id = $_POST['loadtestimonials_EditForm'];
    $sql = "SELECT * FROM testimonials WHERE id = ?";
    $val = [$id];
    $result = select($sql, $val, 'i');
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row); // Send data in JSON format
    }
}

// Update Terms and Condition
if (isset($_POST['newtestimonials_Title'])) {
    $id = $_POST['testimonials_EditId'];
    $title = $_POST['newtestimonials_Title'];
    $description = $_POST['newtestimonials_Description'];

    $sqlUpdate = "UPDATE testimonials SET title = ?, description = ? WHERE id = ?";
    $values = [$title, $description, $id];
    $param_types = 'ssi'; // Define parameter types (string, string, integer)

    $result = update($sqlUpdate, $values, $param_types);
    
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

