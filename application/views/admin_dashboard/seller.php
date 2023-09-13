<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <title>Document</title>
    <style>
        /* CSS for the "list of Buyer" header */
        /* CSS for the "list of Buyer" header */
        h1 {
            font-size: 24px;
            /* Adjust the font size as needed */
            color: #333;
            /* Change the text color */
            margin-bottom: 20px;
            /* Add spacing below the header */
            font-weight: bold;
            /* Make the text bold */
            text-transform: uppercase;
            /* Convert text to uppercase */
            text-align: center;
            /* Center the text horizontally */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="table-responsive col-lg-12 mt-5">
                <h1>list of Seller</h1>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Registration Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // fetch data from database
        function fetch() {
            $.ajax({
                url: "<?php echo base_url() . 'admin_dash/Admin_buyer/fetch' ?>",
                dataType: "json",
                type: "get",
                success: function(response) {
                    var tbody = "";
                    var i = "1";
                    for (var key in response) {
                        tbody += "<tr>";
                        tbody += "<td>" + i++ + "</td>";
                        tbody += "<td>" + response[key]['firstname'] + "</td>";
                        tbody += "<td>" + response[key]['lastname'] + "</td>";
                        tbody += "<td>" + response[key]['email'] + "</td>";
                        tbody += "<td>" + response[key]['address'] + "</td>";
                        tbody += "<td>" + response[key]['CreationDate'] + "</td>";

                        // Check the "status" field and set button accordingly
                        if (response[key]['status'] === "passive") {
                            tbody += `<td>
                        <div class="d-flex">
                            <a href="#" class="btn btn-primary btn-sm m-1 enable-button" data-id="${response[key]['id']}">Enable</a>
                        </div>
                    </td>`;
                        } else if (response[key]['status'] === "active") {
                            tbody += `<td>
                        <div class="d-flex">
                            <button class="btn btn-secondary btn-sm m-1" disabled>Active</button>
                        </div>
                    </td>`;
                        }

                        tbody += "</tr>";
                    }
                    $("#tbody").html(tbody);
                    $("#myTable").DataTable();

                    // Add click event handler for the enable button
                    $(".enable-button").click(function() {
                        var userId = $(this).data("id");
                        // alert(userId);
                        // Call a function to update the status in the database
                        updateStatus(userId);
                    });
                }
            });
        }

        function updateStatus(userId) {

            // Perform an AJAX request to update the status in the database
            $.ajax({
                url: "<?php echo base_url() . 'admin_dash/Admin_buyer/updateStatus' ?>",
                dataType: "json",
                type: "post",
                data: {
                    userId: userId
                },
                success: function(response) {
                    // Assuming you handle the update on the server-side and return a response
                    if (response.success) {
                        // Reload the data after the status update
                        fetch();
                    } else {
                        // Handle the error scenario if needed
                        alert("Failed to update status.");
                    }
                }
            });
        }

        fetch();
    </script>

</body>

</html>