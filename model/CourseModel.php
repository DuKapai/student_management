<?php
require "database/database.php";

function updateCourseById(
    $name,
    $slug,
    $status,
    $id
) {
    // Here is update to database
    date_default_timezone_set('Asia/Ho_Chi_Minh');// cap nhat lai mui gio vietnamese
    $db = connectionDb();
    $checkUpdate = false;
    $sql = "UPDATE `courses` SET `name` = :nameCourse, `slug` = :slug, `status` = :statusCourse, `updated_at` = :updated_at WHERE `id` = :id AND `deleted_at` IS NULL";
    $updateTime = date('Y-m-d H:i:s');
    $stmt = $db->prepare($sql);
    if ($stmt) {
        $stmt->bindParam(':nameCourse', $name, PDO::PARAM_STR);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindParam(':statusCourse', $status, PDO::PARAM_INT);
        $stmt->bindParam(':updated_at', $updateTime, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $checkUpdate = true;
        }
    }
    disconnectionDb($db);
    return $checkUpdate;
}

function getDetailCourseById($id = 0)
{
    $db = connectionDb();
    $sql = "SELECT * FROM `courses` WHERE `id` = :id AND `deleted_at` IS NULL";
    $stmt = $db->prepare($sql);
    $infoCourse = [];
    if ($stmt) {
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $infoCourse = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }
    }
    disconnectionDb($db);
    return $infoCourse;
}

function deleteCourseById($id = 0)
{
    // Dữ liệu trên giao diện bị xóa nhưng vẫn còn trong database
    date_default_timezone_set('Asia/Ho_Chi_Minh');// cap nhat lai mui gio vietnamese

    $db = connectionDb();
    $sql = "UPDATE `courses` SET `deleted_at` = :deleted_at WHERE `id` = :id";
    $deletedAt = date("Y-m-d H:i:s");
    $stmt = $db->prepare($sql);
    $checkDelete = false;
    if ($stmt) {
        $stmt->bindParam(':deleted_at', $deletedAt, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $checkDelete = true;
        }
    }
    disconnectionDb($db);
    return $checkDelete;
}

function getAllDataCourses($keyword = null)
{
    $db = connectionDb();
    $sql = "SELECT * FROM `courses` WHERE (`name` LIKE :keyword OR `slug` LIKE :slug) AND `deleted_at` IS NULL";
    $stmt = $db->prepare($sql);
    $key  = "%{$keyword}%";
    $data = [];
    if ($stmt) {
        $stmt->bindParam(':keyword', $key, PDO::PARAM_STR);
        $stmt->bindParam(':slug', $key, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
    disconnectionDb($db);
    return $data;
}

function getAllDataCoursesByPage($keyword = null, $start = 0, $limit = LIMIT_ITEM_PAGE)
{
    $db = connectionDb();
    $key = "%{$keyword}%";
    $sql = "SELECT * FROM `courses` WHERE (`name` LIKE :keyword OR `slug` LIKE :slug) AND `deleted_at` IS NULL LIMIT :startData, :limitData";
    $stmt = $db->prepare($sql);
    $dataCourses = [];
    if ($stmt) {
        $stmt->bindParam(':keyword', $key, PDO::PARAM_STR);
        $stmt->bindParam(':slug', $key, PDO::PARAM_STR);
        $stmt->bindParam(':startData', $start, PDO::PARAM_INT);
        $stmt->bindParam(':limitData', $limit, PDO::PARAM_INT);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $dataCourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
    disconnectionDb($db);
    return $dataCourses;
}
// Here is insert to database
function insertCourse(
    $name,
    $slug,
    $status
) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $db = connectionDb();
    $flagInsert = false;
    $sqlInsert = "INSERT INTO `courses`(`name`, `slug`, `status`, `created_at`) VALUES(:nameCourse, :slug, :statusCourse, :created_at)";
    $stmt = $db->prepare($sqlInsert);
    $currentDate = date('Y-m-d H:i:s');
    if ($stmt) {
        $stmt->bindParam(':nameCourse', $name, PDO::PARAM_STR);
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindParam(':statusCourse', $status, PDO::PARAM_INT);
        $stmt->bindParam(':created_at', $currentDate, PDO::PARAM_STR);
        if ($stmt->execute()) {
            $flagInsert = true;
        }
        disconnectionDb($db); // ngat ket noi database
    }
    // $flagInsert la true : insert thanh cong va nguoc lai
    return $flagInsert;
}
