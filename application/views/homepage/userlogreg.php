<!-- css for this page  -->
<link rel="stylesheet" type="text/css" href="assets/css/adminlogin.css">



</head>

<body>
    <form class="login">
        <h2>Welcome!</h2>
        <p>Please log in</p>

        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Insert username">


        <input type="password" class="form-control" id="password" placeholder="password">

        <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 w-100" id="log">Login</button></div>
        <div class="text-center"><button class="btn px-5 mb-5 w-100" id="register">Register Here </button></div>
    </form>

    <!-- register model -->
    <!-- Modal -->
    <div class="modal fade" id="userregister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registers_user">
                        <input type="hidden" id="modal_id" value="">
                        <div class="mb-2">
                            <label for="buyerseller" class="form-label">Buyer or Seller</label>
                            <select class="form-select" id="buyerseller">
                                <option selected disabled>Choose</option>
                                <option value="Buyer">Buyer</option>
                                <option value="Seller">Seller</option>

                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputUsernames" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="usernames" aria-describedby="exampleInputUsernames">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputFirstName1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" aria-describedby="exampleInputFirstName1">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputLastName1" class="form-label"> Last Name</label>
                            <input type="text" class="form-control" id="lastname" aria-describedby="exampleInputLastName1">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" aria-describedby="exampleInputEmail">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" aria-describedby="exampleInputAddress">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputnew-password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="new-password" aria-describedby="exampleInputnew-password">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputconfirmpassword" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="confirm-password" aria-describedby="exampleInputconfirmpassword">
                        </div>

                    </form>
                    <div class="modal-footer">

                        <button type="button" id="reghere" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script src="assets/js/loginpage.js"></script> -->
        <script>
            $(document).on("click", "#register", function(e) {
                e.preventDefault();
                $("#userregister").modal("show");
            });

            $(document).on("click", "#reghere", function(e) {
                var usertype = $("#buyerseller").val();
                var usernames = $("#usernames").val();
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var email = $("#email").val();
                var address = $("#address").val();
                var passwords = $("#new-password").val();
                var repasswords = $("#confirm-password").val();
                // alert(passwords);
                // alert(repasswords);
                if (usernames == "") {
                    alert("User Name is required");
                    return false;
                }
                if (firstname == "") {
                    alert("First Name is required");
                    return false;
                }
                if (lastname == "") {
                    alert("Last Name is required");
                    return false;
                }
                if (email == "") {
                    alert("Email is required");
                    return false;
                }
                if (address == "") {
                    alert("Address is required");
                    return false;
                }
                if (passwords == "") { // Remove the extra space here
                    alert("Password is required");
                    return false;
                }
                if (repasswords == "") { // Remove the extra space here
                    alert("Confirm Password is required");
                    return false;
                }

                // Check if passwords match
                if (passwords !== repasswords) {
                    alert("Passwords do not match");
                    return false;
                }
                $.ajax({
                    url: "Userlogin/register",
                    dataType: "json",
                    type: "post",
                    data: {
                        usernames: usernames,
                        usertype: usertype,
                        firstname: firstname,
                        lastname: lastname,
                        email: email,
                        address: address,
                        passwords: passwords,
                        repasswords: repasswords
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#userregister").modal("hide");
                        } else {
                            alert(response.message);
                        }
                    },
                });

            });
            $(document).on("click", "#log", function(e) {
                e.preventDefault();
                var username = $("#username").val();
                var password = $("#password").val();
                // alert(username);
                if (username == "") {
                    alert("Username is required.");
                    return false;
                }
                if (password == "") {
                    alert("Password is required.");
                    return false;
                }

                $.ajax({
                    url: "Userlogin/login",
                    dataType: "json",
                    type: "post",
                    data: {
                        username: username,
                        password: password,
                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.href = response.url;
                            console.log(response);
                        } else {
                            alert(response.message);
                        }
                    },
                });
            });
        </script>

</body>

</html>