<?php

include_once 'includes/register.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
        <style>
body{
    width:1000px;
    font-family:calibri;
}
.demo-table {
    background: #d9eeff;
    width: 100%;
    border-spacing: initial;
    margin: 2px 0px;
    word-break: break-word;
    table-layout: auto;
    line-height: 1.8em;
    color: #333;
    border-radius: 8px;
    padding: 20px 40px;
}
.demo-table td {
    padding: 15px 0px;
}
.demoInputBox {
    padding: 5px 30px;
    border: #a9a9a9 1px solid;
    border-radius: 5px;
}
.btnRegister {
    padding: 10px 30px;
    background-color: #3367b2;
    border: 0;
    color: #FFF;
    cursor: pointer;
    border-radius: 4px;
    margin-left: 10px;
}   
    </style>
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Request Course</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
<form name="registration_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <div class="container">
        
        <table border="0" width="100" align="center" class="demo-table">
        <tr>
    <label for="Roll_No"><td><b>Roll No.:  </b></td></label>
    <td>
    <input type="number" class="demoInputBox" placeholder="Enter Your Roll No." name="Roll_No" >
    </td>
    </tr>
    
        <tr>
    <label for="ID"><td><b>Course ID:  </b></td></label> 
    <td>
    <input type="number" class="demoInputBox" placeholder="Enter Course ID" name="ID" >    
    </td>
    </tr>
    
    <tr>
    <label for="As"><td><b>Course AS:</b></td></label>
    <td>
    <select name="As" class="demoInputBox">
            <option value="OE">OE</option>
            <option value="DE">DE</option>
            <option value="DC">DC</option>
        <option value="HSS-1">HSS-1</option>
        <option value="PG-Course">PG-Course</option>
        <option value="HSS-2">HSS-2</option>
            </select>   
    </td>
    </tr>
    
    
    <tr>
    <label for="ctype"><td><b>Course Type:</b></td></label>
    <td>
    <select name="ctype" class="demoInputBox">
            <option value="Fresh">Fresh</option>
            <option value="Repeat">Repeat</option>
            <option value="Extra">Extra</option>
            </select>   
    </td>
    </tr>
    
    <tr>
    <label for="prewaiver"><td><b>Preq_waiver:</b></td></label>
    <td>
    <select name="prewaiver" class="demoInputBox">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            </select>    
    </td>
    </tr>

        <tr>
    <label for="year"><td><b>Academic_Year:</b></td></label>
    <td>
    <select name="year" class="demoInputBox">
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            </select>   
    </td>
    </tr>
    <tr>
    <label for="Sem"><td><b>Semester:</b></td></label>
    <td>
    <select name="Sem" class="demoInputBox">
            <option value="Even Semester">Even Semester</option>
            <option value="Odd Semester">Odd Semester</option>
            </select>   
    </td> 
    </tr>
    
    <tr>
    <td colspan=2>
      <input type="button" 
                   value="Register"
           class="btnRegister" 
                   onclick="return regformhash(this.form,
                                    this.form.Roll_No,
                                    this.form.ID,
                                    this.form.As,
                                    this.form.ctype,
                                    this.form.prewaiver,
                                    this.form.year,
                                    this.form.Sem);" /> 
    </td>
    </tr>  
    </table>
    </div>
    
</form>
    </body>
</html>
