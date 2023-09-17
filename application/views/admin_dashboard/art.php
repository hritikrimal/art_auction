<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<body>
    <div class="container mt-5">
        <div class="row">

            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Art Produce</th>
                            <th scope="col">Status</th>
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
        <div class="modal fade" id="editartproductModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="forms" class="row g-3">
                            <input type="hidden" id="e_artmodal_id" value="">
                            <input type="hidden" id="e_user_id" value="<?php echo $this->session->userdata('id'); ?>">


                            <div class="col-md-4">
                                <label for="artTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="e_artTitle">
                            </div>

                            <div class="col-md-4">
                                <label for="artImage" class="form-label">Image</label>
                                <input type="hidden" class="form-control" id="e_artImageText" readonly>
                                <input type="file" name="e_artImage" class="form-control" id="e_artImage">
                            </div>
                            <!-- TODO: -->

                            <div class="col-md-4">
                                <label for="artClassification" class="form-label">Classification</label>
                                <select class="form-select" id="e_artClassification">
                                    <option selected disabled value="">Choose Classification of Art</option>
                                    <option value="landscape">Landscape</option>
                                    <option value="seascape">Seascape</option>
                                    <option value="portrait">Portrait</option>
                                    <option value="figure">Figure</option>
                                    <option value="still life">Still Life</option>
                                    <option value="nude">Nude</option>
                                    <option value="animal">Animal</option>
                                    <option value="abstract">Abstract</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="artSize" class="form-label">Size</label>
                                <select class="form-select" id="e_artSize">
                                    <option selected disabled>Choose Size of Art</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="artArtist" class="form-label">Artist Name</label>
                                <input type="text" class="form-control" id="e_artArtist" name="e_artist_id">
                            </div>

                            <div class="col-md-4">
                                <label for="arttype" class="form-label">Art Type</label>
                                <select class="form-select" id="e_arttype" name="e_art_type">
                                    <option selected disabled>Choose Art Type</option>
                                    <option value="Paintings">Paintings</option>
                                    <option value="Drawings">Drawings</option>
                                    <option value="Photographic">Photographic</option>
                                    <option value="sculptures">sculptures</option>
                                    <option value="Carvings">Carvings</option>
                                </select>
                            </div>



                            <div class="col-md-4">
                                <label for="artmedium" class="form-label">Art Medium</label>
                                <select class="form-select" id="e_artmedium" name="e_art_medium">
                                    <option selected disabled>Choose Art Medium</option>
                                    <option value="oil">Oil</option>
                                    <option value="acrylic">Acrylic</option>
                                    <option value="watercolour">Watercolour</option>
                                    <option value="pencil">Pencil</option>
                                    <option value="ink">Ink</option>
                                    <option value="charcoal">Charcoal</option>
                                    <option value="black_and_white">Black and White</option>
                                    <option value="colour">Colour</option>
                                    <option value="bronze">Bronze</option>
                                    <option value="marble">Marble</option>
                                    <option value="pewter">Pewter</option>
                                    <option value="oak">Oak</option>
                                    <option value="beach">Beach</option>
                                    <option value="pine">Pine</option>
                                    <option value="willow">Willow</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="artDimension" class="form-label">Dimension</label>
                                <input type="text" class="form-control" id="e_artDimension" name="e_dimension">
                            </div>

                            <div class="col-md-4">
                                <label for="artPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="e_artPrice" name="e_price">
                            </div>
                            <div class="col-md-4">
                                <label for="artProduce" class="form-label">Art Produce Date</label>
                                <input type="date" class="form-control" id="e_artProduce" name="e_art_produce_date">
                            </div>
                            <div class="col-md-4">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="e_startDate" name="e_start_date">
                            </div>

                            <div class="col-md-4">
                                <label for="startTime" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="e_startTime" name="e_start_time">
                            </div>

                            <div class="col-md-4">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="e_endDate" name="e_end_date">
                            </div>

                            <div class="col-md-4">
                                <label for="endTime" class="form-label">End Time</label>
                                <input type="time" class="form-control" id="e_endTime" name="e_end_time">
                            </div>
                            <div class="col-md-4">
                                <label for="artDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="e_artDescription" name="e_description" rows="4"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function fetch() {
                $.ajax({
                    url: "<?php echo base_url() . 'admin_dash/Admin_art/fetch' ?>",
                    dataType: "json",
                    type: "get",
                    success: function(response) {
                        var tbody = "";
                        var i = 1; // Initialize the counter
                        var now = new Date(); // Get the current date and time

                        for (var key in response) {
                            // Parse the "EndDate" and "EndTime" as Date objects
                            var endDate = new Date(response[key]['EndDate'] + ' ' + response[key]['EndTime']);

                            tbody += "<tr>";
                            tbody += "<td>" + i++ + "</td>"; // Increment the counter
                            tbody += "<td><img src='../" + response[key]['Image'] + "' height='100px' width='100px'></td>";
                            tbody += "<td>" + response[key]['Title'] + "</td>";
                            tbody += "<td>" + response[key]['Size'] + "</td>";
                            tbody += "<td>" + response[key]['Price'] + "</td>";
                            tbody += "<td>" + response[key]['ArtProduce'] + "</td>";

                            // Check if the "EndDate" and "EndTime" are greater than the current date and time
                            if (endDate > now) {
                                tbody += "<td>active</td>";
                            } else {
                                tbody += "<td>expired</td>";
                            }

                            tbody += `<td>
                        <div class="d-flex">
                            <a href="#" id="edit" class="btn btn-primary btn-sm m-1" value="${response[key]['id']}">Edit</a>
                            <a href="#" id="del" class="btn btn-danger btn-sm m-1" value="${response[key]['id']}">Delete</a>
                        </div>
                    </td>`;
                            tbody += "</tr>";
                        }
                        $("#tbody").html(tbody);
                        $("#myTable").DataTable();
                    }
                });
            }

            fetch();

            $(document).on("click", "#del", function() {
                // alert("delete");
                if (!confirm("Do you want to delete")) {
                    return false;
                } else {
                    var del_id = $(this).attr('value');
                    // alert(del_id);

                    $.ajax({
                        url: "<?php echo base_url() . 'admin_dash/Admin_art/del'; ?>",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            del_id: del_id
                        },
                        success: function(response) {
                            fetch();
                        },
                    });
                }
            });
            //edit artist
            $(document).on("click", "#edit", function() {
                // alert("edit");

                var edit_id = $(this).attr('value');
                // alert(edit_id);
                $.ajax({
                    url: "<?php echo base_url() . 'admin_dash/Admin_art/edit'; ?>",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        edit_id: edit_id
                    },
                    success: function(data) {
                        // console.log(data);
                        var imagePath = (data[0].Image);

                        $("#e_artmodal_id").val(data[0].id);
                        $("#e_artTitle").val(data[0].Title);
                        // $("#e_artImage").val(data[0].Image);
                        $("#e_artImageText").val(imagePath);

                        $("#e_artClassification").val(data[0].Classification);
                        $("#e_artSize").val(data[0].Size);
                        $("#e_artArtist").val(data[0].Artist);
                        $("#e_arttype").val(data[0].ArtType);
                        $("#e_artmedium").val(data[0].ArtMedium);
                        $("#e_artDimension").val(data[0].Dimension);
                        $("#e_artPrice").val(data[0].Price);
                        $("#e_artProduce").val(data[0].ArtProduce);
                        $("#e_startDate").val(data[0].StartDate);
                        $("#e_startTime").val(data[0].StartTime);
                        $("#e_endDate").val(data[0].EndDate);
                        $("#e_endTime").val(data[0].EndTime);
                        $("#e_artDescription").val(data[0].Description);
                        $('#editartproductModal1').modal('show');
                    },
                });
            });
            $(document).on("click", "#update", function() {

                var id = $("#e_artmodal_id").val();
                var user_id = $("#e_user_id").val();
                var title = $("#e_artTitle").val();
                var new_image = $("#e_artImage")[0].files[0];
                var old_image = $("#e_artImageText").val();
                // alert(new_image);
                // alert(old_image);
                var Classification = $("#e_artClassification").val();
                var Size = $("#e_artSize").val();
                var Artist = $("#e_artArtist").val();
                var ArtType = $("#e_arttype").val();
                var ArtMedium = $("#e_artmedium").val();
                var Dimension = $("#e_artDimension").val();
                var Price = $("#e_artPrice").val();
                var ProduceDate = $("#e_artProduce").val();
                var StartDate = $("#e_startDate").val();
                var StartTime = $("#e_startTime").val();
                var EndDate = $("#e_endDate").val();
                var EndTime = $("#e_endTime").val();
                var Description = $("#e_artDescription").val();

                var formData = new FormData();
                formData.append('id', id);
                formData.append('user_id', user_id);
                formData.append('title', title);
                formData.append('new_image', new_image);
                formData.append('old_image', old_image);
                formData.append('Classification', Classification);
                formData.append('Size', Size);
                formData.append('Artist', Artist);
                formData.append('ArtType', ArtType);
                formData.append('ArtMedium', ArtMedium);
                formData.append('Dimension', Dimension);
                formData.append('Price', Price);
                formData.append('ProduceDate', ProduceDate);
                formData.append('StartDate', StartDate);
                formData.append('StartTime', StartTime);
                formData.append('EndDate', EndDate);
                formData.append('EndTime', EndTime);
                formData.append('Description', Description);
                $.ajax({
                    url: "<?php echo base_url() . 'admin_dash/Admin_art/update_art_product' ?>",
                    dataType: "json",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        $('#editartproductModal1').modal('hide');
                        fetch();



                    },

                });
            });
        });
    </script>
</body>