<h1>Edit Data From Database</h1>
<form id="editUserForm">
    Enter Username(Student ID): <input type="text" id="editUserOrg" name="editUserOrg" required/><br>
    <h3>Enter Any Below To Update the User</h3><br><br>
    Enter New Username(Student ID): <input type="text" id="editUserUser" name="editUserUser"/><br><br>
    Enter New Password: <input type="password" id="editUserPass" name="editUserPass"/><br><br>
    Enter New User Type(1 to 4): <input type="text" id="editUserType" name="editUserType"/><br>
    <input type="submit" name="submit" value"Edit Record"/>
</form>
<div id="editResponse"></div>
<br>
<a href='<?php echo base_url()."mem1/members1" ?>'>Back</a>
<br>
<a href='<?php echo base_url()."main/logout" ?>'>Logout</a>