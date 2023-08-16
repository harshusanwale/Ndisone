<?php
include "header.php";
?>
?>
<!-- START -->
<section>
    <div class="ad-com">
        <div class="ad-dash leftpadd">
            <div class="ud-cen">
                <div class="log-bor">&nbsp;</div>
                <span class="udb-inst">All language Options</span>
                <div class="ud-cen-s2">
                    <h2>All language Options</h2>
                    <?php include "../page_level_message.php"; ?>
                    <div style="display: none" class="static-success-message log-suc"><p>Language option has been Permanently Deleted!!! Please wait for automatic page refresh!! </p></div>
                    <a href="add_sw_lang.php" class="db-tit-btn">Add new language option</a>
                    <table class="responsive-table bordered" id="pg-resu">
							<thead>
								<tr>
									<th>No</th>
                                    <th>Language Name</th>
									<th>Edit</th>
									<th>Delete</th>
                                </tr>
							</thead>
							<tbody>
                            <?php
                            $si = 1;
                            foreach (getAlllanguges() as $lanrow) {     
                            // print_r($lanrow);die;   
                            ?>
                            <tr>
                             <td><?php echo $si; ?></td>
                             <td><?php echo $lanrow['language_name']; ?></td>
                             <td><a href="edit_sw_language.php?row=<?php echo $lanrow['id']; ?>"
                                       class="db-list-edit">Edit</a></td>
                            <td><a href="delete_sw_language?row=<?php echo $lanrow['id']; ?>"
                            class="db-list-edit">Delete</a></td>
                            <!-- <td><input type='checkbox' class='delete_check' id='delcheck_<?php echo $reviewlisting_id; ?>' onclick='checkcheckbox();' value='<?php echo $reviewlisting_id; ?>'></td> -->
                            </tr>                           
                            <?php 
                            $si++;
                            } ?>
							</tbody>
						</table>
                </div>

            </div>
            <div class="ad-pgnat">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- END -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/select-opt.js"></script>
<script src="../js/select-opt.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="js/admin-custom.js"></script>
<script>
    $(document).ready(function () {
        $('#pg-resu').DataTable({
            "columnDefs": [
                //{ "bSortable": false, "aTargets": [ 8 ] }
            ]
        });
    });
</script>

<script>
    $('#delete_record').click(function(){

        var deleteids_arr = [];
        // Read all checked checkboxes
        $("input:checkbox[class=delete_check]:checked").each(function () {
            deleteids_arr.push($(this).val());
        });

        // Check checkbox checked or not
        if(deleteids_arr.length > 0){

            // Confirm alert
            var confirmdelete = confirm("Do you really want to Delete records?");
            if (confirmdelete == true) {
                $.ajax({
                    url: 'multiple_delete_users.php',
                    type: 'post',
                    data: {request: 7,deleteids_arr: deleteids_arr},
                    success: function(response){
                        $('.static-success-message').css("display", "block");
                        window.setTimeout(function(){location.reload()},3000)
                    }
                });
            }
        }
    });
</script>
</body>

</html>