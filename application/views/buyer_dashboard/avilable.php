<style>
    /* Styling for card container */
    #card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* Styling for individual cards */
    .card {
        width: 300px;
        margin: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card img {
        max-width: 100%;
        height: auto;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 10px;
    }

    .card-text {
        margin-bottom: 10px;
    }

    .btn {
        padding: 5px 15px;
        margin-right: 10px;
    }

    /* Media query for responsiveness */
    @media (max-width: 768px) {
        .card {
            width: 100%;
        }
    }
</style>

<body>
    <div class="container">
        <input type="hidden" id="user_id" value="<?php echo $this->session->userdata('id'); ?>">
        <div class="row" id="card-container">
            <!-- Cards will be dynamically added here -->
        </div>
        <!-- model -->
        <div class="modal fade" id="product_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function fetch() {
                var userid = $("#user_id").val();
                $.ajax({
                    url: "<?php echo base_url() . 'buyer_dash/Avilable_art/fetch' ?>",
                    dataType: "json",
                    data: {
                        userid: userid // Provide a key for the 'userid' data
                    },
                    type: "get",
                    success: function(response) {
                        var cardContainer = $("#card-container");

                        $.each(response, function(index, item) {
                            var card = $("<div>").addClass("col-md-4 mb-4");
                            var cardBody = $("<div>").addClass("card");

                            cardBody.append(
                                $("<img>").addClass("card-img-top").attr("src", "../" + item.Image).attr("alt", item.Title).css("height", "200px"),
                                $("<div>").addClass("card-body").append(
                                    $("<h5>").addClass("card-title").text(item.Title),
                                    $("<p>").addClass("card-text").text("Size: " + item.Size),
                                    $("<p>").addClass("card-text").text("Price: " + item.Price),
                                    $("<p>").addClass("card-text").text("Art Produce Date: " + item.ArtProduce),
                                    $("<button>").addClass("btn btn-primary").text("Buy").attr("product_id", item.id)
                                )
                            );

                            // Check if the end date and time have passed
                            var endDate = new Date(item.EndDate + ' ' + item.EndTime);
                            var now = new Date();
                            if (endDate < now) {
                                cardBody.find("button").text("Expired").attr("disabled", true);
                            }

                            cardContainer.append(card.append(cardBody));
                        });

                        // Initialize DataTable on the cardContainer
                        cardContainer.DataTable();
                    }
                });
            }

            fetch();
            $(document).on("click", "button.btn-primary", function() {
                // Check if the session is empty (assuming your session variable is called "user_id")
                if (!$("#user_id").val()) {
                    // Redirect to the "Userlogin" controller
                    window.location.href = "<?php echo base_url() ?>Userlogin";
                } else {
                    // Session is not empty, continue with the rest of the code
                    var product_id = $(this).attr("product_id");
                    // alert(product_id);
                    $("#product_Modal").modal("show");
                }
            });
        });
    </script>

</body>