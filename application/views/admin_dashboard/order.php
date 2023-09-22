<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<div class="container mt-5">
    <div class="row">

        <div class="table-responsive">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Size</th>
                        <th scope="col">Bidding Price</th>
                        <th scope="col">Art Produce</th>
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
    $(document).ready(function() {
        function fetch() {
            $.ajax({
                url: "<?php echo base_url() . 'admin_dash/Admin_order/fetch' ?>",
                dataType: "json",
                type: "get",
                success: function(response) {
                    var tbody = "";
                    var i = 1; // Initialize the counter
                    var now = new Date(); // Get the current date and time

                    // Group responses by product_id and find the highest bid amount
                    var highestBidByProductId = {};
                    for (var key in response) {
                        var productId = response[key]['product_id'];
                        var bidAmount = parseFloat(response[key]['bid_amount']);

                        if (!(productId in highestBidByProductId) || bidAmount > highestBidByProductId[productId]) {
                            highestBidByProductId[productId] = bidAmount;
                        }
                    }

                    for (var key in response) {
                        var endDate = new Date(response[key]['EndDate']);
                        var endTime = new Date(response[key]['EndTime']);
                        var bidAmount = parseFloat(response[key]['bid_amount']); // Move this line here

                        tbody += "<tr>";
                        tbody += "<td>" + i++ + "</td>"; // Increment the counter
                        tbody += "<td>" + response[key]['firstname'] + " " + response[key]['lastname'] + "</td>";
                        tbody += "<td><img src='../" + response[key]['Image'] + "' height='100px' width='100px'></td>";
                        tbody += "<td>" + response[key]['Title'] + "</td>";
                        tbody += "<td>" + response[key]['Size'] + "</td>";
                        tbody += "<td>" + bidAmount + "</td>";
                        tbody += "<td>" + response[key]['ArtProduce'] + "</td>";

                        // Compare the current bid amount with the highest bid amount for the same product_id
                        if (bidAmount === highestBidByProductId[response[key]['product_id']]) {
                            // This is the highest bid amount for this product_id, show the button
                            tbody += `<td>
                        <div class="d-flex">
                            <a href="#" id="edit" class="btn btn-primary btn-sm m-1" value="${response[key]['order_id']}">Confirm</a>
                        </div>
                    </td>`;
                        } else {
                            // Hide the button for lower bid amounts
                            tbody += `<td></td>`;
                        }

                        tbody += "</tr>";
                    }
                    $("#tbody").html(tbody);
                    $("#myTable").DataTable();

                }
            });
        }

        fetch();

        $(document).on("click", "#edit", function() {
            alert();
            var button = $(this); // Store the button element

            var order_id = button.attr('value');

            $.ajax({
                url: "<?php echo base_url() . 'admin_dash/Admin_order/insert_sold'; ?>",
                type: 'post',
                dataType: 'json',
                data: {
                    order_id: order_id
                },
                success: function(response) {
                    if (response.success) {
                        // Reload the current page
                        location.reload();
                    } else {
                        alert("Error updating order and product status");
                    }
                }
            });
        });
    });
</script>
</body>