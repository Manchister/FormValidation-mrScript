<?php
require_once ('index_top.php');
require_once 'header.php';
?>

<body onload="setFocus();">

    <main style="margin-bottom: 100px;">
        <div class="container">

            <div class="page-header">
                <h1>Manchister Scripts <small>Form-Validation</small></h1>
            </div>
            <fieldset class="bq-form">

                <form name="frmRegistration" method="post"
                      action="validate.php?validationType=php"
                      class="form-horizontal panel panel-success">

                    <div class="panel-heading text-center" style="margin-bottom: 40px;">
                        <h4>New User Registration Form</h4>
                    </div>
                    <div class="panel-body">

                        <!-- Username -->
                        <div class="form-group">
                            <label for="txtUsername" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Username:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                <input id="txtUsername" name="txtUsername" type="text"
                                       class="form-control text-center"
                                       onblur="validate(this.value, this.id)"
                                       value="<?php echo $_SESSION['values']['txtUsername'] ?>" />
                                <span id="txtUsernameFailed"
                                      class="<?php echo $_SESSION['errors']['txtUsername'] ?>">
                                    This username is in use, or empty username field.
                                </span>

                            </div>
                        </div>

                        <br/>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="txtEmail" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Email:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                <input id="txtEmail" name="txtEmail" type="text"
                                       class="form-control text-center"
                                       onblur="validate(this.value, this.id)"
                                       value="<?php echo $_SESSION['values']['txtEmail'] ?>" />
                                <span id="txtEmailFailed"
                                      class="<?php echo $_SESSION['errors']['txtEmail'] ?>">
                                    This e-mail address is in use, or Invalid.
                                </span>

                            </div>
                        </div>

                        <br />

                        <!--Password1-->
                        <div class="form-group">
                            <label for="pass1" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Password:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <input type="password" id="pass1" name="pass1"
                                       class="form-control text-center" >
                            </div>
                        </div>
                        <!--/Password1-->

                        <br />

                        <!--Password2-->
                        <div class="form-group">
                            <label for="pass2" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Password:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <input type="password" id="pass2" name="pass2"
                                       class="form-control text-center" />
                            <!--    <span id="pass2Failed"
                                      class="<?php echo $_SESSION['errors']['pass2'] ?>">
                                    Please confirm your password.
                                </span> -->
                            </div>
                        </div>
                        <!--/Password2-->

                        <br />

                        <!-- Name -->
                        <div class="form-group">
                            <label for="txtName" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Name:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                <input id="txtName" name="txtName" type="text"
                                       class="form-control text-center"
                                       onblur="validate(this.value, this.id)"
                                       value="<?php echo $_SESSION['values']['txtName'] ?>" />
                                <span id="txtNameFailed"
                                      class="<?php echo $_SESSION['errors']['txtName'] ?>">
                                    Please enter your name.
                                </span>

                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group">
                            <label for="selGender" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Gender:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                <select name="selGender" id="selGender"
                                        onblur="validate(this.value, this.id)">
                                            <?php buildOptions($genderOptions, $_SESSION['values']['selGender']);
                                            ?>
                                </select>
                                <span id="selGenderFailed"
                                      class="<?php echo $_SESSION['errors']['selGender'] ?>">
                                    Please select your gender.
                                </span>

                            </div>
                        </div>

                        <!-- Birthday -->
                        <div class="form-group">
                            <label for="selBthMonth" class="col-lg-1 col-md-2 col-sm-2 col-xs-3">
                                <b class="h4">Birthday:</b>
                            </label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                <!-- Month -->
                                <select name="selBthMonth" id="selBthMonth"
                                        onblur="validate(this.value, this.id)">
                                            <?php buildOptions($monthOptions, $_SESSION['values']['selBthMonth']);
                                            ?>
                                </select>
                                &nbsp;-&nbsp;
                                <!-- Day -->
                                <input type="text" name="txtBthDay" id="txtBthDay" maxlength="2"
                                       size="2"
                                       onblur="validate(this.value, this.id)"
                                       value="<?php echo $_SESSION['values']['txtBthDay'] ?>" />
                                &nbsp;-&nbsp;
                                <!-- Year -->
                                <input type="text" name="txtBthYear" id="txtBthYear" maxlength="4" size="2"
                                       onblur="validate(document.getElementById('selBthMonth').options[document.getElementById('selBthMonth').selectedIndex].value + '#' + document.getElementById('txtBthDay').value + '#' + this.value, this.id)"
                                       value="<?php echo $_SESSION['values']['txtBthYear'] ?>" />
                                <!-- Month, Day, Year validation -->
                                <span id="selBthMonthFailed"
                                      class="<?php echo $_SESSION['errors']['selBthMonth'] ?>">
                                    Please select your birth month.
                                </span>
                                <span id="txtBthDayFailed"
                                      class="<?php echo $_SESSION['errors']['txtBthDay'] ?>">
                                    Please enter your birth day.
                                </span>
                                <span id="txtBthYearFailed" class="<?php echo $_SESSION['errors']['txtBthYear'] ?>">
                                    Please enter a valid date.
                                </span>

                            </div>
                        </div>

                        <!-- Phone number
                        <label for="txtPhone">Phone number:</label>
                        <input id="txtPhone" name="txtPhone" type="text"
                               onblur="validate(this.value, this.id)"
                               value="<?php echo $_SESSION['values']['txtPhone'] ?>" />
                        <span id="txtPhoneFailed"
                              class="<?php echo $_SESSION['errors']['txtPhone'] ?>">
                            Please insert a valid US phone number (xxx-xxx-xxxx).
                        </span> 
                        <br />-->

                        <!-- Read terms checkbox -->
                        <div class="form-group">
                            <label for="chkReadTerms" class="col-lg-1 col-md-2 col-sm-2 col-xs-3"></label>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="checkbox" id="chkReadTerms" name="chkReadTerms"
                                       class="left"
                                       onblur="validate(this.checked, this.id)"
                                       <?php
                                       if ($_SESSION['values']['chkReadTerms'] == 'on')
                                           echo 'checked="checked"'
                                           ?> />
                                <span>I've read the Terms of Use</span>
                                <span id="chkReadTermsFailed"
                                      class="<?php echo $_SESSION['errors']['chkReadTerms'] ?>">
                                    Please make sure you read the Terms of Use.
                                </span>
                            </div>
                        </div>
                        <!-- End of form -->
                        <hr />
                        <span class="txtSmall">Note: All fields are required.</span>
                        <br /><br />
                        <div class="panel-info panel-footer btn-group-vertical center-block">
                            <input type="submit" name="submitbutton" value="Register" 
                                   class="btn btn-lg btn-success">
                        </div>

                    </div>
                </form>
            </fieldset>


            <?php require_once 'footer.php'; ?>