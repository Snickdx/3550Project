<?php include 'header.php' ?>
        <title>D.A.T.A</title>
    </head>
    <body>
        <ul class="nav nav-tabs">
                <li>
                    <a class=" btn btn-primary btn-lg dropdown-toggle active" data-toggle="dropdown">
                        D.A.T.A
                    </a>
                </li>
                <li>
                    <a class="btn btn-default btn-lg active">Login</a>
                </li>
        </ul>
        <br>
        <div class=" row jumbotron container btn btn-default active col-md-6 col-md-offset-3">
            <div id="container">
            	<h1>Please Login</h1>
                <br>
                <?php
                    $formAttributes = array('class' => 'form-horizontal');
                    echo form_open('main/login_validation',$formAttributes);
                ?>
                  <?php
                    echo validation_errors();
                  ?>
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">Login ID</label>
                    <div class="col-sm-10">
                      <?php
                        $fieldAttributes = array('class' => 'form-control', 'name'=>'username');
                        echo form_input($fieldAttributes);
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <?php
                        $fieldAttributes = array('class' => 'form-control', 'name'=>'password');
                        echo form_password($fieldAttributes);
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <?php
                        $fieldAttributes = array('class' => 'form-control btn btn-primary', 'name'=>'login_submit', 'value'=>'Login');
                        echo form_submit($fieldAttributes);
                      ?>
                    </div>
                  </div>
                <?php
                    echo form_close();
                ?>
            </div>
        </div>

<?php include 'footer.php' ?>