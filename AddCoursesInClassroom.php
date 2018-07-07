<?php
    session_start();
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
                    <h1>Add Course in classroom</h1>
                </div>
            </div>
            <div class="row">
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
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
            <?php

                if(isset($_SESSION['message'])):
            ?>
                    <input id="message" type="hidden" value="<?=  $_SESSION['message'];?>">
            <?php
                endif;
                session_destroy();
            ?>

            <?php
            require_once "includes/modals.php"
            ?>
        </div>
        <!----------- /content ----------------------------------------------->
    </div>
    <!----------- wrapper ---------------------------------------------------->


<?php include_once 'includes/footer.php'; ?>