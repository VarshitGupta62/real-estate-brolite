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


if (isset($_POST['updateaccountdata'])) {

    // Sanitize the input to prevent SQL injection
    $accountName = mysqli_real_escape_string($conn, $_POST['accountName']);
    $accountNumber = mysqli_real_escape_string($conn, $_POST['accountNumber']);
    $ifscCode = mysqli_real_escape_string($conn, $_POST['ifscCode']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // SQL query to update subscription details
    $sqlUpdate = "UPDATE `subscription_details` SET `account_name` = ?, `account_number` = ?, `ifsc_code` = ?, `description` = ? WHERE `id` = 1";

    // Prepare the statement
    if ($stmt = $conn->prepare($sqlUpdate)) {
        // Bind parameters
        $stmt->bind_param("ssss", $accountName, $accountNumber, $ifscCode, $description);

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

    $sqlInsert = "INSERT INTO contactus_web (name, email ,  message ) VALUES (?, ? ,  ? )";
    $values = [$_POST['contactName'], $_POST['email'],  $_POST['message']];
    $result = insert($sqlInsert, $values, 'sss');
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



if (isset($_POST['OTHER_FAQ_Title'])) {

    

    $sqlInsert = "INSERT INTO other_faq (title , description ) VALUES (? , ?)";
    $values = [$_POST['OTHER_FAQ_Title'], $_POST['OTHER_FAQ_Description']];
    $result = insert($sqlInsert, $values, 'ss');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['loadOTHER_FAQ_Data'])) {
    $result = selectalldata('other_faq');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 OTHER_FAQ_EditById' data-bs-toggle='modal'data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger OTHER_FAQ_DeleteById' data-id='$row[id]' ' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}

if (isset($_POST['deleteOTHER_FAQ_ById'])) {
    $sql = "DELETE FROM `other_faq` WHERE id = ?";
    $val = [$_POST['deleteOTHER_FAQ_ById']];
    $result =  delete($sql, $val, 'i');
    if ($result) {
        echo 1;
    }
}


if (isset($_POST['loadOTHER_FAQ_EditForm'])) {
    $sql = "SELECT * FROM `other_faq` WHERE id = ?";
    $val = [$_POST['loadOTHER_FAQ_EditForm']];
    $result =  select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $row = json_encode($row);
        echo $row;
    }
}


if (isset($_POST['newOTHER_FAQ_Title'])) {

    $id = $_POST['OTHER_FAQ_EditId'];

    // Update only the text fields if no new image is uploaded
    $sqlUpdate = "UPDATE other_faq SET  title = ? , description = ?  WHERE id = ?";
    $values = [$_POST['newOTHER_FAQ_Title'], $_POST['newOTHER_FAQ_Description'], $id];
    $param_types = 'sss'; // Three placeholders for title, text, and id


    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['How_it_workTitle'])) {

    $sqlInsert = "INSERT INTO how_it_work (title) VALUES (?)";
    $values = [$_POST['How_it_workTitle']];
    $result = insert($sqlInsert, $values, 's');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadHow_it_workData'])) {
    $result = selectalldata('how_it_work');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 How_it_workEditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger How_it_workDeleteById' data-id='$row[id]' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}

if (isset($_POST['deleteHow_it_workById'])) {
    $sql = "DELETE FROM `how_it_work` WHERE id = ?";
    $val = [$_POST['deleteHow_it_workById']];
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadHow_it_workEditForm'])) {
    $sql = "SELECT * FROM `how_it_work` WHERE id = ?";
    $val = [$_POST['loadHow_it_workEditForm']];
    $result = select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $row = json_encode($row);
        echo $row;
    }
}

if (isset($_POST['newHow_it_workTitle'])) {

    $id = $_POST['How_it_workEditId'];

    $sqlUpdate = "UPDATE how_it_work SET title = ? WHERE id = ?";
    $values = [$_POST['newHow_it_workTitle'], $id];
    $param_types = 'si';

    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['loadQuestionsDropdown'])) {
    $query = "SELECT id, title FROM how_it_work"; // Adjust table and column names as needed
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<option value="" selected disabled >-- Select a Question --</option>'; // Default option
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</option>';
        }
    } else {
        echo '<option value="">No questions available</option>';
    }
    exit;
}




if (isset($_POST['questionId']) && isset($_POST['answerText'])) {
    $questionId = (int) $_POST['questionId'];
    $answerText = mysqli_real_escape_string($conn, $_POST['answerText']);

    $query = "INSERT INTO answers (question_id, answer) VALUES ($questionId, '$answerText')";
    echo mysqli_query($conn, $query) ? 1 : 0;
    exit;
}



if (isset($_POST['questionId'])) {

    $image_name = rand() . rand() . basename($_FILES["questionImage"]["name"]);

    // Prepare SQL statement
    $sqlInsert = "INSERT INTO answers (question_id, image , title , answer ) VALUES (?, ? , ? , ?)";

    $values = [
        $_POST['questionId'],
        $image_name,
        $_POST['questionTitle'],
        $_POST['questionAnswer'],
    ];

    $result = insert($sqlInsert, $values, 'ssss');

    if ($result) {
        move_uploaded_file($_FILES["questionImage"]["tmp_name"], "uploads/" . $image_name);
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_POST['loadAllData'])) {
    // Ensure the connection variable is initialized and valid
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to fetch data with JOIN
    $query = "SELECT 
    answers.id AS answerId, 
    how_it_work.title AS questionTitle, 
    answers.answer AS answerText, 
    answers.image AS answerImage, 
    answers.title AS answerTitle
FROM 
    answers 
JOIN 
    how_it_work 
ON 
    answers.question_id = how_it_work.id;
";

    $result = mysqli_query($conn, $query);

    // Check if the query ran successfully
    if (!$result) {
        echo "<tr><td colspan='7' class='text-center'>Error fetching data: " . mysqli_error($conn) . "</td></tr>";
        exit;
    }

    // Check if there are rows in the result
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>{$row['questionTitle']}</td>
                <td>
                    <img src='uploads/{$row['answerImage']}' alt='Image not found' height='100' width='100'>
                </td>
                <td>{$row['answerTitle']}</td>
                <td>{$row['answerText']}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary me-1 allDataEditById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['answerId']}' 
                        data-bs-target='#newModel'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-danger allDataDeleteById' 
                        data-id='{$row['answerId']}' 
                        data-deleteimg='{$row['answerImage']}'>
                        <i class='bx bx-trash fs-16'></i>
                    </button>
                </td>
            </tr>";
            $sr++;
        }
    } else {
        // If no data is found, show a message
        echo "<tr><td colspan='7' class='text-center'>No data found.</td></tr>";
    }
}


if (isset($_POST['deleteallDataById'])) {


    $blogId = $_POST['deleteallDataById'];
    $blogImg = $_POST['deleteallDataImg'];

    $sql = "DELETE FROM `answers` WHERE id = ?";
    $val = [$blogId];
    $result = delete($sql, $val, 'i');
    if ($result) {
        $imagePath = 'uploads/' . $blogImg;
        if (file_exists($imagePath)) {
            unlink($imagePath); // Remove the file
        }
        echo 1; // Success
    } else {
        echo 0; // Failed to delete from the database
    }
}


if (isset($_POST['loadallDataEditForm'])) {
    $sql = "SELECT * FROM `answers` WHERE id = ?";
    $val = [$_POST['loadallDataEditForm']];
    $result =  select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $row = json_encode($row);
        echo $row;
    }
}

if (isset($_POST['newquestionTitle'])) {

    // Get the blog ID from the hidden field
    $id = $_POST['Questions_with_Answers'];

    // Query to get the current blog image
    $sqlSelect = "SELECT image FROM answers WHERE id = ?";
    $currentImage = selectSingleValue($sqlSelect, [$id], 's');

    if (isset($_FILES['newquestionImage']) && $_FILES['newquestionImage']['error'] == UPLOAD_ERR_OK) {

        // Generate a random name for the new image
        $image_name = rand() . rand() . basename($_FILES["newquestionImage"]["name"]);

        // Move the uploaded image to the "uploads" folder
        if (move_uploaded_file($_FILES["newquestionImage"]["tmp_name"], "uploads/" . $image_name)) {

            // Delete the old image file if it exists
            if ($currentImage && file_exists("uploads/" . $currentImage)) {
                unlink("uploads/" . $currentImage);
            }

            // Update the database with the new blog image and other details
            $sqlUpdate = "UPDATE `answers` 
                          SET 
                            `question_id` = ?, 
                            `image` = ?,
                            `title` = ?, 
                            `answer` = ?
                          WHERE `id` = ?";
            $values = [
                $_POST['newquestionId'],
                $image_name,
                $_POST['newquestionTitle'],
                $_POST['newquestionAnswer'],
                $id
            ];
            $param_types = 'sssss'; // Correct number of placeholders for all fields
        }
    } else {
        // If no new image is uploaded, update the blog data without changing the image
        $sqlUpdate = "UPDATE `answers` 
                          SET 
                            `question_id` = ?, 
                            `title` = ?, 
                            `answer` = ?
                          WHERE `id` = ?";
        $values = [
            $_POST['newquestionId'],
            $_POST['newquestionTitle'],
            $_POST['newquestionAnswer'],
            $id
        ];
        $param_types = 'ssss'; // Correct number of placeholders for all fields
    }

    // Execute the database update query
    $result = update($sqlUpdate, $values, $param_types);

    // Return the result of the update
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

if (isset($_POST['investingTitle'])) {
    $image_name = rand() . rand() . basename($_FILES["investingImage"]["name"]);

    $sqlInsert = "INSERT INTO investing_styles (image, name, title, description) VALUES (?, ?, ?, ?)";
    $values = [
        $image_name,
        $_POST['investingName'], // New Name field
        $_POST['investingTitle'],
        $_POST['investingDescription'],
    ];


    $result = insert($sqlInsert, $values, 'ssss');

    if ($result) {
        move_uploaded_file($_FILES["investingImage"]["tmp_name"], "uploads/" . $image_name);
        echo 1;
    } else {
        echo 0;
    }
}

// Fetch all Investing Styles
if (isset($_POST['loadinvestingData'])) {
    $query = "SELECT * FROM investing_styles";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td><img src='uploads/{$row['image']}' alt='Image not found' height='100' width='100'></td>
                <td>{$row['name']}</td> 
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary investingEditById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['id']}' 
                        data-bs-target='#Model'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-danger investingDeleteById' 
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

// Delete an Investing Style
if (isset($_POST['deleteinvestingById'])) {
    $id = $_POST['deleteinvestingById'];
    $img = $_POST['deleteinvestingImg'];

    $sqlDelete = "DELETE FROM investing_styles WHERE id = ?";
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
if (isset($_POST['loadinvestingEditForm'])) {
    $sql = "SELECT * FROM investing_styles WHERE id = ?";
    $result = select($sql, [$_POST['loadinvestingEditForm']], 'i');

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

// Update Investing Style
if (isset($_POST['newinvestingTitle'])) {
    $id = $_POST['investingEditId'];

    $sqlSelect = "SELECT image FROM investing_styles WHERE id = ?";
    $currentImage = selectSingleValue($sqlSelect, [$id], 'i');

    $image_name = $currentImage;
    if (isset($_FILES['newinvestingImage']) && $_FILES['newinvestingImage']['error'] == UPLOAD_ERR_OK) {
        $image_name = rand() . rand() . basename($_FILES["newinvestingImage"]["name"]);
        move_uploaded_file($_FILES["newinvestingImage"]["tmp_name"], "uploads/" . $image_name);

        if ($currentImage && file_exists("uploads/" . $currentImage)) {
            unlink("uploads/" . $currentImage);
        }
    }

    $sqlUpdate = "UPDATE investing_styles SET image = ?, name = ?, title = ?, description = ? WHERE id = ?";
    $values = [
        $image_name,
        $_POST['newinvestingName'],
        $_POST['newinvestingTitle'],
        $_POST['newinvestingDescription'],
        $id,
    ];

    $result = update($sqlUpdate, $values, 'ssssi');

    echo $result ? 1 : 0;
}


if (isset($_POST['why_choose_midcap'])) {

    $sqlInsert = "INSERT INTO why_midcap (title) VALUES (?)";
    $values = [$_POST['why_choose_midcap']];
    $result = insert($sqlInsert, $values, 's');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['load_why_choose_midcap'])) {
    $result = selectalldata(tablename: 'why_midcap');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[title]</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 How_it_workEditById' data-bs-toggle='modal' data-id='$row[id]' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger How_it_workDeleteById' data-id='$row[id]' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}


if (isset($_POST['deletewhy_choose_midcap'])) {
    $sql = "DELETE FROM `why_midcap` WHERE id = ?";
    $val = [$_POST['deletewhy_choose_midcap']];
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadwhy_choose_midcap'])) {

    $sql = "SELECT * FROM `why_midcap` WHERE id = ?";
    $val = [$_POST['loadwhy_choose_midcap']];
    $result = select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $row = json_encode($row);
        echo $row;
    }
}

if (isset($_POST['newwhy_choose_midcap'])) {

    $id = $_POST['why_choose_midcapEditId'];

    $sqlUpdate = "UPDATE why_midcap SET title = ? WHERE id = ?";
    $values = [$_POST['newwhy_choose_midcap'], $id];
    $param_types = 'si';

    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['load_why_choose_midcap_data'])) {
    $query = "SELECT id, title FROM why_midcap"; // Adjust table and column names as needed
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<option value="" selected disabled >-- Select a Question --</option>'; // Default option
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</option>';
        }
    } else {
        echo '<option value="">No questions available</option>';
    }
    exit;
}

if (isset($_POST['midcap_questionId'])) {

    // Prepare SQL statement
    $sqlInsert = "INSERT INTO midcap_answer (question_id , title , answer ) VALUES ( ? , ? , ?)";

    $values = [
        $_POST['midcap_questionId'],
        $_POST['midcap_questionTitle'],
        $_POST['midcap_questionAnswer']
    ];

    $result = insert($sqlInsert, $values, 'sss');

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['why_choose_midcap_loadAllData'])) {
    // Ensure the connection variable is initialized and valid
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to fetch data with JOIN
    $query = "SELECT 
    midcap_answer.id AS answerId, 
    why_midcap.title AS questionTitle, 
    midcap_answer.answer AS answerText, 
    midcap_answer.title AS answerTitle
FROM 
    midcap_answer 
JOIN 
    why_midcap 
ON 
    midcap_answer.question_id = why_midcap.id;
";

    $result = mysqli_query($conn, $query);

    // Check if the query ran successfully
    if (!$result) {
        echo "<tr><td colspan='7' class='text-center'>Error fetching data: " . mysqli_error($conn) . "</td></tr>";
        exit;
    }

    // Check if there are rows in the result
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>{$row['questionTitle']}</td>
                <td>{$row['answerTitle']}</td>
                <td>{$row['answerText']}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary me-1 allDataEditById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['answerId']}' 
                        data-bs-target='#newModel'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-danger allDataDeleteById' 
                        data-id='{$row['answerId']}' 
                       >
                        <i class='bx bx-trash fs-16'></i>
                    </button>
                </td>
            </tr>";
            $sr++;
        }
    } else {
        // If no data is found, show a message
        echo "<tr><td colspan='7' class='text-center'>No data found.</td></tr>";
    }
}

if (isset($_POST['why_choose_midcap_deleteallData'])) {
    $sql = "DELETE FROM `midcap_answer` WHERE id = ?";
    $val = [$_POST['why_choose_midcap_deleteallData']];
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}


if (isset($_POST['why_choose_midcap_loadallDataEditForm'])) {
    $sql = "SELECT * FROM `midcap_answer` WHERE id = ?";
    $val = [$_POST['why_choose_midcap_loadallDataEditForm']];
    $result =  select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $row = json_encode($row);
        echo $row;
    }
}



if (isset($_POST['newwhy_choose_midcapquestionId'])) {

    // Get the blog ID from the hidden field
    $id = $_POST['why_choose_midcap_id'];

    $sqlUpdate = "UPDATE `midcap_answer` 
                          SET 
                            `question_id` = ?, 
                            `title` = ?, 
                            `answer` = ?
                          WHERE `id` = ?";
    $values = [
        $_POST['newwhy_choose_midcapquestionId'],
        $_POST['newwhy_choose_midcapquestionTitle'],
        $_POST['newwhy_choose_midcapquestionAnswer'],
        $id
    ];
    $param_types = 'ssss'; // Correct number of placeholders for all fields


    // Execute the database update query
    $result = update($sqlUpdate, $values, $param_types);

    // Return the result of the update
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}


// Add video logic
if (isset($_FILES['myVideo'])) {
    // Handle video file upload

    // echo "varshit video";
    $video_name = rand() . rand() . basename($_FILES["myVideo"]["name"]);
    $target_path = "uploads/videos/" . $video_name;

    // Insert video data into database
    $sqlInsert = "INSERT INTO videos (video_path) VALUES (?)";
    $values = [$video_name];
    $result = insert($sqlInsert, $values, 's'); // Assuming `insert()` is a custom function for database insertions

    if ($result) {
        move_uploaded_file($_FILES["myVideo"]["tmp_name"], $target_path);
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
} elseif (isset($_POST['myURL'])) {


    // echo "varshit url";
    // Handle URL input
    $video_url = $_POST['myURL'];

    // Insert video URL into database
    $sqlInsert = "INSERT INTO videos (video_url) VALUES (?)";
    $values = [$video_url];
    $result = insert($sqlInsert, $values, 's'); // Assuming `insert()` is a custom function for database insertions

    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

// Load all videos
if (isset($_POST['loadmyData'])) {
    // Fetch all data from the 'videos' table
    $result = selectalldata('videos'); // Assuming `selectalldata()` is a custom function

    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        $sr = 1; // Serial number
        while ($row = mysqli_fetch_assoc($result)) {
            // Escape data to prevent potential XSS attacks
            $videoPath = htmlspecialchars($row['video_path'], ENT_QUOTES, 'UTF-8');
            $videoURL = htmlspecialchars($row['video_url'], ENT_QUOTES, 'UTF-8');
            $videoId = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');

            echo "<tr>
                <td>{$sr}</td>
                <td>";

            // Check if video_path exists, otherwise use video_url
            if (!empty($videoPath)) {
                // If there is a video path, display it as a video
                echo "<video width='200' height='200' controls>
                        <source src='uploads/videos/{$videoPath}' type='video/mp4'>
                        Your browser does not support the video tag.
                      </video>";
            } elseif (!empty($videoURL)) {
                // If there is a video URL, extract the YouTube video ID and embed it
                preg_match('/(?:https?:\/\/(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|\S+?v=|(?:v|e(?:mbed)?)\/))([a-zA-Z0-9_-]{11})/', $videoURL, $matches);
                $youtubeVideoId = $matches[1] ?? ''; // Get the video ID from the URL

                if ($youtubeVideoId) {
                    echo "<iframe width='200' height='200' 
                            src='https://www.youtube.com/embed/{$youtubeVideoId}' 
                            frameborder='0' 
                            allow='autoplay; encrypted-media' 
                            allowfullscreen>
                          </iframe>";
                } else {
                    echo "Invalid YouTube URL.";
                }
            } else {
                echo "No video available.";
            }

            echo "</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-danger myDeleteById' 
                        data-id='{$videoId}' 
                        data-deletevideo='{$videoPath}' 
                        data-deleteurl='{$videoURL}'>
                        <i class='bx bx-trash fs-16'></i> 
                    </button>
                </td>
            </tr>";
            $sr++;
        }
    } else {
        // No data found
        echo "<tr><td colspan='3'>No videos found.</td></tr>";
    }
}



if (isset($_POST['deletemyById'])) {
    $videoId = $_POST['deletemyById'];
    $videoPath = $_POST['deletemyVideo'] ?? null; // Video file path
    $videoUrl = $_POST['deletemyVideoUrl'] ?? null; // Video URL

    // Validate video ID
    if (!empty($videoId) && is_numeric($videoId)) {
        // First, retrieve the video data to check if the path or URL exists
        $sql = "SELECT video_path, video_url FROM `videos` WHERE id = ?";
        $val = [$videoId];
        $result = select($sql, $val, 'i'); // Assuming `select()` is a custom function to fetch data

        if ($result) {
            $videoData = mysqli_fetch_assoc($result);

            // If there is a video path (file), delete the file from the server
            if ($videoData['video_path']) {
                $filePath = 'uploads/videos/' . $videoData['video_path'];
                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file from the server
                }
            }

            // If there is a video URL, remove the URL from the database
            if ($videoData['video_url']) {
                $sqlUpdateUrl = "UPDATE `videos` SET video_url = NULL WHERE id = ?";
                $updateVal = [$videoId];
                delete($sqlUpdateUrl, $updateVal, 'i'); // Assuming `delete()` handles updates too
            }

            // Now delete the row from the database
            $sqlDelete = "DELETE FROM `videos` WHERE id = ?";
            $deleteVal = [$videoId];
            $deleteResult = delete($sqlDelete, $deleteVal, 'i');

            if ($deleteResult) {
                echo 1; // Success
            } else {
                echo 0; // Failure to delete from database
            }
        } else {
            echo "Video not found."; // If the video does not exist
        }
    } else {
        echo "Invalid ID provided."; // Invalid ID
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


if (isset($_POST['serviceDescription'])) {

    // var_dump($_POST);
    // exit();

    // Sanitize the input to prevent SQL injection
    $serviceDescription = mysqli_real_escape_string($conn, $_POST['serviceDescription']);

    // SQL query to update about details
    $sqlUpdate = "UPDATE `about` SET  `service_description` = ?  WHERE `id` = 1";

    // Prepare the statement
    if ($stmt = $conn->prepare($sqlUpdate)) {
        // Bind parameters
        $stmt->bind_param("s", $serviceDescription);

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


if (isset($_POST['serviceName'])) {
    // Sanitize input to prevent SQL injection
    $serviceName = mysqli_real_escape_string($conn, $_POST['serviceName']);
    $serviceActive = mysqli_real_escape_string($conn, $_POST['srviceActive']);

    // SQL query to insert service details
    $sqlInsert = "INSERT INTO `service` (`servicename`, `serviceactive`) VALUES (?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sqlInsert)) {
        // Bind parameters (servicename, serviceactive)
        $stmt->bind_param("ss", $serviceName, $serviceActive);

        // Execute the query
        if ($stmt->execute()) {
            echo  1;
        } else {
            echo 0;
        }
    } else {
        echo  0;
    }
}

if (isset($_POST['loadExclusiveServicesDataSubmit'])) {
    $result = selectalldata('service');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>$row[servicename]</td>
                <td>$row[serviceactive]</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary me-1 ExclusiveServicesById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['id']}' 
                        data-bs-target='#Model'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
                <td><button type='button' class='btn btn-sm btn-soft-danger seviceDeleteById' data-id='$row[id]' ' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>
           ";
            $sr++;
        }
    }
}


if (isset($_POST['deleteServiceById'])) {
    $sql = "DELETE FROM `service` WHERE id = ?";
    $val = [$_POST['deleteServiceById']];
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadExclusiveServicesEditForm'])) {
    $sql = "SELECT * FROM service WHERE id = ?";
    $result = select($sql, [$_POST['loadExclusiveServicesEditForm']], 'i');

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}


if (isset($_POST['New_Service_EditId'])) {

    $id = $_POST['New_Service_EditId'];

    $sqlUpdate = "UPDATE service SET  servicename = ? , serviceactive = ?  WHERE id = ?";
    $values = [$_POST['new_service_name'], $_POST['new_service_active'], $id];
    $param_types = 'sss'; // Three placeholders for title, text, and id


    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['loadWebsites'])) {
    $query = "SELECT * FROM `websites` ";
    $result = $conn->query($query);
    $sr = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>$sr</td>
            <td>{$row['name']}</td>
            <td><a href='{$row['link']}' target='_blank'>{$row['link']}</a></td>
            <td>{$row['description']}</td>
             <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary me-1 websiteEditById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['id']}' 
                        data-bs-target='#websiteModel'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
            <td><button type='button' class='btn btn-sm btn-soft-danger websiteDeleteById' data-id='$row[id]' ' id='sweetalert-params'><i class='bx bx-trash fs-16'></i></button></td>
        </tr>";
        $sr++;
    }
}

if (isset($_POST['websitename'])) {
    $name = $conn->real_escape_string($_POST['websitename']);
    $link = $conn->real_escape_string($_POST['websitelink']);
    $description = $conn->real_escape_string($_POST['website_description']);

    $query = "INSERT INTO `websites` (`name`, `link`, `description`) VALUES ('$name', '$link', '$description')";
    echo $conn->query($query) ? 1 : 0;
    exit;
}

if (isset($_POST['deleteWebsiteById'])) {
    $id = (int)$_POST['deleteWebsiteById'];
    $query = "DELETE FROM `websites` WHERE `id` = $id";
    echo $conn->query($query) ? 1 : 0;
    exit;
}

if (isset($_POST['loadWebsiteEditForm'])) {
    $id = (int)$_POST['loadWebsiteEditForm'];
    $query = "SELECT * FROM `websites` WHERE `id` = $id";
    $result = $conn->query($query);
    echo json_encode($result->fetch_assoc());
    exit;
}

if (isset($_POST['newwebsitename'])) {
    $id = (int)$_POST['New_Website_EditId'];
    $name = $conn->real_escape_string($_POST['newwebsitename']);
    $link = $conn->real_escape_string($_POST['newwebsitelink']);
    $description = $conn->real_escape_string($_POST['new_website_description']);

    $query = "UPDATE `websites` SET `name` = '$name', `link` = '$link', `description` = '$description' WHERE `id` = $id";
    echo $conn->query($query) ? 1 : 0;
    exit;
}


if (isset($_POST['loadDifferent'])) {
    $result = $conn->query("SELECT * FROM different_from_others ");
    $sr = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    <td>$sr</td>
                    <td>{$row['title']}</td>
                    <td>{$row['description']}</td>
                    <td><button class='btn btn-primary differentEditById' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#diffrectModel'>Edit</button></td>
                    <td><button class='btn btn-danger differentDeleteById' data-id='{$row['id']}'>Delete</button></td>
                  </tr>";
                  $sr++;
    }
}

if (isset($_POST['diffrent_title'])) {
    $title = $conn->real_escape_string($_POST['diffrent_title']);
    $description = $conn->real_escape_string($_POST['diffrent_description']);
    echo $conn->query("INSERT INTO different_from_others (title, description) VALUES ('$title', '$description')") ? 1 : 0;
}

if (isset($_POST['deleteDifferentById'])) {
    $id = $conn->real_escape_string($_POST['deleteDifferentById']);
    echo $conn->query("DELETE FROM different_from_others WHERE id = $id") ? 1 : 0;
}

if (isset($_POST['loadDifferentEditForm'])) {
    $id = $conn->real_escape_string($_POST['loadDifferentEditForm']);
    $result = $conn->query("SELECT * FROM different_from_others WHERE id = $id");
    echo json_encode($result->fetch_assoc());
}

if (isset($_POST['new_diffrent_title'])) {
    $id = $conn->real_escape_string($_POST['New_Diffrent_EditId']);
    $title = $conn->real_escape_string($_POST['new_diffrent_title']);
    $description = $conn->real_escape_string($_POST['new_diffrent_description']);
    echo $conn->query("UPDATE different_from_others SET title = '$title', description = '$description' WHERE id = $id") ? 1 : 0;
}

if (isset($_POST['loadPlans'])) {
    $result = $conn->query("SELECT * FROM subscription_plans  ");
    $sr = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>$sr</td>
            <td>{$row['plan_name']}</td>
            <td>{$row['duration']}</td>
            <td>₹{$row['original_price']}</td>
            <td>{$row['discount_percentage']}%</td>
            <td>₹{$row['final_price']}</td>
            <td>{$row['offer_message']}</td>
            <td><button class='btn btn-primary editPlanBtn' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#editPlanModal'>Edit</button></td>
            <td><button class='btn btn-danger deletePlanBtn' data-id='{$row['id']}'>Delete</button></td>
        </tr>";
        $sr++;
    }
}

if (isset($_POST['plan_name'])) {
    $plan_name = $conn->real_escape_string($_POST['plan_name']);
    $duration = $conn->real_escape_string($_POST['duration']);
    $original_price = $conn->real_escape_string($_POST['original_price']);
    $discount_percentage = $conn->real_escape_string($_POST['discount_percentage']);
    $final_price = $conn->real_escape_string($_POST['final_price']);
    $offer_message = $conn->real_escape_string($_POST['offer_message']);

    echo $conn->query("INSERT INTO subscription_plans (plan_name, duration, original_price, discount_percentage, final_price, offer_message) 
    VALUES ('$plan_name', '$duration', '$original_price', '$discount_percentage', '$final_price', '$offer_message')") ? 1 : 0;
}

if (isset($_POST['deletePlanById'])) {
    $id = $conn->real_escape_string($_POST['deletePlanById']);
    echo $conn->query("DELETE FROM subscription_plans WHERE id = $id") ? 1 : 0;
}

if (isset($_POST['loadEditPlanForm'])) {
    $id = $conn->real_escape_string($_POST['loadEditPlanForm']);
    $result = $conn->query("SELECT * FROM subscription_plans WHERE id = $id");
    echo json_encode($result->fetch_assoc());
}

if (isset($_POST['new_plan_name'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $plan_name = $conn->real_escape_string($_POST['new_plan_name']);
    $duration = $conn->real_escape_string($_POST['new_duration']);
    $original_price = $conn->real_escape_string($_POST['new_original_price']);
    $discount_percentage = $conn->real_escape_string($_POST['new_discount_percentage']);
    $final_price = $conn->real_escape_string($_POST['new_final_price']);
    $offer_message = $conn->real_escape_string($_POST['new_offer_message']);

    echo $conn->query("UPDATE subscription_plans SET 
        plan_name = '$plan_name',
        duration = '$duration',
        original_price = '$original_price',
        discount_percentage = '$discount_percentage',
        final_price = '$final_price',
        offer_message = '$offer_message'
        WHERE id = $id") ? 1 : 0;
}

// Load all questions
if (isset($_POST['loadQuestions'])) {
    $result = $conn->query("SELECT * FROM do_not_miss_questions ");
    $sr = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>$sr</td>
            <td>{$row['question']}</td>
            <td><button class='btn btn-primary editQuestionBtn' data-id='{$row['id']}' data-question='{$row['question']}'>Edit</button></td>
            <td><button class='btn btn-danger deleteQuestionBtn' data-id='{$row['id']}'>Delete</button></td>
        </tr>";
        $sr++;
    }
}

// Add a new question
if (isset($_POST['donot_miss_question'])) {
    $question = $conn->real_escape_string($_POST['donot_miss_question']);
    echo $conn->query("INSERT INTO do_not_miss_questions (question) VALUES ('$question')") ? 1 : 0;
}

// Delete a question
if (isset($_POST['deleteQuestionById'])) {
    $id = $conn->real_escape_string($_POST['deleteQuestionById']);
    echo $conn->query("DELETE FROM do_not_miss_questions WHERE id = $id") ? 1 : 0;
}

// Edit a question
if (isset($_POST['editQuestionById']) && isset($_POST['updatedQuestion'])) {
    $id = $conn->real_escape_string($_POST['editQuestionById']);
    $updatedQuestion = $conn->real_escape_string($_POST['updatedQuestion']);
    echo $conn->query("UPDATE do_not_miss_questions SET question = '$updatedQuestion' WHERE id = $id") ? 1 : 0;
}

if (isset($_POST['loaddonotmissAnswers'])) {
    $query = "
        SELECT 
            a.id, 
            q.question AS full_question, 
            a.image, 
            a.title, 
            a.answer 
        FROM 
            do_not_miss_answers a
        JOIN 
            do_not_miss_questions q 
        ON 
            a.question_id = q.id";

    $result = $conn->query($query);
    $sr = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>$sr</td>
            <td>{$row['full_question']}</td>
            <td><img src='uploads/{$row['image']}' alt='Image' style='width: 50px; height: auto;'></td>
            <td>{$row['title']}</td>
            <td>{$row['answer']}</td>
            <td><button class='btn btn-danger deleteAnswerBtn' data-id='{$row['id']}'>Delete</button></td>
        </tr>";
        $sr++;
    }
}


if (isset($_FILES['donotmissquestionImage'])) {
    $questionId = $conn->real_escape_string($_POST['donotmissquestionId']);
    $title = $conn->real_escape_string($_POST['donotmissquestionTitle']);
    $answer = $conn->real_escape_string($_POST['donotmissquestionAnswer']);

    $imageName = time() . '_' . $_FILES['donotmissquestionImage']['name'];
    $imagePath = 'uploads/' . $imageName;

    if (move_uploaded_file($_FILES['donotmissquestionImage']['tmp_name'], $imagePath)) {
        echo $conn->query("INSERT INTO do_not_miss_answers (question_id, image, title, answer) VALUES ('$questionId', '$imageName', '$title', '$answer')") ? 1 : 0;
    } else {
        echo 0;
    }
}

if (isset($_POST['deleteAnswerById'])) {
    $id = $conn->real_escape_string($_POST['deleteAnswerById']);
    echo $conn->query("DELETE FROM do_not_miss_answers WHERE id = $id") ? 1 : 0;
}

if (isset($_POST['editAnswerById'])) {
    $id = $conn->real_escape_string($_POST['editAnswerById']);
    $questionId = $conn->real_escape_string($_POST['newdonotmissquestionId']);
    $title = $conn->real_escape_string($_POST['newdonotmissquestionTitle']);
    $answer = $conn->real_escape_string($_POST['newdonotmissquestionAnswer']);

    if (!empty($_FILES['newdonotmissImage']['name'])) {
        $imageName = time() . '_' . $_FILES['newdonotmissImage']['name'];
        $imagePath = 'uploads/' . $imageName;

        if (move_uploaded_file($_FILES['newdonotmissImage']['tmp_name'], $imagePath)) {
            $updateQuery = "UPDATE do_not_miss_answers SET question_id = '$questionId', image = '$imageName', title = '$title', answer = '$answer' WHERE id = $id";
        }
    } else {
        $updateQuery = "UPDATE do_not_miss_answers SET question_id = '$questionId', title = '$title', answer = '$answer' WHERE id = $id";
    }

    echo $conn->query($updateQuery) ? 1 : 0;
}

if (isset($_POST['loadDonotQuestionsDropdown'])) {
    $query = "SELECT id, question FROM do_not_miss_questions"; // Adjust table and column names as needed
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<option value="" selected disabled >-- Select a Question --</option>'; // Default option
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['question']) . '</option>';
        }
    } else {
        echo '<option value="">No questions available</option>';
    }
    exit;
}

if(isset($_POST['Extra_Addition_Title'])){

    $title = $_POST['Extra_Addition_Title'] ?? '';
    $subtitle = $_POST['Extra_Addition_Subtitle'] ?? '';
    $mainText = $_POST['main_text'] ?? '';
    $extraText = $_POST['extra_text'] ?? '';

    // Prepare and execute query
    $stmt = $conn->prepare("INSERT INTO extrasections (title, subtitle, main_text, extra_text) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $title, $subtitle, $mainText, $extraText);

    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }

}


// Load all questions
if (isset($_POST['loadExtraAddition'])) {
    $result = $conn->query("SELECT * FROM extrasections ");
    $sr = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>$sr</td>
            <td>{$row['title']}</td>
            <td>{$row['subtitle']}</td>
            <td>{$row['main_text']}</td>
            <td>{$row['extra_text']}</td>
            <td>
                <button class='btn btn-primary editExtraAdditionBtn' data-bs-toggle='modal' data-bs-target='#ExtraModel' data-id='{$row['id']}'>Edit</button>
            </td>
            <td><button class='btn btn-danger deleteExtraAdditionBtn' data-id='{$row['id']}'>Delete</button></td>
        </tr>";
        $sr++;
    }
  
}


// Delete a question
if (isset($_POST['deleteExtraAdditionId'])) {
    $id = $conn->real_escape_string($_POST['deleteExtraAdditionId']);
    echo $conn->query("DELETE FROM extrasections WHERE id = $id") ? 1 : 0;
}


if (isset($_POST['editExtraAdditionBtn'])) {
    $id = $conn->real_escape_string($_POST['editExtraAdditionBtn']);
    $result = $conn->query("SELECT * FROM extrasections WHERE id = $id");
    echo json_encode($result->fetch_assoc());
}

if (isset($_POST['new_Extra_Addition_Title'])) {
    # code...

    $id = $_POST['Extra_Addition_EditId'];
    $title = $_POST['new_Extra_Addition_Title'] ?? '';
    $subtitle = $_POST['new_Extra_Addition_Subtitle'] ?? '';
    $mainText = $_POST['new_main_text'] ?? '';
    $extraText = $_POST['new_extra_text'] ?? '';

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE extrasections SET title = ?, subtitle = ?, main_text = ?, extra_text = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $title, $subtitle, $mainText, $extraText, $id);

    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo 0; // Failure
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
if (isset($_POST['homeTitle'])) {
    $homeTitle = $_POST['homeTitle'];
    $homeDiscpction = $_POST['homeDiscpction'];
    $homeImageTitle = $_POST['homeImageTitle'];

    // Handling file upload
    $uploadDir = "uploads/"; // Change this to your desired upload directory
    $homePageImage = null;

    if (!empty($_FILES['homePageImage']['name'])) {
        $fileName = basename($_FILES['homePageImage']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Check and move the uploaded file
        if (move_uploaded_file($_FILES['homePageImage']['tmp_name'], $targetFilePath)) {
            $homePageImage = $targetFilePath;
        }
    }

    // Update query
    if ($homePageImage) {
        $sql = "UPDATE homepage_data SET title = ?, description = ?, image_title = ?, image_path = ? WHERE id = ?";
        $params = [$homeTitle, $homeDiscpction, $homeImageTitle, $homePageImage, 1 ];
        $paramTypes = 'ssssi'; // 'ssssi' for string, string, string, string, integer
    } else {
        $sql = "UPDATE homepage_data SET title = ?, description = ?, image_title = ? WHERE id = ?";
        $params = [$homeTitle, $homeDiscpction, $homeImageTitle,  1 ];
        $paramTypes = 'sssi'; // 'sssi' for string, string, string, integer
    }

    $result = update($sql, $params, $paramTypes); // Assuming `update` is your function for executing update queries
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}
// Insert a new "Must Read" record
if (isset($_POST['_must_read_Title'])) {
    $title = $_POST['_must_read_Title'];
    $description = $_POST['_must_read_Description'];
    
    $sql = "INSERT INTO must_read (title, description) VALUES (?, ?)";
    $params = [$title, $description];
    
    $result = insert($sql, $params, 'ss');
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

// Load all "Must Read" data
if (isset($_POST['load_must_read_Data'])) {
    $result = selectalldata('must_read');
    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td><button type='button' class='btn btn-sm btn-soft-secondary me-1 _must_read_EditById' data-bs-toggle='modal' data-id='{$row['id']}' data-bs-target='#Model'><i class='bx bx-edit fs-16'></i></button></td>
                <td><button type='button' class='btn btn-sm btn-soft-danger _must_read_DeleteById' data-id='{$row['id']}'><i class='bx bx-trash fs-16'></i></button></td>
            </tr>";
            $sr++;
        }
    }
}

// Delete a "Must Read" record by ID
if (isset($_POST['delete_must_read_ById'])) {
    $sql = "DELETE FROM must_read WHERE id = ?";
    $val = [$_POST['delete_must_read_ById']];
    
    $result = delete($sql, $val, 'i');
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
}

// Load a specific "Must Read" record for editing
if (isset($_POST['load_must_read_EditForm'])) {
    $sql = "SELECT * FROM must_read WHERE id = ?";
    $val = [$_POST['load_must_read_EditForm']];
    
    $result = select($sql, $val, 'i');
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

// Update a "Must Read" record
if (isset($_POST['new_must_read_Title'])) {
    $id = $_POST['_must_read_EditId'];
    $title = $_POST['new_must_read_Title'];
    $description = $_POST['new_must_read_Description'];

    $sqlUpdate = "UPDATE must_read SET title = ?, description = ? WHERE id = ?";
    $values = [$title, $description, $id];
    $param_types = 'ssi';
    
    $result = update($sqlUpdate, $values, $param_types);
    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
} 

// Add new exclusive offer
if (isset($_POST['Exclusive_offers_Title'])) {
    $title = $_POST['Exclusive_offers_Title'] ?? '';
    $subtitle = $_POST['Exclusive_offers_Subtitle'] ?? '';
    $mainText = $_POST['main_text'] ?? '';
    $extraText = $_POST['extra_text'] ?? '';

    $stmt = $conn->prepare("INSERT INTO exclusive_offers (title, subtitle, main_text, extra_text) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $title, $subtitle, $mainText, $extraText);

    echo $stmt->execute() ? 1 : 0;
}

// Load all exclusive offers
if (isset($_POST['loadExclusiveoffers'])) {
    $result = $conn->query("SELECT * FROM exclusive_offers  ");
    $sr = 1;

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$sr}</td>
            <td>{$row['title']}</td>
            <td>{$row['subtitle']}</td>
            <td>{$row['main_text']}</td>
            <td>{$row['extra_text']}</td>
            <td>
                <button class='btn btn-primary editExclusiveoffersBtn' data-id='{$row['id']}'>Edit</button>
            </td>
            <td>
                <button class='btn btn-danger deleteExclusiveoffersBtn' data-id='{$row['id']}'>Delete</button>
            </td>
        </tr>";
        $sr++;
    }
}

// Delete an exclusive offer
if (isset($_POST['deleteExclusiveoffersId'])) {
    $id = $conn->real_escape_string($_POST['deleteExclusiveoffersId']);
    echo $conn->query("DELETE FROM exclusive_offers WHERE id = $id") ? 1 : 0;
}

// Fetch data for editing
if (isset($_POST['editExclusiveoffersBtn'])) {
    $id = $conn->real_escape_string($_POST['editExclusiveoffersBtn']);
    $result = $conn->query("SELECT * FROM exclusive_offers WHERE id = $id");
    echo json_encode($result->fetch_assoc());
}

// Update an exclusive offer
if (isset($_POST['new_Exclusive_offers_Title'])) {
    $id = $_POST['Exclusive_offers_EditId'];
    $title = $_POST['new_Exclusive_offers_Title'] ?? '';
    $subtitle = $_POST['new_Exclusive_offers_Subtitle'] ?? '';
    $mainText = $_POST['new_main_text'] ?? '';
    $extraText = $_POST['new_extra_text'] ?? '';

    $stmt = $conn->prepare("UPDATE exclusive_offers SET title = ?, subtitle = ?, main_text = ?, extra_text = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $title, $subtitle, $mainText, $extraText, $id);

    echo $stmt->execute() ? 1 : 0;
}
// Add category
if (isset($_POST['Category_Name'])) {
    $category_name = $conn->real_escape_string($_POST['Category_Name']);
    $query = "INSERT INTO categories (name) VALUES ('$category_name')";

    echo $conn->query($query) ? 1 : 0;
}

// Load categories for table
if (isset($_POST['loadnewsletterData'])) {
    $query = "SELECT * FROM categories ";
    $result = $conn->query($query);
    $output = '';

    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>
                            <th scope='row'>{$i}</th>
                            <td>{$row['name']}</td>
                            <td><button class='btn btn-danger newsletterDeleteById' data-id='{$row['id']}'>Delete</button></td>
                        </tr>";
            $i++;
        }
    } else {
        $output = "<tr><td align='center' colspan='4'>No categories found</td></tr>";
    }

    echo $output;
}

// Delete category
if (isset($_POST['deletenewsletterById'])) {
    $id = $conn->real_escape_string($_POST['deletenewsletterById']);
    $query = "DELETE FROM categories WHERE id = $id";

    echo $conn->query($query) ? 1 : 0;
}

// Load category for editing
if (isset($_POST['loadnewsletterEditForm'])) {
    $id = $conn->real_escape_string($_POST['loadnewsletterEditForm']);
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = $conn->query($query);

    echo $result->num_rows > 0 ? json_encode($result->fetch_assoc()) : 0;
}

// Update category
if (isset($_POST['newnewsletterTitle'])) {
    $id = $conn->real_escape_string($_POST['newsletterEditId']);
    $title = $conn->real_escape_string($_POST['newnewsletterTitle']);
    $query = "UPDATE categories SET name = '$title' WHERE id = $id";

    echo $conn->query($query) ? 1 : 0;
}

// Load categories for dropdown
if (isset($_POST['loadcategorysDropdown'])) {
    $query = "SELECT * FROM categories ";
    $result = $conn->query($query);
    $output = "<option value='' disabled selected>Select a category</option>";

    while ($row = $result->fetch_assoc()) {
        $output .= "<option value='{$row['id']}'>{$row['name']}</option>";
    }

    echo $output;
}

// Add data with category
if (isset($_POST['categoryTitle'])) {
    $categoryId = $conn->real_escape_string($_POST['categoryId']);
    $title = $conn->real_escape_string($_POST['categoryTitle']);
    $data = $conn->real_escape_string($_POST['categorydata']);

    // Handle image upload
    $imageName = '';
    if (isset($_FILES['categoryImage']['name']) && $_FILES['categoryImage']['name'] != '') {
        $imageName = time() . '_' . $_FILES['categoryImage']['name'];
        move_uploaded_file($_FILES['categoryImage']['tmp_name'], "uploads/$imageName");
    }

    $query = "INSERT INTO category_data (category_id, title, data, image) VALUES ($categoryId, '$title', '$data', '$imageName')";

    echo $conn->query($query) ? 1 : 0;
}

// Load all data
if (isset($_POST['loadallnewsData'])) {
    $query = "SELECT cd.*, c.name AS category_name FROM category_data cd INNER JOIN categories c ON cd.category_id = c.id ";
    $result = $conn->query($query);
    $output = '';

    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $pdf =  urlencode($row['image']); 
            $output .= "<tr>
                            <th scope='row'>{$i}</th>
                            <td>{$row['category_name']}</td>
                            <td>
                                <!-- Assuming the 'image' field is actually storing the PDF file name -->
                                <a href='uploads/$pdf' target='_blank'>
                                    <button  class='btn btn-info' type='button'>Open</button>
                                </a>
                            </td>
                            <td>{$row['title']}</td>
                            <td>{$row['data']}</td>
                            <td><button class='btn btn-danger allnewsDataDeleteById' data-id='{$row['id']}' data-deleteimg='{$row['image']}'>Delete</button></td>
                        </tr>";
            $i++;
        }
    } else {
        $output = "<tr><td align='center' colspan='7'>No data found</td></tr>";
    }

    echo $output;
}

// Delete data
if (isset($_POST['deleteallnewsDataById'])) {
    $id = $conn->real_escape_string($_POST['deleteallnewsDataById']);
    $image = $conn->real_escape_string($_POST['deleteallnewsDataImg']);

    // Delete image from server
    if ($image && file_exists("uploads/$image")) {
        unlink("uploads/$image");
    }

    $query = "DELETE FROM category_data WHERE id = $id";

    echo $conn->query($query) ? 1 : 0;
}

// Load data for editing
if (isset($_POST['loadallnewsDataEditForm'])) {
    $id = $conn->real_escape_string($_POST['loadallnewsDataEditForm']);
    $query = "SELECT * FROM category_data WHERE id = $id";
    $result = $conn->query($query);

    echo $result->num_rows > 0 ? json_encode($result->fetch_assoc()) : 0;
}

// Update data
if (isset($_POST['newcategoryTitle'])) {
    $id = $conn->real_escape_string($_POST['categorys_with_datas']);
    $categoryId = $conn->real_escape_string($_POST['newcategoryId']);
    $title = $conn->real_escape_string($_POST['newcategoryTitle']);
    $data = $conn->real_escape_string($_POST['newcategorydata']);

    // Handle new image upload
    $imageName = '';
    if (isset($_FILES['newinvestingImage']['name']) && $_FILES['newinvestingImage']['name'] != '') {
        $imageName = time() . '_' . $_FILES['newinvestingImage']['name'];
        move_uploaded_file($_FILES['newinvestingImage']['tmp_name'], "uploads/$imageName");

        // Delete old image
        $query = "SELECT image FROM category_data WHERE id = $id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $oldImage = $result->fetch_assoc()['image'];
            if ($oldImage && file_exists("uploads/$oldImage")) {
                unlink("uploads/$oldImage");
            }
        }

        $query = "UPDATE category_data SET category_id = $categoryId, title = '$title', data = '$data', image = '$imageName' WHERE id = $id";
    } else {
        $query = "UPDATE category_data SET category_id = $categoryId, title = '$title', data = '$data' WHERE id = $id";
    }

    echo $conn->query($query) ? 1 : 0;
}

// Load all e-books
if (isset($_POST['loadebooks'])) {
    $query = "SELECT * FROM ebooks  ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>$sr</td>
                    <td><img src='uploads/{$row['ebook_image']}' alt='e-Book Image' style='width: 50px; height: 50px;'></td>
                    <td><a href='uploads/{$row['ebook_pdf']}' target='_blank'>View PDF</a></td>
                    <td><button class='btn btn-danger deleteebookBtn' data-id='{$row['id']}'>Delete</button></td>
                </tr>
            ";
            $sr++;
        }
    } else {
        echo "<tr><td colspan='4'>No e-Books found.</td></tr>";
    }
}

// Add a new e-book
if (isset($_FILES['ebook_image']) && isset($_FILES['ebook_pdf'])) {
    $image_name = basename($_FILES['ebook_image']['name']);
    $pdf_name = basename($_FILES['ebook_pdf']['name']);
    $image_path = "uploads/" . $image_name;
    $pdf_path = "uploads/" . $pdf_name;

    if (move_uploaded_file($_FILES['ebook_image']['tmp_name'], $image_path) &&
        move_uploaded_file($_FILES['ebook_pdf']['tmp_name'], $pdf_path)) {
        $query = "INSERT INTO ebooks (ebook_image, ebook_pdf) VALUES ('$image_name', '$pdf_name')";
        echo mysqli_query($conn, $query) ? 1 : 0;
    } else {
        echo 0;
    }
}

// Delete an e-book
if (isset($_POST['deleteebookById'])) {
    $id = intval($_POST['deleteebookById']);
    $query = "DELETE FROM ebooks WHERE id = $id";
    echo mysqli_query($conn, $query) ? 1 : 0;
}


if (isset($_POST['facebooklink'])) {
   

    $facebooklink = $conn->real_escape_string($_POST['facebooklink']);
    $instagramlink = $conn->real_escape_string($_POST['instagramlink']);
    $youtubelink = $conn->real_escape_string($_POST['youtubelink']);
    $whatsappnumber = $conn->real_escape_string($_POST['whatsappnumber']);

    $sql = "UPDATE important_links SET 
            facebook_link = '$facebooklink', 
            telegram_link = '$instagramlink', 
            youtube_link = '$youtubelink', 
            whatsapp_number = '$whatsappnumber' 
            WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo 1;
    } else {
        echo 0;
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

// Add Home Slider
if (isset($_POST['home_slider_Name'])) {
    $image_name = rand() . rand() . basename($_FILES["home_slider_Image"]["name"]);

    $sqlInsert = "INSERT INTO home_slider (image, name, title, description) VALUES (?, ?, ?, ?)";
    $values = [
        $image_name,
        $_POST['home_slider_Name'], // New Name field
        $_POST['home_slider_Title'],
        $_POST['home_slider_Description'],
    ];

    $result = insert($sqlInsert, $values, 'ssss');

    if ($result) {
        move_uploaded_file($_FILES["home_slider_Image"]["tmp_name"], "uploads/" . $image_name);
        echo 1;
    } else {
        echo 0;
    }
}

// Fetch all Home Sliders
if (isset($_POST['loadhome_slider_Data'])) {
    $query = "SELECT * FROM home_slider";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $sr = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>$sr</td>
                <td><img src='uploads/{$row['image']}' alt='Image not found' height='100' width='100'></td>
                <td>{$row['name']}</td> 
                <td>{$row['title']}</td>
                <td>{$row['description']}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-secondary home_slider_EditById' 
                        data-bs-toggle='modal' 
                        data-id='{$row['id']}' 
                        data-bs-target='#Model'>
                        <i class='bx bx-edit fs-16'></i>
                    </button>
                </td>
                <td>
                    <button type='button' class='btn btn-sm btn-soft-danger home_slider_DeleteById' 
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
if (isset($_POST['deletehome_slider_ById'])) {
    $id = $_POST['deletehome_slider_ById'];
    $img = $_POST['deletehome_slider_Img'];

    $sqlDelete = "DELETE FROM home_slider WHERE id = ?";
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
if (isset($_POST['loadhome_slider_EditForm'])) {
    $sql = "SELECT * FROM home_slider WHERE id = ?";
    $result = select($sql, [$_POST['loadhome_slider_EditForm']], 'i');

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

// Update Home Slider
if (isset($_POST['newhome_slider_Title'])) {
    $id = $_POST['home_slider_EditId'];

    $sqlSelect = "SELECT image FROM home_slider WHERE id = ?";
    $currentImage = selectSingleValue($sqlSelect, [$id], 'i');

    $image_name = $currentImage;
    if (isset($_FILES['newhome_slider_Image']) && $_FILES['newhome_slider_Image']['error'] == UPLOAD_ERR_OK) {
        $image_name = rand() . rand() . basename($_FILES["newhome_slider_Image"]["name"]);
        move_uploaded_file($_FILES["newhome_slider_Image"]["tmp_name"], "uploads/" . $image_name);

        if ($currentImage && file_exists("uploads/" . $currentImage)) {
            unlink("uploads/" . $currentImage);
        }
    }

    $sqlUpdate = "UPDATE home_slider SET image = ?, name = ?, title = ?, description = ? WHERE id = ?";
    $values = [
        $image_name,
        $_POST['newhome_slider_Name'],
        $_POST['newhome_slider_Title'],
        $_POST['newhome_slider_Description'],
        $id,
    ];

    $result = update($sqlUpdate, $values, 'ssssi');

    echo $result ? 1 : 0;
}

