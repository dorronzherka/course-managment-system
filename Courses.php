<?php include_once 'includes/header.php'; ?>

    <!----------- wrapper ---------------------------------------------------->
    <div id="wrapper">
        <!----------- sidebar ------------------------------------------------>
        <?php require_once "includes/sidebarAdmin.php"?>
        <!----------- /sidebar ----------------------------------------------->

        <!----------- content ------------------------------------------------>
        <div id="page-wrapper">
            <div class="col-md-12">
                <div class="rows">
                    <h1>Courses</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="selectorOfDepartments">Select Deparment:</label>
                    <select name="selectorOfDepartments" id="selectorOfDepartments">

                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                    </tr>
                    </thead>
                    <tbody id="myTbody">

                    </tbody>
                </table>
                <div class="col-md-12 text-center" id="information-text"> <h1> There is no data for courses , please add a  course</h1></div>
            </div>

            <div class="col-md-12 text-center">
                <a class="" id="more">
                    <i class="fa fa-plus fa-4x " aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-md-12">
                <button class="btn btn-default btn-add" data-toggle="modal" data-target="#modalAddCourses">Add courses</button>
            </div>

            <?php
            require_once "includes/modals.php"
            ?>
        </div>
        <!----------- /content ----------------------------------------------->
    </div>
    <!----------- wrapper ---------------------------------------------------->


<?php include_once 'includes/footer.php'; ?>