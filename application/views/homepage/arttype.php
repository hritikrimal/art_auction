<style>
    /* Style for the modal content */
    .modal-content {
        border: none;
    }

    /* Style for the modal header */
    .modal-header {
        background-color: #007BFF;
        color: #fff;
        border: none;
    }

    /* Style for modal title */
    .modal-title {
        font-size: 24px;
        font-weight: bold;
    }

    /* Style for close button */
    .btn-close {
        color: #fff;
    }

    /* Style for modal body */
    .modal-body {
        padding: 20px;
    }

    /* Style for product image */
    #product_image {
        max-height: 400px;
        max-width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    /* Style for product details */
    #product_title {
        font-size: 24px;
        font-weight: bold;
    }

    /* Style for other product details */
    #product_artist,
    #product_classification,
    #product_art_medium,
    #product_art_type,
    #product_size,
    #product_dimension,
    #product_start_date,
    #product_end_date,
    #product_price {
        font-size: 16px;
        color: #333;
        margin-bottom: 10px;
    }

    /* Style for description */
    #product_description {
        font-size: 16px;
        color: #555;
    }

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
        <div class="modal fade" id="product_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" alt="Product Image" id="product_image" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <input type="number" id="id" style="display: none;">
                                <input type="number" id="user_ids" style="display: none;">
                                <h4 id="product_title"></h4>
                                <p><strong>Artist:</strong> <span id="product_artist"></span></p>
                                <p><strong>Classification:</strong> <span id="product_classification"></span></p>
                                <p><strong>Art Medium:</strong> <span id="product_art_medium"></span></p>
                                <p><strong>Art Type:</strong> <span id="product_art_type"></span></p>
                                <p><strong>Size:</strong> <span id="product_size"></span></p>
                                <p><strong>Dimension:</strong> <span id="product_dimension"></span></p>
                                <p><strong>Start Date:</strong> <span id="product_start_date"></span></p>
                                <p><strong>End Date:</strong> <span id="product_end_date"></span></p>
                                <p><strong>Price:</strong> <span id="product_price"></span></p>
                                <p><strong>Higest Bidding Price:</strong> <span id="heighest_price"></span></p>
                                <input type="number" class="form-control" id="bid_amount" placeholder="Enter your bid amount">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Description</h4>
                                <p id="product_description"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="process">Process</button>
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
                    url: "<?php echo base_url() . 'Arttype/fetch' ?>",
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
                                $("<img>").addClass("card-img-top").attr("src", "./" + item.Image).attr("alt", item.Title).css("height", "200px"),
                                $("<div>").addClass("card-body").append(
                                    $("<h5>").addClass("card-title").text(item.Title),
                                    $("<p>").addClass("card-text").text("Size: " + item.Size),
                                    $("<p>").addClass("card-text").text("Price: " + item.Price),
                                    $("<p>").addClass("card-text").text("Auction End Date: " + item.EndDate + ' ' + item.EndTime),
                                    $("<button>").addClass("btn btn-primary").attr("disabled", true).attr("product_id", item.id)
                                )
                            );

                            cardContainer.append(card.append(cardBody));
                            // Start countdown only if StartDate and StartTime are in the future
                            startCountdown(item.StartDate, item.StartTime, card.find("button"), card);
                        });

                        // Initialize DataTable on the cardContainer
                        // cardContainer.DataTable();
                    }
                });
            }

            fetch();
            //   countdown
            function startCountdown(startDate, startTime, button, card) {
                var countdownInterval = setInterval(function() {
                    var now = new Date();
                    var eventTime = new Date(startDate + ' ' + startTime);
                    var timeRemaining = eventTime - now;

                    if (timeRemaining <= 0) {
                        // Event has started, clear the interval and update the button
                        clearInterval(countdownInterval);
                        button.text("Buy").removeAttr("disabled");
                    } else {
                        // Calculate hours, minutes, and seconds from timeRemaining
                        var hours = Math.floor((timeRemaining / (1000 * 60 * 60)) % 24);
                        var minutes = Math.floor((timeRemaining / 1000 / 60) % 60);
                        var seconds = Math.floor((timeRemaining / 1000) % 60);

                        // Update the countdown element
                        button.text("Start Bidding in: " + hours + "h " + minutes + "m " + seconds + "s");
                    }
                }, 1000); // Update every 1 second
            }
            $(document).on("click", "button.btn-primary", function() {
                window.location.href = "<?php echo base_url() ?>Userlogin";

            });


        });
    </script>
</body>