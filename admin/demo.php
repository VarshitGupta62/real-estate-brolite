
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

