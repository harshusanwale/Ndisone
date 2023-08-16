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
                <span class="udb-inst">All Plan Manage Options</span>
                <div class="ud-cen-s2">
                    <h2>All Plan Manage Options</h2>
                    <?php include "../page_level_message.php"; ?>
                    <div style="display: none" class="static-success-message log-suc"><p>Plan Manage Options(s) has been Permanently Deleted!!! Please wait for automatic page refresh!! </p></div>
                    <a href="add_plan_manage.php" class="db-tit-btn">Add new Plan Manage Options</a>
                    <table class="responsive-table bordered" id="pg-resu">
							<thead>
								<tr>
									<th>No</th>
                                    <th>Plan Manage Name</th>
									<th>Edit</th>
									<th>Delete</th>
                                </tr>
							</thead>
							<tbody>
                            <?php
                            $si = 1;
                            foreach (getAllPlanManage() as $planrow) {
                                
                            ?>
                            <tr>
                             <td><?php echo $si; ?></td>
                             <td><?php echo $planrow['plan_man_name']; ?></td>
                             <td><a href="edit_plan_manage.php?row=<?php echo $planrow['plan_managed_id']; ?>"
                                       class="db-list-edit">Edit</a></td>
                            <td><a href="delete_plan_manage.php?row=<?php echo $planrow['plan_managed_id']; ?>"
                            class="db-list-edit">Delete</a></td>
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