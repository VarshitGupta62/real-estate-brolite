
// Add Home Slider
if (isset($_POST['services_Name'])) {
    $image_name = rand() . rand() . basename($_FILES["services_Image"]["name"]);

    $sqlInsert = "INSERT INTO services (image, name, title, description) VALUES (?, ?, ?, ?)";
    $values = [
        $image_name,
        $_POST['services_Name'], // New Name field
        $_POST['services_Title'],
        $_POST['services_Description'],
    ];

    $result = insert($sqlInsert, $values, 'ssss');

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
                <td>{$row['name']}</td> 
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

    $sqlUpdate = "UPDATE services SET image = ?, name = ?, title = ?, description = ? WHERE id = ?";
    $values = [
        $image_name,
        $_POST['newservices_Name'],
        $_POST['newservices_Title'],
        $_POST['newservices_Description'],
        $id,
    ];

    $result = update($sqlUpdate, $values, 'ssssi');

    echo $result ? 1 : 0;
}

