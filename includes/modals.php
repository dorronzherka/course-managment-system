<?php
if(strpos($_SERVER['REQUEST_URI'] , "Departments.php") == true){
    ?>
    <!---- Modals for Deparments -------------------------------->
    <div class="modal fade" id="modalAddDepartments" tabindex="-1">
     <div class="modal-dialog" role="document">
         <div class="modal-content">

             <div class="modal-header">
                 <h5 class="modal-title">Add Department</h5>
             </div>
             <div class="modal-body">
                 <div class="form-group">
                     <label for="name">Name:</label>
                     <input class="form-control" type="text" id="name">
                 </div>
                 <div class="form-group">
                     <label for="desc">Description:</label>
                     <textarea class="form-control" id="desc"></textarea>
                 </div>
             </div>
             <div class="modal-footer">
                 <button class="btn" data-dismiss="modal">Cancel</button>
                 <button  class="btn btn-action" id="button-blla" data-dismiss="modal"> Save</button>
             </div>

         </div>
     </div>
 </div>

 <div class="modal fade" id="modalMessage" tabindex="-1">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-titlee">Message</h5>
             </div>
             <div class="modal-body">
                 <p id="message"></p>
             </div>
             <div class="modal-footer">
                 <button class="btn" data-dismiss="modal" >Ok</button>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="modalConfirmationBox" tabindex="-1">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5>Confirmation</h5>
             </div>
             <div class="modal-body">
                 <p id="message">
                     Are you sure to delete this ?
                 </p>
             </div>
             <div class="modal-footer">
                 <button class="btn" data-dismiss="modal" >No</button>
                 <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="departmentModal" tabindex="-1">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Department</h5>
             </div>
             <div class="modal-body">
                 <h3 class="departmentTitle">

                 </h3>
                 <p class="departmentDescrption">

                 </p>
             </div>
             <div class="modal-footer">
                 <button class="btn" data-dismiss="modal">Cancel</button>
                 <button class="btn" id="deleteBtn" data-dismiss="modal" >Delete</button>
                 <button class="btn" id="editBtn" data-dismiss="modal" >Edit</button>
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="modalError" tabindex="-1">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-titlee">Error</h5>
             </div>
             <div class="modal-body">
                 <p id="message"></p>
             </div>
             <div class="modal-footer">
                 <button class="btn" data-dismiss="modal" >Ok</button>
             </div>
         </div>
     </div>
 </div>
 <!---- /Modals for Deparments -------------------------------->
 <?php } else if(strpos($_SERVER['REQUEST_URI'] , "Courses.php") == true){?>
 <!---- Modals for Courses -------------------------------->
 <div class="modal fade" id="modalAddCourses" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Course</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name">
                </div>

                <div class="form-group">
                    <label for="desc">Cost :</label>
                    <input class="form-control" type="text" id="cost">
                </div>

                <div class="form-group">
                    <label for="desc">Deparment:</label>
                    <select id="deparmentSelection" name="departmentId">
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-close" data-dismiss="modal">Cancel</button>
                <button class="btn btn-action" data-dismiss="modal" id="saveBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCourse" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Course</h5>
            </div>
            <div class="modal-body">
                <p class="informationline">
                    <span class="label">Name:</span>
                    <span class="value" id="name"></span>
                </p>
                <p class="informationline">
                    <span class="label">Cost:</span>
                    <span class="value" id="cost"></span>
                </p>
                <p class="informationline">
                    <span class="label">Department:</span>
                    <span class="value" id="dep"></span>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-close" data-dismiss="modal">Cancel</button>
                <button class="btn btn-close" id="deleteBtn" data-dismiss="modal">Delete</button>
                <button class="btn" data-dismiss="modal" id='enrolledStudents' > Enrolled Students</button>
                <button class="btn" data-dismiss="modal" id="editBtn">Edit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">Message</h5>
         </div>
         <div class="modal-body">
             <p id="message"></p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5>Confirmation</h5>
         </div>
         <div class="modal-body">
             <p id="message">
                 Are you sure to delete this ?
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >No</button>
             <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalError" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">Error</h5>
         </div>
         <div class="modal-body">
             <p id="message"></p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="ListOfStudents" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">List of students</h5>
         </div>
         <div class="modal-body">
             <table class="table table-hover" id="tableOfStudents">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">First Name</th>
                         <th scope="col">Last Name</th>
                         <th scope="col"></th>
                         <th scope="col"></th>
                     </tr>
                 </thead>
                 <tbody id="myTbody">

                 </tbody>
             </table>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>

<!---- /Modals for Courses -------------------------------->
<!---- Modals for Users -------------------------------->
<?php
} else if(strpos($_SERVER['REQUEST_URI'] , "Users.php") == true){?>
<div class="modal fade" id="modalAddUserViaGoogle" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Add Course</h5>
         </div>
         <div class="modal-body">
            <p>Add a user via Goole.</p>
        </div>

        <div class="modal-footer">
         <button class="btn btn-close" data-dismiss="modal">Cancel</button>
         <div class="g-signin2">Sigin</div>
     </div>
 </div>
</div>
</div>

<div class="modal fade" id="modalUserInfoRegistration" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Course</h5>
         </div>
         <div class="modal-body">
             <p class="informationline">
                 <span class="label">Name:</span>
                 <span class="value" id="name"></span>
             </p>
             <p class="informationline">
                 <span class="label">Email:</span>
                 <span class="value" id="cost"></span>
             </p>
             <p class="informationline">
                 <span class="label">Department:</span>
                 <span class="value" id="dep"></span>
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn btn-close" data-dismiss="modal">Cancel</button>
             <button class="btn btn-close" id="deleteBtn" data-dismiss="modal">Delete</button>
             <button class="btn" data-dismiss="modal" id="addButton">Add</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">Message</h5>
         </div>
         <div class="modal-body">
             <p id="message"></p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5>Confirmation</h5>
         </div>
         <div class="modal-body">
             <p id="message">
                 Are you sure to delete this ?
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >No</button>
             <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalError" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">Error</h5>
         </div>
         <div class="modal-body">
             <p id="message"></p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>
<!---- /Modals for Users -------------------------------->
<!---- Modals for Teachers -------------------------------->
<?php } else if(strpos($_SERVER['REQUEST_URI'] , "Teachers.php") == true){?>
<div class="modal fade" id="modalAddTeacher" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Teacher</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Profile Image:</label>
                    <input type="file"  id="imageToUpload"/>
                </div>

                <div class="form-group">
                    <label for="name">First Name:</label>
                    <input class="form-control" type="text" id="firstName">
                </div>
                <div class="form-group">
                    <label for="name">Last Name:</label>
                    <input class="form-control" type="text" id="lastName">
                </div>

                <div class="form-group">
                    <label for="name">Date of birth:</label>
                    <input type="date" class="form-control" id="dateofbirth"/>
                </div>

                <div class="form-group">
                    <label for="name">Gender:</label>
                    <input type="radio" class="m" id="gender" name="gender" value="M">Male
                    <input type="radio" class="f" id="gender" name="gender"  value="F">Female
                </div>

                <div class="form-group">
                    <label for="name">Email:</label>
                    <input class="form-control" type="text" id="email">
                </div>

                <div class="form-group">
                    <label for="name">Phone Number:</label>
                    <input type="text" class="form-control" id="phoneNumber"/>
                </div>

                <div class="form-group">
                    <label for="name">Address:</label>
                    <input class="form-control" type="text" id="address">
                </div>
                <div class="form-group">
                    <label for="name">City:</label>
                    <input class="form-control" type="text" id="city">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-close" data-dismiss="modal">Cancel</button>
                <button class="btn btn-action" data-dismiss="modal" id="saveBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTeacher" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Teacher</h5>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-responsive img-circle center-block" id="imgProfile">
                <p class="informationline">
                    <span class="label">First Name:</span>
                    <span class="value" id="firstName"></span>
                </p>
                <p class="informationline">
                    <span class="label">Last Name:</span>
                    <span class="value" id="lastName"></span>
                </p>
                <p class="informationline">
                    <span class="label">Email:</span>
                    <span class="value" id="email"></span>
                </p>
                <p class="informationline">
                    <span class="label">Birth date:</span>
                    <span class="value" id="dateOfBirth"></span>
                </p>
                <p class="informationline">
                    <span class="label">Address:</span>
                    <span class="value" id="address"></span>
                    <span class="value" id="city"></span>
                </p>
                <p class="informationline">
                    <span class="label">Gender:</span>
                    <span class="value" id="gender"></span>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-close" data-dismiss="modal">Cancel</button>
                <button class="btn btn-close" id="deleteBtn" data-dismiss="modal">Delete</button>
                <button class="btn" data-dismiss="modal" id="editBtn">Edit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirmation</h5>
            </div>
            <div class="modal-body">
                <p id="message">
                    Are you sure to delete this ?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >No</button>
                <button class="btn" data-dismiss="modal" id="yesButton">Yes</button>
            </div>
        </div>
    </div>
</div>
<?php }else if(strpos($_SERVER['REQUEST_URI'] , "Students.php") == true){?>
<div class="modal fade" id="modalAddStudent" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Add Student</h5>
         </div>
         <div class="modal-body">
             <div class="form-group">
                 <label for="name">Profile Image:</label>
                 <input type="file"  id="imageToUpload"/>
             </div>

             <div class="form-group">
                 <label for="name">First Name:</label>
                 <input class="form-control" type="text" id="firstName">
             </div>
             <div class="form-group">
                 <label for="name">Last Name:</label>
                 <input class="form-control" type="text" id="lastName">
             </div>

             <div class="form-group">
                 <label for="name">Date of birth:</label>
                 <input type="date" class="form-control" id="dateofbirth"/>
             </div>

             <div class="form-group">
                 <label for="name">Gender:</label>
                 <input type="radio" class="m" id="gender" name="gender" value="M">Male
                 <input type="radio" class="f" id="gender" name="gender"  value="F">Female
             </div>

             <div class="form-group">
                 <label for="name">Email:</label>
                 <input class="form-control" type="text" id="email">
             </div>

             <div class="form-group">
                 <label for="name">Phone Number:</label>
                 <input type="text" class="form-control" id="phoneNumber"/>
             </div>

             <div class="form-group">
                 <label for="name">Address:</label>
                 <input class="form-control" type="text" id="address">
             </div>
             <div class="form-group">
                 <label for="name">City:</label>
                 <input class="form-control" type="text" id="city">
             </div>
         </div>

         <div class="modal-footer">
             <button class="btn btn-close" data-dismiss="modal">Cancel</button>
             <button class="btn btn-action" data-dismiss="modal" id="saveBtn">Save</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalStudent" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Student</h5>
         </div>
         <div class="modal-body">
             <img src="" alt="" class="img-responsive img-circle center-block" id="imgProfile">
             <p class="informationline">
                 <span class="label">First Name:</span>
                 <span class="value" id="firstName"></span>
             </p>
             <p class="informationline">
                 <span class="label">Last Name:</span>
                 <span class="value" id="lastName"></span>
             </p>
             <p class="informationline">
                 <span class="label">Email:</span>
                 <span class="value" id="email"></span>
             </p>
             <p class="informationline">
                 <span class="label">Birth date:</span>
                 <span class="value" id="dateOfBirth"></span>
             </p>
             <p class="informationline">
                 <span class="label">Address:</span>
                 <span class="value" id="address"></span>
                 <span class="value" id="city"></span>
             </p>
             <p class="informationline">
                 <span class="label">Gender:</span>
                 <span class="value" id="gender"></span>
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn btn-close" data-dismiss="modal">Cancel</button>
             <button class="btn btn-close" id="deleteBtn" data-dismiss="modal">Delete</button>
             <button class="btn" data-dismiss="modal" id="editBtn">Edit</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">Message</h5>
         </div>
         <div class="modal-body">
             <p id="message"></p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5>Confirmation</h5>
         </div>
         <div class="modal-body">
             <p id="message">
                 Are you sure to delete this ?
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >No</button>
             <button class="btn" data-dismiss="modal" id="yesButton">Yes</button>
         </div>
     </div>
 </div>
</div>

<!---- /Modals for Users -------------------------------->
<!---- Modals for Employee -------------------------------->
<?php }else if(strpos($_SERVER['REQUEST_URI'] , "Employees.php") == true){?>
<div class="modal fade" id="modalAddEmployee" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Add Employee</h5>
         </div>
         <div class="modal-body">
             <div class="form-group">
                 <label for="name">Profile Image:</label>
                 <input type="file"  id="imageToUpload"/>
             </div>

             <div class="form-group">
                 <label for="name">First Name:</label>
                 <input class="form-control" type="text" id="firstName">
             </div>
             <div class="form-group">
                 <label for="name">Last Name:</label>
                 <input class="form-control" type="text" id="lastName">
             </div>

             <div class="form-group">
                 <label for="name">Date of birth:</label>
                 <input type="date" class="form-control" id="dateofbirth"/>
             </div>

             <div class="form-group">
                 <label for="name">Gender:</label>
                 <input type="radio" class="m" id="gender" name="gender" value="M">Male
                 <input type="radio" class="f" id="gender" name="gender"  value="F">Female
             </div>

             <div class="form-group">
                 <label for="name">Email:</label>
                 <input class="form-control" type="text" id="email">
             </div>

             <div class="form-group">
                 <label for="name">Phone Number:</label>
                 <input type="text" class="form-control" id="phoneNumber"/>
             </div>

             <div class="form-group">
                 <label for="name">Address:</label>
                 <input class="form-control" type="text" id="address">
             </div>
             <div class="form-group">
                 <label for="name">City:</label>
                 <input class="form-control" type="text" id="city">
             </div>
             <div class="form-group">
                 <label for="name">Job:</label>
                 <input class="form-control" type="text" id="job">
             </div>
         </div>

         <div class="modal-footer">
             <button class="btn btn-close" data-dismiss="modal">Cancel</button>
             <button class="btn btn-action" data-dismiss="modal" id="saveBtn">Save</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalEmployee" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Employee</h5>
         </div>
         <div class="modal-body">
             <img src="" alt="" class="img-responsive img-circle center-block" id="imgProfile">
             <p class="informationline">
                 <span class="label">First Name:</span>
                 <span class="value" id="firstName"></span>
             </p>
             <p class="informationline">
                 <span class="label">Last Name:</span>
                 <span class="value" id="lastName"></span>
             </p>
             <p class="informationline">
                 <span class="label">Email:</span>
                 <span class="value" id="email"></span>
             </p>
             <p class="informationline">
                 <span class="label">Birth date:</span>
                 <span class="value" id="dateOfBirth"></span>
             </p>
             <p class="informationline">
                 <span class="label">Address:</span>
                 <span class="value" id="address"></span>
                 <span class="value" id="city"></span>
             </p>
             <p class="informationline">
                 <span class="label">Job:</span>
                 <span class="value" id="Job"></span>
             </p>
             <p class="informationline">
                 <span class="label">Gender:</span>
                 <span class="value" id="gender"></span>
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn btn-close" data-dismiss="modal">Cancel</button>
             <button class="btn btn-close" id="deleteBtn" data-dismiss="modal">Delete</button>
             <button class="btn" data-dismiss="modal" id="editBtn">Edit</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-titlee">Message</h5>
         </div>
         <div class="modal-body">
             <p id="message"></p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >Ok</button>
         </div>
     </div>
 </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5>Confirmation</h5>
         </div>
         <div class="modal-body">
             <p id="message">
                 Are you sure to delete this ?
             </p>
         </div>
         <div class="modal-footer">
             <button class="btn" data-dismiss="modal" >No</button>
             <button class="btn" data-dismiss="modal" id="yesButton">Yes</button>
         </div>
     </div>
 </div>
</div>
<?php }else if(strpos($_SERVER['REQUEST_URI'] , "exams.php") == true){?>
<!---- /Modals for Employees -------------------------------->
<!-- -- Modals for Exams -------------------------------->

<div class="modal fade" id="modalAddExams" tabindex="-1">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add exams</h5>
            </div>
            <form id="myform" data-parsley-validate>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" name='name' id="name">
                    </div>
                    <div class="form-group">
                      <label for="stdt">Start Date And Time</label>
                      <input class="form-control" type="datetime-local" id="stdt">
                  </div>
                  <div class="form-group">
                    <label for="endt">End Date and Time:</label>
                    <input class="form-control" type="datetime-local" id="endt">
                </div>
                <div class="form-group">
                    <label for="desc">Course:</label>
                    <select id="courseSelection" name="courseId">
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-action" id="button-blla" data-dismiss="modal"> Save</button>
            </div>
        </form>
    </div>
</div>
</div>
<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirmation</h5>
            </div>
            <div class="modal-body">
                <p id="message">
                    Are you sure to delete this ?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >No</button>
                <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="examModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Exam</h5>
            </div>
            <div class="modal-body">
                <h3 class="examTitle">

                </h3>
                <p class="examName">

                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Cancel</button>
                <button class="btn" id="deleteBtn" data-dismiss="modal" >Delete</button>
                <button class="btn" id="editBtn" data-dismiss="modal" >Edit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalError" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Error</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>
<!---- /Modals for Employees -------------------------------->
<?php }else if(strpos($_SERVER['REQUEST_URI'] , "AddCoursesInClassroom.php") == true){?>

<!-- -- Modals for Classroom -------------------------------->

<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>


<?php }else if(strpos($_SERVER['REQUEST_URI'] , "enroll-student-in-course.php") == true){?>

<!-- -- Modals for Classroom -------------------------------->

<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEnroll" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enroll Student</h5>
            </div>
            <div class="modal-body">
                <select id="selectCourses">
                    <option value="0">Select a course</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Cancel</button>
                <button class="btn" id="save" data-dismiss="modal" >Save</button>
            </div>
        </div>
    </div>
</div>


<?php }else if (strpos($_SERVER['REQUEST_URI'], "examPoints.php") == true) { ?>
<div class="modal fade" id="modalAddExamPoints" tabindex=-1>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add ExamPoints</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="points">Points</label>
                    <input class="form-control" type="text" id="points">
                </div>

                <div class="form-group">
                    <label for="examSelection">ExamID:</label>
                    <select id="examSelection" name="examId">
                    </select>
                </div>

                <div class="form-group">
                    <label for="studentSelection">StudentID:</label>
                    <select id="studentSelection" name="studentId">
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-close" data-dismiss="modal">Cancel</button>
                <button class="btn btn-action" data-dismiss="modal" id="saveBtn">Save</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirmation</h5>
            </div>
            <div class="modal-body">
                <p id="message">
                    Are you sure to delete this ?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >No</button>
                <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="examsPointsModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Exam Points</h5>
    </div>
    <div class="modal-body">
        <p class="informationline">
          <span class="label">Points</span>
          <span class="value" id="points"></span>
      </p>
      <p class="informationline">
          <span class="label">Examid</span>
          <span class="value" id="examid"></span>
      </p>
      <p class="informationline">
        <span class="label">StudentId</span>
        <span class="value" id="studentid"></span>
    </p>
</div>
<div class="modal-footer">
  <button class="btn btn-close" data-dismiss="modal">Cancel</button>
  <button class="btn btn-close" id="deleteBtn" data-dismiss="modal">Delete</button>
  <button class="btn" data-dismiss="modal" id="editBtn">Edit</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirmation</h5>
            </div>
            <div class="modal-body">
                <p id="message">
                    Are you sure to delete this ?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >No</button>
                <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalError" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Error</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>


<?php }else if(strpos($_SERVER['REQUEST_URI'] , "exams.php") == true){?>

<!---- /Modals for Employees -------------------------------->
<!-- -- Modals for Exams -------------------------------->

<div class="modal fade" id="modalAddExams" tabindex="-1">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Exam</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name">
                </div>
                <div class="form-group">
                  <label for="stdt">Start Date And Time</label>
                  <input class="form-control" type="datetime" id="stdt">
              </div>
              <div class="form-group">
                <label for="endt">End Date and Time:</label>
                <input class="form-control" type="datetime" id="endt">
            </div>
            <div class="form-group">
                <label for="desc">Course:</label>
                <select id="courseSelection" name="courseId">
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal">Cancel</button>
            <button class="btn btn-action" id="button-blla" data-dismiss="modal"> Save</button>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="modalMessage" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Message</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalConfirmationBox" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirmation</h5>
            </div>
            <div class="modal-body">
                <p id="message">
                    Are you sure to delete this ?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >No</button>
                <button class="btn" data-dismiss="modal" id="deleteButton">Yes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="examModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Exam</h5>

            </div>
            <div class="modal-body">
              <label>Exam Name</label>
              <h3 class="examname">

              </h3>
          </br>
          <label>Start Date :</label>
          <h3 class="startdateandtime">

          </h3>
      </br>
      <label>End Date :</label>
      <h3 class="enddateandtime">

      </h3>
  </br>
  <label>Course id :</label>
  <h3 class="courseid">

  </h3>
</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <button class="btn" id="deleteBtn" data-dismiss="modal" >Delete</button>
    <button class="btn" id="editBtn" data-dismiss="modal" >Edit</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="modalError" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-titlee">Error</h5>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" >Ok</button>
            </div>
        </div>
    </div>
</div>
<?php
}?>