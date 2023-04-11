<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>iGOT Reports</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- STYLES -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 
    <style {csp-style-nonce}>
    * {
        transition: background-color 300ms ease, color 300ms ease;
    }

    *:focus {
        outline: none;
    }

    html,
    body {
        color: rgba(33, 37, 41, 1);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
        font-size: 16px;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
    }


    section {
        margin: 0 auto;
        max-width: 1100px;
        padding: 2.5rem 1.75rem 3.5rem 1.75rem;
    }

    section h1 {
        margin-bottom: 2.5rem;
    }

    section h2 {
        font-size: 120%;
        line-height: 2.5rem;
        padding-top: 1.5rem;
    }

    section pre {
        background-color: rgba(247, 248, 249, 1);
        border: 1px solid rgba(242, 242, 242, 1);
        display: block;
        font-size: .9rem;
        margin: 2rem 0;
        padding: 1rem 1.5rem;
        white-space: pre-wrap;
        word-break: break-all;
    }

    section code {
        display: block;
    }

    section a {
        color: rgba(221, 72, 20, 1);
    }

    section svg {
        margin-bottom: -5px;
        margin-right: 5px;
        width: 25px;
    }

    .further {
        background-color: rgba(247, 248, 249, 1);
        border-bottom: 1px solid rgba(242, 242, 242, 1);
        border-top: 1px solid rgba(242, 242, 242, 1);
        margin-bottom: 100px;
        padding-bottom: 30px;
    }

    .further h2:first-of-type {
        padding-top: 0;
    }

    



    

    .tab {
        overflow: hidden;
        border: 1px solid #e2693f24;
        background-color: #e2693f24;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: #e36b4200;;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #e2693f17;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #e36c432e;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #c6562f08;
        border-top: none;
        background-color: #c6562f08;
    }

    .submitbutton {
        width: 80%;
        padding: 10px;
        margin: 15px;
        text-align: center;
    }

    .radio {
        font-weight: 500;
        display: inline;
    }

    .report-select {
        width: 50%;
        display: inline;
    }

    .report-type {
        padding: 10px;
        margin: 15px;
        
    }
    </style>
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->


    <!-- CONTENT -->

    <section>



        <div id="body">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'MDO-wise')" id="defaultOpen">MDO-wise Reports</button>
                <button class="tablinks" onclick="openTab(event, 'Course-wise')">Course-wise Reports</button>
                <button class="tablinks" onclick="openTab(event, 'Role-wise')">Role-wise Reports</button>

            </div>

            <div id="MDO-wise" class="tabcontent">
            <form class="form-horizontal login_form" action="/reporting/getMDOReport" method="post">
            <div class="report-type">    
            <label for="mdoReportType">Report type:</label>
            <select name="mdoReportType" class="form-control report-select"  onchange="enable_disable_mdo(this)"  id="mdoReportType">
            <option value="notSelected">-- Select Report Type --</option>
            <?php 
                    $session = \Config\Services::session();
		
                    if($session->get('role')=='SPV_ADMIN') {
                    
                        echo 
                        '
                    <option value="mdoUserCount">MDO-wise user count</option>
                        <option value="mdoUserList">MDO-wise user List</option>
                        <option value="mdoUserEnrolment">MDO-wise user enrolment report</option>
                        <option value="ministryUserEnrolment">User List for all organisations under a ministry</option>
                        '; }
else if($session->get('role')=='MDO_ADMIN') {
                    
    echo '<option value="mdoUserList">User List</option>
    <option value="mdoUserEnrolment">User enrolment report</option>
    <option value="userWiseCount">User-wise enrolment and completion count</option>
    

'; } ?>
                
                        
</select>
</div>
                    <hr />

                    <div class="container ">

                    
                    <!-- <input type="text" id="search" placeholder="Search" class="form-control" /> -->
                    
                    <div id="tbl" >
                    
                    <table class="submitbutton" id="tbl-mdo" >
                    <?php 
                    $session = \Config\Services::session();
		
                    if($session->get('role')=='SPV_ADMIN') {
                        echo '

                        
                    <tr>
                            <td  class="submitbutton">
                            <select name="ministry" class="form-control"  id="ministry">
                        <option value="notSelected">--Select Ministry--</option>';
                        
                    foreach($ministry as $row)
                    {
                        echo '<option value="'.$row->ms_id.'">'.$row->ministry_state_name.'</option>';
                    }
                    
                    echo '	
                    </select>
                        
                        </td>
                            </tr>
                            <tr>
                            <td class="submitbutton">
                                <select name="dept" class="form-control" id="dept">
                        <option value="notSelected">--Select Department--</option>
                        </select>
                            </td>
                            </tr>
                            <tr>
                             <td class="submitbutton">
                               <select name="org" class="form-control" id="org">
                        <option value="notSelected">--Select Organisation--</option>
                        </select>
                        
                            </td>
                        </tr>';
              
                    } ?>

</table>
                </div>
                        <div class="col-xs-3 container submitbutton">
                            <button class="btn btn-primary " type="submit" name="Submit" value="Submit"> Submit</button>
                        </div>

                    </div>

                    <?php echo form_close(); ?>
                </form>


            </div>


            <div id="Course-wise" class="tabcontent">

                
                <form class="form-horizontal login_form" action="/reporting/getCourseReport" method="post">

                <div class="report-type">    
            <label for="courseReportType">Report type:</label>

                <select name="courseReportType"  class="form-control report-select" onchange="enable_disable_course(this)" id="mdoReportType">
                        <option value="notSelected">-- Select Report Type --</option>
                        <option value="courseEnrolmentReport">Course-wise enrolment report</option>
                        <option value="courseEnrolmentCount">Course-wise enrolment and completion count</option>
                        <option value="programEnrolmentReport">Program-wise enrolment report</option>
                        <option value="programEnrolmentCount">Program-wise enrolment and completion count</option>
                        <option value="collectionEnrolmentReport">Curated Collection-wise enrolment report</option>
                        <option value="collectionEnrolmentCount">Curated Collection-wise enrolment and completion count</option>
                        </select>
                
            </div>
                   

                    <hr />

                    <div class="container">
                        <table class="submitbutton" id="tbl-course">
                            <tr>
                                <td>
                                    <label for="course">Course/Program/Collection: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="submitbutton">
                                    <select name="course" id="course" class="form-control">
                                        <option value="notSelected">--Select Course / Program / Collection--</option>
                                        <?php
                                foreach($course as $row)
                                {
                                    echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
                                }
                                ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <div class="col-xs-3 container submitbutton">
                            <button class="btn btn-primary " type="submit" name="Submit" value="Submit"> Submit</button>
                        </div>

                    </div>

                    <?php echo form_close(); ?>
                </form>
            </div>
       
            <div id="Role-wise" class="tabcontent">
            <form class="form-horizontal login_form" action="/reporting/getRoleReport" method="post">
            <div class="report-type">    
            <label for="roleReportType">Report type:</label>
                    <?php 
                    $session = \Config\Services::session();
		
                    if($session->get('role')=='SPV_ADMIN') {
                    
                        echo '<select name="roleReportType" class="form-control report-select"  onchange="enable_disable_mdo(this)"  id="roleReportType">
                        <option value="notSelected">-- Select Report Type --</option>
                        <option value="roleWiseCount">Role-wise count</option>
                        <option value="monthWiseMDOAdminCount">Month-wise MDO ADMIN Creation Count</option>
                        <option value="mdoAdminList">MDO ADMIN List</option>
                        <option value="cbpAdminList">CBP ADMIN List</option>
                        <option value="creatorList">CONTENT CREATOR List</option>
                        <option value="reviewerList">CONTENT REVIEWER List</option>
                        <option value="publisherList">CONTENT PUBLISHER List</option>
                        <option value="editorList">EDITOR List</option>
                        <option value="fracAdminList">FRAC ADMIN List</option>
                        <option value="fracCompetencyMember">FRAC COMPETENCY MEMBER List</option>
                        <option value="fracL1List">FRAC REVIEWER L1 List</option>
                        <option value="fracL2List">FRAC REVIEWER L2 List</option>
                        <option value="ifuMemberList">IFU MEMBER List</option>
                        <option value="publicList">PUBLIC User List</option>
                        <option value="spvAdminList">SPV ADMIN List</option>
                        <option value="stateAdminList">STATE ADMIN List</option>
                        <option value="watMemberList">WAT MEMBER List</option>
                        </select>
                
'; }
else if($session->get('role')=='MDO_ADMIN') {
                    
    echo '<select name="roleReportType" class="form-control  report-select" id="roleReportType" >
    <option value="notSelected">-- Select Report Type --</option>
    <option value="roleWiseCount">Role-wise count</option>
    <option value="mdoAdminList">MDO ADMIN List</option>
    <option value="cbpAdminList">CBP ADMIN List</option>
    <option value="creatorList">CONTENT CREATOR List</option>
    <option value="reviewerList">CONTENT REVIEWER List</option>
    <option value="publisherList">CONTENT PUBLISHER List</option>
    <option value="publicList">PUBLIC User List</option>
                        
                        </select>

'; } ?>
</div>
                    <hr />

                    <div class="container ">
                    <!-- <input type="text" id="search" placeholder="Search" class="form-control" /> -->
                    
                        

                        <div class="col-xs-3 container submitbutton">
                            <button class="btn btn-primary " type="submit" name="Submit" value="Submit"> Submit</button>
                        </div>

                    </div>

                    <?php echo form_close(); ?>
                </form>


            </div>

        </div>


    </section>
    <!-- <div class="further">

        <section>
            <table id='report' class='display dataTable'>
                

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Organisation</th>
                        <th>Email ID</th>
                        <th>Status</th>
                        <th>Completion Percentage</th>
                        <th>Completed On</th>
                    </tr>
                </thead>

            </table>


        </section>

    </div> -->

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->



    <!-- SCRIPTS -->

    <script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
    document.getElementById("defaultOpen").click();

    function openTab(evt, reprotName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(reprotName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function enable_disable_mdo(value) {
        
        mdo = document.getElementById('tbl');
        
        mdo.style.display = value.value == "mdoUserCount" ? "none" : "block";
        
    }
     
    function enable_disable_course(value) {
        course =document.getElementById("tbl-course");
        if(value.value == "courseEnrolmentCount" || value.value == "programEnrolmentCount"){
            course.style.display = "none";
        }
        else {
            course.style.display = "block";
        }
        
    }

    $('.search').select2({
        placeholder: 'Search Organisation',
        ajax: {
          url: '<?php echo base_url('/search');?>',
          dataType: 'json',
          processResults: function(data){
            return {
              results: data
            };
          },
          cache: true
        }
      });

    function getSuggestions(value) {
        var searchKey= value.value;
        var action = 'search';

        //alert(value.value);
        display = document.getElementById('display');
        $.ajax({
                    url: "<?php echo base_url('/action'); ?>",
                    method: "POST",
                    data: {
                        key: searchKey,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        html='<ul>';
                        for (var count = 0; count < data.length; count++) {

                            html += '<li>' + data[count].org_name + '</li>';

                        }
html+='</ul>';
                        $('#display').html(html);
                    }
                });
        
        
    }
   
    $(document).ready(function() {

        $('#ministry').change(function() {

            var ministry = $('#ministry').val();

            var action = 'get_dept';

            if (ministry != 'notSelected') {
                $.ajax({
                    url: "<?php echo base_url('/action'); ?>",
                    method: "POST",
                    data: {
                        ministry: ministry,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html =
                            '<option value="notSelected">--Select Department--</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].dep_id + '">' + data[
                                count].dep_name + '</option>';

                        }

                        $('#dept').html(html);
                    }
                });
            } else {
                $('#dept').val('notSelected');
            }
            $('#org').val('notSelected');
        });

        $('#dept').change(function() {

            var dept = $('#dept').val();


            var action = 'get_org';

            if (dept != 'notSelected') {
                $.ajax({
                    url: "<?php echo base_url('/action'); ?>",
                    method: "POST",
                    data: {
                        dept: dept,
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html =
                            '<option value="notSelected">--Select Organisation--</option>';

                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].org_id + '">' + data[
                                count].org_name + '</option>';
                        }

                        $('#org').html(html);
                    }
                });
            } else {
                $('#org').val('notSelected');
            }

        });

    });


    $(document).ready(function() {



        $('select[name=courseReportType]').change(function() {

            if (this.value == 'courseEnrolmentReport') {
                var action = 'get_course';

                $.ajax({
                    url: "<?php echo base_url('/action'); ?>",
                    method: "POST",
                    data: {
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html =
                            '<option value="notSelected">--Select Course--</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].course_id + '">' + data[
                                count].course_name + '</option>';

                        }

                        $('#course').html(html);
                    }
                });

            } else if (this.value == 'programEnrolmentReport') {

                var action = 'get_program';

                $.ajax({
                    url: "<?php echo base_url('/action'); ?>",
                    method: "POST",
                    data: {
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html =
                            '<option value="notSelected">--Select Program--</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].program_id + '">' +
                                data[
                                    count].program_name + '</option>';

                        }

                        $('#course').html(html);
                    }
                });

            } else if (this.value == 'collectionEnrolmentReport' || this.value == "collectionEnrolmentCount") {

                var action = 'get_collection';

                $.ajax({
                    url: "<?php echo base_url('/action'); ?>",
                    method: "POST",
                    data: {
                        action: action
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var html =
                            '<option value="notSelected">--Select Curated Collection--</option>';

                        for (var count = 0; count < data.length; count++) {

                            html += '<option value="' + data[count].curated_id + '">' + data[count].curated_name + '</option>';

                        }

                        $('#course').html(html);
                    }
                });

                
            }

        });



    });


    

    </script>

    <!-- -->

</body>

</html>