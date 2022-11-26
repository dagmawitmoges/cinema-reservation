<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                />
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="number"
                  class="form-control"
                  id="number"
                  name="phoneNumber"
                />
              </div>
             <a href="maincinema.html"><button>submit</button></a>
            </form>
          </div>
          <div class="panel-footer text-right">
            <small>&copy; Technical Babaji</small>
          </div>
        </div>
      </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small>11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
  </body>
  <?php
  $id = $_GET['id'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phoneNumber = $_POST['phoneNumber'];

  // Database connection
  $conn = new mysqli('localhost','root','','cinema');
  if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into signup(firstName, lastName, gender, email, password, phoneNumber) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $phoneNumber);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    header("Location: maincinema.html");
    $stmt->close();
    $conn->close();
  }
?>
</html>
