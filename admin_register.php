<?php
/**
 * Copyright (C) 2013 peredur.net
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'register_check.php';
include_once 'support_functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminRegistration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>

    <script>
            function lev(a, b){
                if(!a || !b) return (a || b).length;
                var m = [];
                for(var i = 0; i <= b.length; i++){
                    m[i] = [i];
                    if(i === 0) continue;
                    for(var j = 0; j <= a.length; j++){
                        m[0][j] = j;
                        if(j === 0) continue;
                        m[i][j] = b.charAt(i - 1) == a.charAt(j - 1) ? m[i - 1][j - 1] : Math.min(
                            m[i-1][j-1] + 1,
                            m[i][j-1] + 1,
                            m[i-1][j] + 1
                        );
                    }
                }
                return m[b.length][a.length];
            }


            function validatePassword(password) {
                
                // Do not show anything when the length of password is zero.
                if (password.length === 0) {
                    document.getElementById("msg").innerHTML = "";
                    return;
                }

                var commonPwdList = ['123456', 
                                    'Password', 
                                    '12345678', 
                                    'qwerty', 
                                    '12345', 
                                    '123456789', 
                                    'letmein', 
                                    '1234567', 
                                    'football', 
                                    'iloveyou', 
                                    'admin', 
                                    'welcome', 
                                    'monkey', 
                                    'login', 
                                    'abc123', 
                                    'starwars', 
                                    '123123', 
                                    'dragon', 
                                    'passw0rd', 
                                    'master', 
                                    'hello', 
                                    'freedom', 
                                    'whatever', 
                                    'qazwsx', 
                                    'trustno1'
                                    ];
                
                /*var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&]"); 
                matchedCase.push("[A-Z]");
                matchedCase.push("[0-9]");
                matchedCase.push("[a-z]");

                var ctr = 0;
                for (let i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(password)) {
                        ctr++;
                    }
                }*/
                var min=10000;
                for (let index = 0; index < commonPwdList.length; index++) {
                    var output = lev(password, commonPwdList[index]);
                    if(output < min){
                        min = output;
                    }
                }
                ctr = min;
                console.log(ctr);
                // for(int i=0; i<commonPwdList.length; i++){
                //     if(lev(password, commonPwdList[i])<=2){
                //         ctr = lev(password, commonPwdList[i]);
                //     }
                // }
                var color = "";
                var strength = "";
                /*switch (ctr) {
                    case 0:
                    case 1:
                    case 2:
                        strength = "Very Weak";
                        color = "red";
                        break;
                    case 3:
                        strength = "Medium";
                        color = "orange";
                        break;
                    case 4:
                        strength = "Strong";
                        color = "green";
                        break;
                }*/

                if(ctr < 5)
                {
                    strength = "Very Weak";
                    color = "red";
                }
                else if(ctr < 11)
                {
                    strength = "Medium";
                    color = "orange";
                }
                else
                {
                    strength = "Strong";
                    color = "green";
                }

                document.getElementById("msg").innerHTML = strength;
                document.getElementById("msg").style.color = color;
            }
        </script>

    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Admin Details</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>

        <form method="post" name="registration_form" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            Email: <input type="text" name="email" id="email" /><br>
<br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>
<br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd"
                                     onkeyup="validatePassword(this.value);" /><span id="msg"></span><br>
<br>
            <input type="button" 
                   value="Register" 
                   onclick="
                    return regformhash(this.form,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
        </form>
<br>
<br>
<br>
        <p>Return to the <a href="index.php">login page</a>.</p>
    </body>
</html>
