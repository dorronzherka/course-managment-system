
<?php
include_once 'includes/header.php';
include_once 'includes/sidebarAdmin.php'
?>
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-md-12">
            <div class="rows">
                <h1>Exams</h1>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Start date and time</th>
                        <th scope="col">End date and time</th>
                    </tr>
                </thead>
                <tbody id="myTbody">

                </tbody>
            </table>

        </div>

        <div class="col-md-12">
            <button class="btn btn-default" data-toggle="modal" data-target="#modalAddExams" id="saveExam">Add Exam</button>
        </div>

        <?php
        require_once "includes/modals.php"
        ?>
    </section>
</section>

<?php
include_once 'includes/footer.php';
?>
