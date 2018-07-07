<?php
include_once 'includes/header.php';
?>
<!----------- wrapper ---------------------------------------------------->
<div id="wrapper">
    <!----------- sidebar ------------------------------------------------>
    <?php require_once "includes/sidebarAdmin.php"?>
    <!----------- /sidebar ----------------------------------------------->

    <!----------- content ------------------------------------------------>
    <div id="page-wrapper">
        <div class="col-md-12">
            <div class="rows">
                <h1>Teachers</h1>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody id="myTbody">

                </tbody>
            </table>
            <div class="col-md-12 text-center" id="information-text"> <h1> There is no data for teachers , please add a  teacher</h1></div>
        </div>
        <div class="col-md-12 text-center">
            <a class="" id="more">
                <i class="fa fa-plus fa-4x " aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-md-12">
            <button class="btn btn-default btn-add" data-toggle="modal" data-target="#modalAddTeacher">Add a teacher</button>
        </div>

        <?php
        require_once "includes/modals.php"
        ?>
    </div>
    <!----------- /content ----------------------------------------------->
</div>
<!----------- wrapper ---------------------------------------------------->


<?php include_once 'includes/footer.php'; ?>
