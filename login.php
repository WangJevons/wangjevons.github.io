<?php 
session_start();
$host = 'localhost';
$dbname = 'dbname';
$user = 'root';
$pass = 'password';

$conn = new mysqli($host,$user,$pass,$dbname);
if ($conn->connect_error)
{
    die(json_encode(["success" => false , "message" => "資料庫連接失敗"]));
}

$username = $_POST['account'] ?? '';
$password = $_POST['password'] ?? '';
$role = $_POST['id'] ?? '';

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
        $_SESSION['id'] = $row['id'];

        if ($role==='student')
        {
            echo "<script>window.location.href='takepack.html';</script>";
        }
        else {
            echo "<script>window.location.href='checkin.html';</script>";
        }
        exit;
    }
    else 
    {
        echo "<script>alert('密碼錯誤'); window.location.href='login.html';</script>";
        exit;
    }
    }
    else 
    {
        echo "<script>alert('帳號錯誤'); window.location.href='login.html';</script>";
        exit;
    }


$stmt->close();
$conn->close();

header("Location: login.php");
exit;

?>
