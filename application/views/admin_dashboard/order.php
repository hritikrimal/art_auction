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

                    for (var key in response) {
                        var endDate = new Date(response[key]['EndDate']);
                        var endTime = new Date(response[key]['EndTime']);

                        tbody += "<tr>";
                        tbody += "<td>" + i++ + "</td>"; // Increment the counter
                        tbody += "<td>" + response[key]['firstname'] + " " + response[key]['lastname'] + "</td>";
                        tbody += "<td><img src='../" + response[key]['Image'] + "' height='100px' width='100px'></td>";
                        tbody += "<td>" + response[key]['Title'] + "</td>";
                        tbody += "<td>" + response[key]['Size'] + "</td>";
                        tbody += "<td>" + response[key]['bid_amount'] + "</td>";
                        tbody += "<td>" + response[key]['ArtProduce'] + "</td>";

                        // Compare "EndDate" and "EndTime" with the current date and time
                        if (endDate > now || (endDate.getTime() === now.getTime() && endTime > now)) {
                            // EndDate and EndTime are in the future or equal to current time, button is disabled
                            tbody += `<td>
                            <div class="d-flex">
                                <button class="btn btn-primary btn-sm m-1" disabled>Confirm</button>
                            </div>
                        </td>`;
                        } else {
                            // EndDate and EndTime have passed, button is enabled
                            tbody += `<td>
                            <div class="d-flex">
                                <a href="#" id="edit" class="btn btn-primary btn-sm m-1" value="${response[key]['id']}">Confirm</a>
                            </div>
                        </td>`;
                        }

                        tbody += "</tr>";
                    }
                    $("#tbody").html(tbody);
                }
            });
        }

        fetch();
    });
</script>
</body>