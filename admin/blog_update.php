<?php
session_start();
include_once 'include/class.admin.php';
$user = new Admin();
$admin = $user->getvalue_admin_login();
 //$users = $user->getvalue_user();
//$profile_value = $user->getvalue_user();
$showblog = $user->update_blog_show();

 //print_r($showblog); die();

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if (isset($_GET['q'])) {
    $user->logout();
    header("location:index.php");
}



$user_id = $_SESSION['user_session'];

if (isset($_POST['submit'])) {
     $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $metakey = trim($_POST['metakey']);
    $metadescription = trim($_POST['metadescription']);
     
 
    $myarray = array("description" => $description, "title" => $title, "metakey" => $metakey, "metadescription" => $metadescription);

//print_r($myarray); die();
    try {

        if ($user->blog_update($myarray)) {
            $user->redirect('blog_show.php');
         }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<?php include 'part/header.php'; ?>
			<!-- 
				MIDDLE 
			-->
			<section id="middle">
  				<!-- page title -->
				<header id="page-header">
					<h1>Edit User</h1>
					 
				</header>
				<!-- /page title -->


				<div id="content" class="padding-20">

				 
					<div id="panel-1" class="panel panel-default">
						<div class="panel-heading">
							<span class="title elipsis">
								<strong>EDIT USERS</strong> <!-- panel title -->
							</span>

							<!-- right options -->
							<ul class="options pull-right list-inline">
								<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
								<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
								<li><a href="#" class="opt panel_close" data-confirm-title="Confirm" data-confirm-message="Are you sure you want to remove this panel?" data-toggle="tooltip" title="Close" data-placement="bottom"><i class="fa fa-times"></i></a></li>
							</ul>
							<!-- /right options -->

						</div>

						<!-- panel content -->
						<div class="panel-body">

							<!--
								Example: ADD TO YOUR cutoms.css to position buttons
								div.tabletools-topbar {
									margin-top:-56px;
									margin-right:130px;
								}
								Change for your needs - especially: margin-right , accroding to panel bar buttons!
							-->
							<div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        <div class="form-group mb-n">
                            <label for="Title" class="col-sm-2 control-label label-input-lg">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" value="<?php echo $showblog['title']; ?>" class="form-control input-lg" id="largeinput" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="Description" class="col-sm-2 control-label label-input-lg">Description</label>
                            <div class="col-sm-10">
                            <textarea class="summernote form-control" value="<?php echo $showblog['description']; ?>" name="description" data-height="200" data-lang="en-US"><?php echo $showblog['description']; ?></textarea>                            </div>
                        </div>
                        
                        <div class="form-group mb-n">
                            <label for="Meta Key"   class="col-sm-2 control-label label-input-lg">Meta Key</label>
                            <div class="col-sm-10">
                                <input type="text" value="" value="<?php echo $showblog['metakey']; ?>" name="metakey" class="form-control input-lg" id="largeinput" placeholder="Meta Key">
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="Meta Description"    class="col-sm-2 control-label label-input-lg">Meta Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" value="<?php echo $showblog['metadescription']; ?>" name="metadescription" data-height="200" data-lang="en-US"><?php echo $showblog['metadescription']; ?></textarea>
                            </div>
                        </div>
 
                          <div class="col-sm-10 col-sm-offset-2">
				<input id="submit" name="submit" type="submit" value="Submit" class="btn-success btn">
			</div>
                    </form>
                </div>
            </div>

						</div>
						<!-- /panel content -->

						 
					</div>
					<!-- /PANEL -->


				</div>
			</section>
			<!-- /MIDDLE -->

		</div>



	
		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = 'assets/plugins/';</script>
		<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="assets/js/app.js"></script>

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			loadScript(plugin_path + "datatables/js/jquery.dataTables.min.js", function(){
				loadScript(plugin_path + "datatables/js/dataTables.tableTools.min.js", function(){
					loadScript(plugin_path + "datatables/js/dataTables.colReorder.min.js", function(){
						loadScript(plugin_path + "datatables/js/dataTables.scroller.min.js", function(){
							loadScript(plugin_path + "datatables/dataTables.bootstrap.js", function(){
								loadScript(plugin_path + "select2/js/select2.full.min.js", function(){

									if (jQuery().dataTable) {

										// Datatable with TableTools
										function initTable1() {
											var table = jQuery('#sample_1');

											/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

											/* Set tabletools buttons and button container */

											jQuery.extend(true, jQuery.fn.DataTable.TableTools.classes, {
												"container": "btn-group pull-right tabletools-topbar",
												"buttons": {
													"normal": "btn btn-sm btn-default",
													"disabled": "btn btn-sm btn-default disabled"
												},
												"collection": {
													"container": "DTTT_dropdown dropdown-menu tabletools-dropdown-menu"
												}
											});

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												// set the initial value
												"pageLength": 10,

												"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

												"tableTools": {
													"sSwfPath": plugin_path + "datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
													"aButtons": [{
														"sExtends": "pdf",
														"sButtonText": "PDF"
													}, {
														"sExtends": "csv",
														"sButtonText": "CSV"
													}, {
														"sExtends": "xls",
														"sButtonText": "Excel"
													}, {
														"sExtends": "print",
														"sButtonText": "Print",
														"sInfo": 'Please press "CTR+P" to print or "ESC" to quit',
														"sMessage": "Generated by DataTables"
													}]
												}
											});

											var tableWrapper = jQuery('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}

										// Datatable with TableTools
										function initTable2() {
											var table = jQuery('#sample_2');

											/* Table tools samples: https://www.datatables.net/release-datatables/extras/TableTools/ */

											/* Set tabletools buttons and button container */

											jQuery.extend(true, jQuery.fn.DataTable.TableTools.classes, {
												"container": "btn-group tabletools-btn-group pull-right",
												"buttons": {
													"normal": "btn btn-sm btn-default",
													"disabled": "btn btn-sm btn-default disabled"
												}
											});

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],

												// set the initial value
												"pageLength": 10,
												"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

												"tableTools": {
													"sSwfPath":plugin_path +  "datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
													"aButtons": [{
														"sExtends": "pdf",
														"sButtonText": "PDF"
													}, {
														"sExtends": "csv",
														"sButtonText": "CSV"
													}, {
														"sExtends": "xls",
														"sButtonText": "Excel"
													}, {
														"sExtends": "print",
														"sButtonText": "Print",
														"sInfo": 'Please press "CTRL+P" to print or "ESC" to quit',
														"sMessage": "Generated by DataTables"
													}, {
														"sExtends": "copy",
														"sButtonText": "Copy"
													}]
												}
											});

											var tableWrapper = jQuery('#sample_2_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}

										// Show/Hide Columns
										function initTable3() {
											var table = jQuery('#sample_3');

											/* Formatting function for row expanded details */
											function fnFormatDetails(oTable, nTr) {
												var aData = oTable.fnGetData(nTr);
												var sOut = '<table>';
												sOut += '<tr><td>Platform(s):</td><td>' + aData[2] + '</td></tr>';
												sOut += '<tr><td>Engine version:</td><td>' + aData[3] + '</td></tr>';
												sOut += '<tr><td>CSS grade:</td><td>' + aData[4] + '</td></tr>';
												sOut += '<tr><td>Others:</td><td>Could provide a link here</td></tr>';
												sOut += '</table>';

												return sOut;
											}

											/*
											 * Insert a 'details' column to the table
											 */
											var nCloneTh = document.createElement('th');
											nCloneTh.className = "table-checkbox";
											
											var nCloneTd = document.createElement('td');
											nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

											table.find('thead tr').each(function () {
												this.insertBefore(nCloneTh, this.childNodes[0]);
											});

											table.find('tbody tr').each(function () {
												this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
											});

											var oTable = table.dataTable({
												"columnDefs": [{
													"orderable": false,
													"targets": [0]
												}],
												"order": [
													[1, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												// set the initial value
												"pageLength": 10,
											});

											var tableWrapper = jQuery('#sample_4_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											var tableColumnToggler = jQuery('#sample_4_column_toggler');

											/* modify datatable control inputs */
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

											/* Add event listener for opening and closing details
											 * Note that the indicator for showing which row is open is not controlled by DataTables,
											 * rather it is done here
											 */
											table.on('click', ' tbody td .row-details', function () {
												var nTr = jQuery(this).parents('tr')[0];
												if (oTable.fnIsOpen(nTr)) {
													/* This row is already open - close it */
													jQuery(this).addClass("row-details-close").removeClass("row-details-open");
													oTable.fnClose(nTr);
												} else {
													/* Open this row */
													jQuery(this).addClass("row-details-open").removeClass("row-details-close");
													oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
												}
											});

											/* handle show/hide columns*/
											jQuery('input[type="checkbox"]', tableColumnToggler).change(function () {
												/* Get the DataTables object again - this is not a recreation, just a get of the object */
												var iCol = parseInt(jQuery(this).attr("data-column"));
												var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
												oTable.fnSetColumnVis(iCol, (bVis ? false : true));
											});
										}

										// Scroller
										function initTable4() {

											var table = jQuery('#sample_4');

											/* Fixed header extension: http://datatables.net/extensions/scroller/ */

											var oTable = table.dataTable({
												"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // datatable layout without  horizobtal scroll
												"scrollY": "300",
												"deferRender": true,
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												"pageLength": 10 // set the initial value            
											});


											var tableWrapper = jQuery('#sample_5_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}

										// Columns Reorder
										function initTable5() {

											var table = jQuery('#sample_5');

											/* Fixed header extension: http://datatables.net/extensions/keytable/ */

											var oTable = table.dataTable({
												"order": [
													[0, 'asc']
												],
												"lengthMenu": [
													[5, 15, 20, -1],
													[5, 15, 20, "All"] // change per page values here
												],
												"pageLength": 10, // set the initial value,
												"columnDefs": [{  // set default column settings
													'orderable': false,
													'targets': [0]
												}, {
													"searchable": false,
													"targets": [0]
												}],
												"order": [
													[1, "asc"]
												]           
											});

											var oTableColReorder = new jQuery.fn.dataTable.ColReorder( oTable );

											var tableWrapper = jQuery('#sample_6_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
											tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
										}


										// Init each table
										initTable1();
										initTable2();
										initTable3();
										initTable4();
										initTable5();

									}

								});
							});
						});
					});
				});
			});
		</script>

	</body>
</html>