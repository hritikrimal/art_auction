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

    </div>

    <script>
        function fetch() {
            var userid = $("#user_id").val();
            $.ajax({
                url: "<?php echo base_url() . 'buyer_dash/My_colls/fetchorder' ?>",
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
                            )
                        );

                        cardContainer.append(card.append(cardBody));
                    });


                }
            });
        }

        fetch();
    </script>
</body>