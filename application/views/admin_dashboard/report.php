<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    p {
        font-weight: bold;
    }

    #total-bid-amount {
        color: #ff5722;
        /* You can choose your own color */
    }
</style>

<!-- Add a table to display the data -->
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>Name Of Buyer</th>
                <th>Art Title</th>
                <th>Bid price</th>
            </tr>
        </thead>
        <tbody id="data-table-body">
            <!-- Data will be displayed here -->
        </tbody>
    </table>
    <p>Total Sales Amount: <span id="total-bid-amount"></span></p>
</div>

<!-- AJAX request to fetch data -->
<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo base_url() . 'admin_dash/Admin_report/fetch'; ?>",
            dataType: "json",
            type: "get",
            success: function(response) {
                var tableBody = $("#data-table-body");
                var totalBidAmount = 0;

                // Loop through the response data and create table rows
                $.each(response, function(index, item) {


                    var fullName = item.firstname + " " + item.lastname;

                    // Create the table row with firstname, lastname, bid_amount, and Title
                    tableBody.append("<tr><td>" + fullName + "</td><td>" + item.Title + "</td><td>" + item.bid_amount + "</td></tr>");



                    // tableBody.append("<tr><td>" + item.firstname + "</td><td>" + item.bid_amount + "</td></tr>");

                    // Calculate the total bid amount
                    totalBidAmount += parseFloat(item.bid_amount);
                });

                // Display the total bid amount
                $("#total-bid-amount").text(totalBidAmount.toFixed(2));
            }
        });
    });
</script>