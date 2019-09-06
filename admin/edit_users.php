<?php
session_start();
include_once 'include/class.admin.php';
$user = new Admin();
$admin = $user->getvalue_admin_login();
$users = $user->getvalue_user();
$profile_value = $user->getvalue_user();

//print_r($profile_value);

if (!$user->is_loggedin()) {
    $user->redirect('index.php');
}

if (isset($_GET['q'])) {
    $user->logout();
    header("location:index.php");
}



$user_id = $_SESSION['user_session'];

if (isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $about = trim($_POST['about']);
    $kikuser = trim($_POST['kikuser']);
    $country = trim($_POST['country']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $phone = trim($_POST['phone']);
    $other_accounts = trim($_POST['other_accounts']);
    $website = trim($_POST['website']);

 
    $myarray = array("fname" => $fname, "lname" => $lname, "about" => $about, "kikuser" => $kikuser, "country" => $country, "email" => $email, "gender" => $gender, "phone" => $phone, "other_accounts" => $other_accounts, "website" => $website);

    try {

        if ($user->update_profile($myarray)) {
            //$setting->redirect('sign-up.php?joined');
            $sucess = 'Data Save Sucessfull';
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
                            <label for="First Name" class="col-sm-2 control-label label-input-lg">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="fname" value="<?php echo $users['fname']; ?>" class="form-control input-lg" id="largeinput" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="Last Name"   class="col-sm-2 control-label label-input-lg">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="lname" value="<?php echo $users['lname']; ?>" class="form-control input-lg" id="largeinput" placeholder="Last Name">
                            </div>
                        </div>
<!--                        <div class="form-group mb-n">
                            <label for="User Name" class="col-sm-2 control-label label-input-lg">User Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="username" value="<?php echo $users['username']; ?>" class="form-control1 input-lg" id="largeinput" placeholder="User Name">
                            </div>
                        </div>-->
                        <div class="form-group mb-n">
                            <label for="Kik User" class="col-sm-2 control-label label-input-lg">Kik User</label>
                            <div class="col-sm-8">
                                <input type="text" name="kikuser" value="<?php echo $users['kikuser']; ?>" class="form-control input-lg" id="largeinput" placeholder="Kik User">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="txtarea1" class="col-sm-2 control-label">About Me</label>
                            <div class="col-sm-8"><textarea name="about" value="<?php echo $users['about']; ?>"   cols="50" rows="10" class="form-control"><?php echo $users['about']; ?></textarea></div>
                        </div>

                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" value="<?php echo $users['email']; ?>" class="form-control input-lg" id="largeinput" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Country" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-8"><select name="country" id="selector1" class="form-control">
                                    <option value="<?php echo $users['country'] ?>">Select Country</option>
                                    <option value="GB" title="United Kingdom">United Kingdom</option>
                                    <option value="US" title="United States">United States</option>
                                    <option value="AF" title="Afghanistan">Afghanistan</option>
                                    <option value="AX" title="Åland Islands">Åland Islands</option>
                                    <option value="AL" title="Albania">Albania</option>
                                    <option value="DZ" title="Algeria">Algeria</option>
                                    <option value="AS" title="American Samoa">American Samoa</option>
                                    <option value="AD" title="Andorra">Andorra</option>
                                    <option value="AO" title="Angola">Angola</option>
                                    <option value="AI" title="Anguilla">Anguilla</option>
                                    <option value="AQ" title="Antarctica">Antarctica</option>
                                    <option value="AG" title="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="AR" title="Argentina">Argentina</option>
                                    <option value="AM" title="Armenia">Armenia</option>
                                    <option value="AW" title="Aruba">Aruba</option>
                                    <option value="AU" title="Australia">Australia</option>
                                    <option value="AT" title="Austria">Austria</option>
                                    <option value="AZ" title="Azerbaijan">Azerbaijan</option>
                                    <option value="BS" title="Bahamas">Bahamas</option>
                                    <option value="BH" title="Bahrain">Bahrain</option>
                                    <option value="BD" title="Bangladesh">Bangladesh</option>
                                    <option value="BB" title="Barbados">Barbados</option>
                                    <option value="BY" title="Belarus">Belarus</option>
                                    <option value="BE" title="Belgium">Belgium</option>
                                    <option value="BZ" title="Belize">Belize</option>
                                    <option value="BJ" title="Benin">Benin</option>
                                    <option value="BM" title="Bermuda">Bermuda</option>
                                    <option value="BT" title="Bhutan">Bhutan</option>
                                    <option value="BO" title="Bolivia">Bolivia</option>
                                    <option value="BA" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="BW" title="Botswana">Botswana</option>
                                    <option value="BV" title="Bouvet Island">Bouvet Island</option>
                                    <option value="BR" title="Brazil">Brazil</option>
                                    <option value="IO" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                    <option value="BN" title="Brunei Darussalam">Brunei Darussalam</option>
                                    <option value="BG" title="Bulgaria">Bulgaria</option>
                                    <option value="BF" title="Burkina Faso">Burkina Faso</option>
                                    <option value="BI" title="Burundi">Burundi</option>
                                    <option value="KH" title="Cambodia">Cambodia</option>
                                    <option value="CM" title="Cameroon">Cameroon</option>
                                    <option value="CA" title="Canada">Canada</option>
                                    <option value="CV" title="Cape Verde">Cape Verde</option>
                                    <option value="KY" title="Cayman Islands">Cayman Islands</option>
                                    <option value="CF" title="Central African Republic">Central African Republic</option>
                                    <option value="TD" title="Chad">Chad</option>
                                    <option value="CL" title="Chile">Chile</option>
                                    <option value="CN" title="China">China</option>
                                    <option value="CX" title="Christmas Island">Christmas Island</option>
                                    <option value="CC" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                    <option value="CO" title="Colombia">Colombia</option>
                                    <option value="KM" title="Comoros">Comoros</option>
                                    <option value="CG" title="Congo">Congo</option>
                                    <option value="CD" title="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                    <option value="CK" title="Cook Islands">Cook Islands</option>
                                    <option value="CR" title="Costa Rica">Costa Rica</option>
                                    <option value="CI" title="Cote D'ivoire">Cote D'ivoire</option>
                                    <option value="HR" title="Croatia">Croatia</option>
                                    <option value="CU" title="Cuba">Cuba</option>
                                    <option value="CY" title="Cyprus">Cyprus</option>
                                    <option value="CZ" title="Czech Republic">Czech Republic</option>
                                    <option value="DK" title="Denmark">Denmark</option>
                                    <option value="DJ" title="Djibouti">Djibouti</option>
                                    <option value="DM" title="Dominica">Dominica</option>
                                    <option value="DO" title="Dominican Republic">Dominican Republic</option>
                                    <option value="EC" title="Ecuador">Ecuador</option>
                                    <option value="EG" title="Egypt">Egypt</option>
                                    <option value="SV" title="El Salvador">El Salvador</option>
                                    <option value="GQ" title="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="ER" title="Eritrea">Eritrea</option>
                                    <option value="EE" title="Estonia">Estonia</option>
                                    <option value="ET" title="Ethiopia">Ethiopia</option>
                                    <option value="FK" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                    <option value="FO" title="Faroe Islands">Faroe Islands</option>
                                    <option value="FJ" title="Fiji">Fiji</option>
                                    <option value="FI" title="Finland">Finland</option>
                                    <option value="FR" title="France">France</option>
                                    <option value="GF" title="French Guiana">French Guiana</option>
                                    <option value="PF" title="French Polynesia">French Polynesia</option>
                                    <option value="TF" title="French Southern Territories">French Southern Territories</option>
                                    <option value="GA" title="Gabon">Gabon</option>
                                    <option value="GM" title="Gambia">Gambia</option>
                                    <option value="GE" title="Georgia">Georgia</option>
                                    <option value="DE" title="Germany">Germany</option>
                                    <option value="GH" title="Ghana">Ghana</option>
                                    <option value="GI" title="Gibraltar">Gibraltar</option>
                                    <option value="GR" title="Greece">Greece</option>
                                    <option value="GL" title="Greenland">Greenland</option>
                                    <option value="GD" title="Grenada">Grenada</option>
                                    <option value="GP" title="Guadeloupe">Guadeloupe</option>
                                    <option value="GU" title="Guam">Guam</option>
                                    <option value="GT" title="Guatemala">Guatemala</option>
                                    <option value="GG" title="Guernsey">Guernsey</option>
                                    <option value="GN" title="Guinea">Guinea</option>
                                    <option value="GW" title="Guinea-bissau">Guinea-bissau</option>
                                    <option value="GY" title="Guyana">Guyana</option>
                                    <option value="HT" title="Haiti">Haiti</option>
                                    <option value="HM" title="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                    <option value="VA" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                    <option value="HN" title="Honduras">Honduras</option>
                                    <option value="HK" title="Hong Kong">Hong Kong</option>
                                    <option value="HU" title="Hungary">Hungary</option>
                                    <option value="IS" title="Iceland">Iceland</option>
                                    <option value="IN" title="India">India</option>
                                    <option value="ID" title="Indonesia">Indonesia</option>
                                    <option value="IR" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                    <option value="IQ" title="Iraq">Iraq</option>
                                    <option value="IE" title="Ireland">Ireland</option>
                                    <option value="IM" title="Isle of Man">Isle of Man</option>
                                    <option value="IL" title="Israel">Israel</option>
                                    <option value="IT" title="Italy">Italy</option>
                                    <option value="JM" title="Jamaica">Jamaica</option>
                                    <option value="JP" title="Japan">Japan</option>
                                    <option value="JE" title="Jersey">Jersey</option>
                                    <option value="JO" title="Jordan">Jordan</option>
                                    <option value="KZ" title="Kazakhstan">Kazakhstan</option>
                                    <option value="KE" title="Kenya">Kenya</option>
                                    <option value="KI" title="Kiribati">Kiribati</option>
                                    <option value="KP" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                    <option value="KR" title="Korea, Republic of">Korea, Republic of</option>
                                    <option value="KW" title="Kuwait">Kuwait</option>
                                    <option value="KG" title="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="LA" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                    <option value="LV" title="Latvia">Latvia</option>
                                    <option value="LB" title="Lebanon">Lebanon</option>
                                    <option value="LS" title="Lesotho">Lesotho</option>
                                    <option value="LR" title="Liberia">Liberia</option>
                                    <option value="LY" title="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                    <option value="LI" title="Liechtenstein">Liechtenstein</option>
                                    <option value="LT" title="Lithuania">Lithuania</option>
                                    <option value="LU" title="Luxembourg">Luxembourg</option>
                                    <option value="MO" title="Macao">Macao</option>
                                    <option value="MK" title="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="MG" title="Madagascar">Madagascar</option>
                                    <option value="MW" title="Malawi">Malawi</option>
                                    <option value="MY" title="Malaysia">Malaysia</option>
                                    <option value="MV" title="Maldives">Maldives</option>
                                    <option value="ML" title="Mali">Mali</option>
                                    <option value="MT" title="Malta">Malta</option>
                                    <option value="MH" title="Marshall Islands">Marshall Islands</option>
                                    <option value="MQ" title="Martinique">Martinique</option>
                                    <option value="MR" title="Mauritania">Mauritania</option>
                                    <option value="MU" title="Mauritius">Mauritius</option>
                                    <option value="YT" title="Mayotte">Mayotte</option>
                                    <option value="MX" title="Mexico">Mexico</option>
                                    <option value="FM" title="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                    <option value="MD" title="Moldova, Republic of">Moldova, Republic of</option>
                                    <option value="MC" title="Monaco">Monaco</option>
                                    <option value="MN" title="Mongolia">Mongolia</option>
                                    <option value="ME" title="Montenegro">Montenegro</option>
                                    <option value="MS" title="Montserrat">Montserrat</option>
                                    <option value="MA" title="Morocco">Morocco</option>
                                    <option value="MZ" title="Mozambique">Mozambique</option>
                                    <option value="MM" title="Myanmar">Myanmar</option>
                                    <option value="NA" title="Namibia">Namibia</option>
                                    <option value="NR" title="Nauru">Nauru</option>
                                    <option value="NP" title="Nepal">Nepal</option>
                                    <option value="NL" title="Netherlands">Netherlands</option>
                                    <option value="AN" title="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="NC" title="New Caledonia">New Caledonia</option>
                                    <option value="NZ" title="New Zealand">New Zealand</option>
                                    <option value="NI" title="Nicaragua">Nicaragua</option>
                                    <option value="NE" title="Niger">Niger</option>
                                    <option value="NG" title="Nigeria">Nigeria</option>
                                    <option value="NU" title="Niue">Niue</option>
                                    <option value="NF" title="Norfolk Island">Norfolk Island</option>
                                    <option value="MP" title="Northern Mariana Islands">Northern Mariana Islands</option>
                                    <option value="NO" title="Norway">Norway</option>
                                    <option value="OM" title="Oman">Oman</option>
                                    <option value="PK" title="Pakistan">Pakistan</option>
                                    <option value="PW" title="Palau">Palau</option>
                                    <option value="PS" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                    <option value="PA" title="Panama">Panama</option>
                                    <option value="PG" title="Papua New Guinea">Papua New Guinea</option>
                                    <option value="PY" title="Paraguay">Paraguay</option>
                                    <option value="PE" title="Peru">Peru</option>
                                    <option value="PH" title="Philippines">Philippines</option>
                                    <option value="PN" title="Pitcairn">Pitcairn</option>
                                    <option value="PL" title="Poland">Poland</option>
                                    <option value="PT" title="Portugal">Portugal</option>
                                    <option value="PR" title="Puerto Rico">Puerto Rico</option>
                                    <option value="QA" title="Qatar">Qatar</option>
                                    <option value="RE" title="Reunion">Reunion</option>
                                    <option value="RO" title="Romania">Romania</option>
                                    <option value="RU" title="Russian Federation">Russian Federation</option>
                                    <option value="RW" title="Rwanda">Rwanda</option>
                                    <option value="SH" title="Saint Helena">Saint Helena</option>
                                    <option value="KN" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="LC" title="Saint Lucia">Saint Lucia</option>
                                    <option value="PM" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                    <option value="VC" title="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                    <option value="WS" title="Samoa">Samoa</option>
                                    <option value="SM" title="San Marino">San Marino</option>
                                    <option value="ST" title="Sao Tome and Principe">Sao Tome and Principe</option>
                                    <option value="SA" title="Saudi Arabia">Saudi Arabia</option>
                                    <option value="SN" title="Senegal">Senegal</option>
                                    <option value="RS" title="Serbia">Serbia</option>
                                    <option value="SC" title="Seychelles">Seychelles</option>
                                    <option value="SL" title="Sierra Leone">Sierra Leone</option>
                                    <option value="SG" title="Singapore">Singapore</option>
                                    <option value="SK" title="Slovakia">Slovakia</option>
                                    <option value="SI" title="Slovenia">Slovenia</option>
                                    <option value="SB" title="Solomon Islands">Solomon Islands</option>
                                    <option value="SO" title="Somalia">Somalia</option>
                                    <option value="ZA" title="South Africa">South Africa</option>
                                    <option value="GS" title="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                    <option value="ES" title="Spain">Spain</option>
                                    <option value="LK" title="Sri Lanka">Sri Lanka</option>
                                    <option value="SD" title="Sudan">Sudan</option>
                                    <option value="SR" title="Suriname">Suriname</option>
                                    <option value="SJ" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="SZ" title="Swaziland">Swaziland</option>
                                    <option value="SE" title="Sweden">Sweden</option>
                                    <option value="CH" title="Switzerland">Switzerland</option>
                                    <option value="SY" title="Syrian Arab Republic">Syrian Arab Republic</option>
                                    <option value="TW" title="Taiwan, Province of China">Taiwan, Province of China</option>
                                    <option value="TJ" title="Tajikistan">Tajikistan</option>
                                    <option value="TZ" title="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                    <option value="TH" title="Thailand">Thailand</option>
                                    <option value="TL" title="Timor-leste">Timor-leste</option>
                                    <option value="TG" title="Togo">Togo</option>
                                    <option value="TK" title="Tokelau">Tokelau</option>
                                    <option value="TO" title="Tonga">Tonga</option>
                                    <option value="TT" title="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="TN" title="Tunisia">Tunisia</option>
                                    <option value="TR" title="Turkey">Turkey</option>
                                    <option value="TM" title="Turkmenistan">Turkmenistan</option>
                                    <option value="TC" title="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                    <option value="TV" title="Tuvalu">Tuvalu</option>
                                    <option value="UG" title="Uganda">Uganda</option>
                                    <option value="UA" title="Ukraine">Ukraine</option>
                                    <option value="AE" title="United Arab Emirates">United Arab Emirates</option>
                                    <option value="UM" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                    <option value="UY" title="Uruguay">Uruguay</option>
                                    <option value="UZ" title="Uzbekistan">Uzbekistan</option>
                                    <option value="VU" title="Vanuatu">Vanuatu</option>
                                    <option value="VE" title="Venezuela">Venezuela</option>
                                    <option value="VN" title="Viet Nam">Viet Nam</option>
                                    <option value="VG" title="Virgin Islands, British">Virgin Islands, British</option>
                                    <option value="VI" title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                    <option value="WF" title="Wallis and Futuna">Wallis and Futuna</option>
                                    <option value="EH" title="Western Sahara">Western Sahara</option>
                                    <option value="YE" title="Yemen">Yemen</option>
                                    <option value="ZM" title="Zambia">Zambia</option>
                                    <option value="ZW" title="Zimbabwe">Zimbabwe</option>
                                </select></div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-8"><select name="gender" id="selector1" class="form-control1">
                                    <option value="<?php echo $users['gender'] ?>">Select Gender</option>

                                    <option value="1" title="Guy">Guy</option>
                                    <option value="2" title="Girl">Girl</option>
                                </select></div>
                        </div>	 


                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Phone</label>
                            <div class="col-sm-8">
                                <input type="text"  name="phone" value="<?php echo $users['phone']; ?>" class="form-control input-lg" id="largeinput" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="Other accounts" class="col-sm-2 control-label label-input-lg">Other accounts</label>
                            <div class="col-sm-8">
                                <input type="text" name="other_accounts" value="<?php echo $users['other_accounts']; ?>" class="form-control input-lg" id="largeinput" placeholder="Other accounts">
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Website</label>
                            <div class="col-sm-8">
                                <input type="text" name="website" value="<?php echo $users['website']; ?>" class="form-control input-lg" id="largeinput" placeholder="Website">
                            </div>
                        </div>
                         <div class="col-sm-8 col-sm-offset-2">
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