<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width-device-width, initial-scale-1.0">
            <meta http-equiv="x-UA-Compatible" content="ie*edge">
            <title>Login Page</title>
            <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap-select/bootstrap.min.css');?>">
        </head>
        <body>
            
             <div class="container">
            <div class="row" style="margin-top:45px">
                <div class="col-md-4 col-md-offset-4">
                    <h4>Sign In</h4><hr>
                    <?php  if(!empty(session()->getFlashdata('fail'))) :?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
                    <?php endif?>

                    <?php  if(!empty(session()->getFlashdata('success'))) :?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
                    <?php endif?>
                    <form action="<?=site_url('auth/check');?>" method="post" autocomplete="off">
                         <?= csrf_field();?>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="txtusername"  placeholder="Enter Your Email">
                           
                        </div>
                       <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" name="txtpasswd"  placeholder="Enter Your Password">
                          
                        </div>
                       
                        <div class="form-group">
                            <button class="btn btn-primary btn-danger btn-block" type="submit">Sign In</button>
                        </div>
                        <br>
                         <a href="<?=site_url('auth/register');?>">Have no Account, Create new Account</a>
                    </form>
                </div>
            </div>
        </div>
        </body>
</html>