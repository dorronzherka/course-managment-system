<?php 
include_once 'includes/header.php';
?>

<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-md-12">
            <div class="rows">
                <h1>ExamPoints</h1>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Point</th>
                        <th scope="col">ExamId</th>
                        <th scope="col">StudentId</th>
                    </tr>
                </thead>
                <tbody id="myTbody">

                </tbody>
            </table>
            <button class="btn btn-default" data-toggle="modal" data-target="#modalAddExams">Add ExamPoints</button>
        </div>
        
        <div class="modal fade" id="modalAddExams" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add ExamPoints</h5>
                    </div>
                    <div class="modal-body">
                          <div class="form-group">
                            <label for="name">Points:</label>
                            <input class="form-control" type="text" id="points">
                        </div>
                        <div class="form-group">
                            <label for="desc">ExamId :</label>
                            <select id="examId" name=""></select>
                        </div>
                         <div class="form-group">
                            <label for="desc">StudentId :</label>
                            <select id="studentId" name=""></select>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Cancel</button>
                    <button class="btn" data-dismiss="modal" id="saveBtn">Save</button>
                  </div>
                    
                </div>
            </div>
        </div>
    </section>
</section>

<?php 
include_once 'includes/footer.php';
?>