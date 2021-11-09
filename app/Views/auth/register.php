<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta http-equiv="x-UA-Compatible" content="ie*edge">
        <title>Register</title>
        <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap-select/bootstrap.min.css');?>">
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top:45px">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Sign Up</h4><hr>
                    <?php  if(!empty(session()->getFlashdata('fail'))) :?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
                    <?php endif?>

                    <?php  if(!empty(session()->getFlashdata('success'))) :?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
                    <?php endif?>
                    <form action="<?= base_url('auth/save')?>" method="POST">
                        <?= csrf_field();?>
                        <div class="form-group">
                            <label for="">Name:</label>
                            <input type="text" class="form-control" name="txtname" placeholder="Enter Your Name" value="<?= set_value('txtname');?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Lastname:</label>
                            <input type="text" class="form-control" name="txtlastname" placeholder="Enter Your Lastname">
                        </div> -->
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="txtemail" placeholder="Enter Your Email" value="<?= set_value('txtemail');?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="text" class="form-control" name="txtpasswd" placeholder="Enter Your Password" value="<?= set_value('txtpasswd');?>">
                        </div>
                        <div class="form-group">
                            <label for="">Retry-Password:</label>
                            <input type="text" class="form-control" name="txtcpasswd" placeholder="Retry-Password" value="<?= set_value('txtcpasswd');?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                        </div>
                        <br>
                        <a href="<?=site_url('auth');?>">I already have account, Login Now</a>
                        <!--https://www.youtube.com/watch?v=vKFcpQo-h-Q-->
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>