<?php 
session_star();
$host = 'locahost';
$dbname = 'dbname';
$user = 'root';
$pass = 'password';

$conn = new mysqli($host,$user,$pass,$dbname);
if ($conn->connect_error)
{
    die(json_encode(["success" => false , "message" => "資料庫連接失敗"]));
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['role'] ?? '';

if (empty($username)||empty($password)||empty($role))
{
    echo json_encode(["success" => false, "message" => "請填寫所有欄位"]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM user WHERE username=? AND role=?");
$stmt->bind_param("ss", $username, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc())
{
    if (password_verify($password, $row['password']))
    {
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        echo json_encode(["success" => true, "message"] => "登入成功");
    }
    else { echo json_encode(["success" => false, "message" => "密碼錯誤"])};
    else { echo json_encode(["success" => false, "message" => "帳號不存在" ])};
}

$stmt->close();
$conn->close();

header("Location: login.php");
exit;
?>