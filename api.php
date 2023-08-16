<?php 
// Include configuration file if exists
if (file_exists('config/info.php')) {
    include('config/info.php');
}

// Sanitize function
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// API Entry Point
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request = json_decode(file_get_contents('php://input'), true);
    $action = sanitize($request['action']);

    // Call the appropriate function based on the action
    if ($action === 'login') {
        login($request);
    } elseif ($action === 'register') {
        register();
    } elseif ($action === 'getUserData') {
        getUserData();
    } elseif ($action === 'updateUserData') {
        updateUserData();
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid action'
        );
        sendResponse($response);
    }
}

// Login API
function login($request) {
    // Login logic
    //print_r($request);die;
    $email_id = sanitize($request['email_id']);
    $password = sanitize($request['password']);

    // Query the database to check if the user exists
    $login = mysqli_query($GLOBALS['conn'],"SELECT * FROM " . TBL . "users  WHERE email_id = '$email_id' ");

        if (mysqli_num_rows($login) > 0) {
            $login_row = mysqli_fetch_array($login);

            //To Check Email Veriication is Done or not starts

            if ($login_row['verification_status'] == 1) {   //**** If 0 means Activated 1 Means Not activated **//
                $response = array('status' => 'Success', 'code' => "0", 'massage' => 'Email verifacation First, Then You have Sign in', 'data' => []);
                sendResponse($response);
                //To Check Email Veriication is Done or not ends
            } else {
                if (md5($password) == $login_row['password']) {
                    $data['user_code'] = $login_row['user_code'];
                    $data['user_name'] = $login_row['first_name'];
                    $data['user_id'] = $login_row['user_id'];
                    echo json_encode(array('status' => 'Success', 'code'=> '0', 'message' => 'Login successful', 'data' => [$data, $login_row]));
                }
                else {
                    echo json_encode(array('status' => 'Error', 'code' => "1", 'massage' => 'Password is Wrong', 'data' => []));
                }
            }
         }
        else {
            echo json_encode(array('status' => 'Error', 'code' => "1", 'massage' => 'Email-id is Wrong', 'data' => []));
        }
    // ...
}

// Registration API
function register() {
    // Registration logic
    // ...
}

// Get User Data API
function getUserData() {
    // Get user data logic
    // ...
}

// Update User Data API
function updateUserData() {
    // Update user data logic
    // ...
}

// Common function to send API response
function sendResponse($response) {
    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
