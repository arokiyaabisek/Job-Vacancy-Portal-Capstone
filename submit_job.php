<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: index.html");
  exit;
}

// Read every field sent by the form. Missing checkboxes/optional fields default to "".
function f($key) {
  global $conn;
  return isset($_POST[$key]) ? $conn->real_escape_string(trim($_POST[$key])) : "";
}

$company      = f("company");
$email        = f("email");
$phone        = f("phone");
$contact      = f("contact");
$website      = f("website");
$industry     = f("industry");
$size         = f("size");
$address      = f("address");
$city         = f("city");
$pincode      = f("pincode");
$gstin        = f("gstin");

$vacid        = f("vacid");
$posted       = f("posted");
$title        = f("title");
$dept         = f("dept");
$jobtype      = f("jobtype");
$mode         = f("mode");
$location     = f("location");
$openings     = (int) f("openings");
$exp          = (int) f("exp");
$level        = f("level");
$salmin       = (int) f("salmin");
$salmax       = (int) f("salmax");
$qualification = f("qualification");
$deadline     = f("deadline");
$skills       = f("skills");
$description  = f("desc");

$applymail    = f("applymail");
$joining      = f("joining");
$interview    = f("interview");
$shift        = f("shift");
$benefits     = isset($_POST["benefits"]) ? implode(", ", $_POST["benefits"]) : "";
$notes        = f("notes");

$sql = "INSERT INTO job_vacancies
  (company, email, phone, contact, website, industry, size, address, city, pincode, gstin,
   vacid, posted, title, dept, jobtype, mode, location, openings, exp, level, salmin, salmax,
   qualification, deadline, skills, description,
   applymail, joining, interview, shift, benefits, notes)
  VALUES (?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?, ?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
  "ssssssssssssssssssiisiissssssssss",
  $company, $email, $phone, $contact, $website, $industry, $size, $address, $city, $pincode, $gstin,
  $vacid, $posted, $title, $dept, $jobtype, $mode, $location, $openings, $exp, $level, $salmin, $salmax,
  $qualification, $deadline, $skills, $description,
  $applymail, $joining, $interview, $shift, $benefits, $notes
);

if ($stmt->execute()) {
  header("Location: index.html?success=1");
} else {
  header("Location: index.html?success=0&err=" . urlencode($stmt->error));
}
$stmt->close();
$conn->close();
