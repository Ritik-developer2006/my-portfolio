<?php
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
header('Content-Type: application/json; charset=utf-8');

include_once('../connection/mysqlconnection.php');

// If POST is empty, try to read JSON and map it to $_POST
if (empty($_POST)) {
    $rawInput = file_get_contents("php://input");
    $jsonData = json_decode($rawInput, true);

    if (is_array($jsonData)) {
        $_POST = $jsonData;
    }
}

// Now safely use $_POST everywhere
$method = $_POST['method'] ?? '';

class AdminApi
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function connect_to_mysqlsms()
    {
        return $this->db;
    }

    // Fetch all educations records
    public function getAlleducation()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_education");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Education records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch all experiences records
    public function getAllexperiences()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_experiences");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Experiences records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch all experiences records
    public function getAllSkills()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_skills");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Skills records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single experience records by id
    public function getSingleExperience($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_experiences WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Experiences records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Testimonials records
    public function getAllTestimonials()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_testimonials");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Testimonials records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Services records
    public function getAllServices()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_services");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Services records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Testimonials records by id
    public function getSingleTestimonial($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_testimonials WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Testimonials records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single education records by id
    public function getSingleEducation($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_education WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Education records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single education records by id
    public function getSingleService($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_services WHERE id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Service records fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch About us records
    public function getAboutUs()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM about_us LIMIT 1");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'About Us record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch User Messages records
    public function getUserMessages()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM user_message");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'User Messages record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Basic Details records
    public function getBasicDetail()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM basic_detail LIMIT 1");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Basic record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch All Project Details records
    public function getAllProject()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_project");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Basic record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Project Details records
    public function getSingleProject($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_project where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Project record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Project Filter Details records
    public function getProjectFilter()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_data_filter");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Project filter record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Project Details records
    public function getSingleProjectFilter($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_data_filter where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Project filter record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Blog Details records
    public function getSingleBlog($id)
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_blogs where id='$id'");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // Fetch Single Blog Details records
    public function getAllBlogs()
    {
        $smslink = $this->connect_to_mysqlsms();
        $stmt = $smslink->prepare("SELECT * FROM tbl_blogs");

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        $data = [];
        // print_r($result);
        // die;

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode([
            'status' => 1,
            'msg' => 'Blog record fetched successfully',
            'data' => $data
        ]);
        die;
    }

    // LogIn admin
    public function logIn($username, $password)
    {
        $smslink = $this->connect_to_mysqlsms();

        $stmt = $smslink->prepare(
            "SELECT id, username, password FROM tbl_admin WHERE username = ? LIMIT 1"
        );

        $stmt->bind_param("s", $username);

        if (!$stmt->execute()) {
            echo json_encode([
                'status' => 0,
                'msg' => 'Query execution failed'
            ]);
            die;
        }

        $result = $stmt->get_result();
        // print_r($result);
        // die;
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verify hashed password
            // if (password_verify($password, $row['password'])) {

            // Verify real password
            if ($password == $row['password']) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['isLogin']  = true;
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                echo json_encode([
                    'status' => 1,
                    'msg' => 'Login successfully'
                ]);
                die;
            }
        }

        echo json_encode([
            'status' => 0,
            'msg' => 'Incorrect Username or Password'
        ]);
        die;
    }


    // LogOut admin
    public function logOut()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        echo json_encode([
            'status' => 1,
            'msg' => 'Logout successful'
        ]);
        die;
    }
}

$user_obj = new AdminApi($conn);

switch ($method) {
    case 'getAlleducation':
        $user_obj->getAlleducation();
        break;

    case 'getAllexperiences':
        $user_obj->getAllexperiences();
        break;

    case 'getAllSkills':
        $user_obj->getAllSkills();
        break;
    
    case 'getSingleExperience':
        $id = $_POST['id']; 
        $user_obj->getSingleExperience($id);
        break;

    case 'getSingleEducation':
        $id = $_POST['id']; 
        $user_obj->getSingleEducation($id);
        break;

    case 'getAllTestimonials':
        $user_obj->getAllTestimonials();
        break;

    case 'getSingleTestimonial':
        $id = $_POST['id'];
        $user_obj->getSingleTestimonial($id);
        break;
    
    case 'getAllServices':
        $user_obj->getAllServices();
        break;
    
    case 'getSingleService':
        $id = $_POST['id'];
        $user_obj->getSingleService($id);
        break;

    case 'getAboutUs':
        $user_obj->getAboutUs();
        break;

    case 'getUserMessages':
        $user_obj->getUserMessages();
        break;

    case 'getBasicDetail':
        $user_obj->getBasicDetail();
        break;

    case 'getAllProject':
        $user_obj->getAllProject();
        break;
    
    case 'getProjectFilter':
        $user_obj->getProjectFilter();
        break;
    
    case 'getSingleProjectFilter':
        $id = $_POST['id'];
        $user_obj->getSingleProjectFilter($id);
        break;

    case 'getSingleProject':
        $id = $_POST['id'];
        $user_obj->getSingleProject($id);
        break;

    case 'getAllBlogs':
        $user_obj->getAllBlogs();
        break;

    case 'getSingleBlog':
        $id = $_POST['id'];
        $user_obj->getSingleBlog($id);
        break;
    
    case 'logIn':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_obj->logIn($username, $password);
        break;

    case 'logOut':
        $user_obj->logOut();
        break;

    default:
        echo json_encode([
            'status' => 0,
            'msg' => 'Invalid method'
        ]);
        die;
}
