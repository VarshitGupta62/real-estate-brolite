<?php

include('config.php');

function select($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($readyquery = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($readyquery, $datatypes, ...$values);
        if (mysqli_stmt_execute($readyquery)) {
            $result = mysqli_stmt_get_result($readyquery);
            mysqli_stmt_close($readyquery);
            return $result;
        } else {
            mysqli_stmt_close($readyquery);
            die("Query Not Executed - Select");
        }
    } else {
        die("Query Not Prepared - Select");
    }
}

function insert($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($queryprepared = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($queryprepared, $datatypes, ...$values);
        if (mysqli_stmt_execute($queryprepared)) {
            $result = mysqli_stmt_affected_rows($queryprepared);
            mysqli_stmt_close($queryprepared);
            return $result;
        } else {
            mysqli_stmt_close($queryprepared);
            die("Query Not Executed - Insert");
        }
    } else {
        die("Query Not Prepared - Insert");
    }
}

function update($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($queryprepared = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($queryprepared, $datatypes, ...$values);
        if (mysqli_stmt_execute($queryprepared)) {
            $result = mysqli_stmt_affected_rows($queryprepared);
            mysqli_stmt_close($queryprepared);
            return $result;
        } else {
            // Provide more detailed error information
            $error = mysqli_stmt_error($queryprepared);
            mysqli_stmt_close($queryprepared);
            die("Query Not Executed - Update: $error");
        }
    } else {
        die("Query Not Prepared - Update");
    }
}

function updateIdAvaliable($sql, $values, $datatypes) {
    $conn = $GLOBALS['conn'];
    if ($queryprepared = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($queryprepared, $datatypes, ...$values);
        if (mysqli_stmt_execute($queryprepared)) {
            $result = mysqli_stmt_affected_rows($queryprepared);
            mysqli_stmt_close($queryprepared);
            return $result; // Return the number of affected rows
        } else {
            // Provide detailed error information
            $error = mysqli_stmt_error($queryprepared);
            mysqli_stmt_close($queryprepared);
            die("Query Not Executed - Update: $error");
        }
    } else {
        die("Query Not Prepared - Update");
    }
}

function delete($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($preparequery = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($preparequery, $datatypes, ...$values);
        if (mysqli_stmt_execute($preparequery)) {
            $result = mysqli_stmt_affected_rows($preparequery);
            mysqli_stmt_close($preparequery);
            return $result;
        } else {
            mysqli_stmt_close($preparequery);
            die('Query Not Executed - Delete');
        }
    } else {
        die('Query Not Prepared - Delete');
    }
}

function selectquerydata($tablename, $recordtype)
{
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tablename)) {
        die("Invalid table name");
    }
    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM $tablename WHERE recordtype = ?";
    $value = [$recordtype];
    return select($sql, $value, 's');
}

function selectalldata($tablename)
{
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tablename)) {
        die("Invalid table name");
    }
    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM $tablename";
    $result = mysqli_query($conn, $sql) or die("Query Failed - Select All Data");
    return $result;
}

function selectSingleValue($sql, $params, $param_types)
{
    // Assuming you have an existing mysqli connection
    global $conn;

    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {

        // Bind the parameters to the statement
        $stmt->bind_param($param_types, ...$params);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the first row (single value)
        $row = $result->fetch_assoc();

        // Close the statement
        $stmt->close();

        // Return the value of the first column
        return $row ? array_values($row)[0] : null;
    } else {
        // Handle query error
        return null;
    }
}

function selectSingleParams($sql, $params = [], $param_types = '')
{
    // Assuming you have an existing mysqli connection
    global $conn;

    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {

        // Bind parameters only if there are any
        if (!empty($params) && $param_types) {
            $stmt->bind_param($param_types, ...$params);
        }

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch the first row (single value)
        $row = $result->fetch_assoc();

        // Close the statement
        $stmt->close();

        // Return the value of the first column
        return $row ? array_values($row)[0] : null;
    } else {
        // Handle query error
        return null;
    }
}
