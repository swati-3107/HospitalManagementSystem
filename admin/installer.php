<?php
require_once('config/base_path.php');
$pg_title = "Installer";
include('includes/head-js-css.php');
?>
<body>
<div id="container">
<form style="width: 600px;margin: auto;padding: 20px;border: 1px solid lightgray;" autocomplete="off">
    <fieldset>
         <legend><h2 class="text-primary">Database Configuration</h2></legend>
         <div class="form-group">
            <label for="db_host">Database Host:</label>
            <input type="text" name="db_host" placeholder="Host" class="form-control" id="db_host" autofocus required>
         </div>
         <div class="form-group">
            <label>Database Username:</label>
            <input type="text" name="db_user" placeholder="Username" class="form-control" required>
         </div>
         <div class="form-group">
            <label>Database Password:</label>
            <input type="text" name="db_password" placeholder="Password" class="form-control">
         </div>
    </fieldset>
    <fieldset>
        <legend><h2 class="text-primary">Website Settings</h2></legend>
        <div class="form-group">
           <label>Website Name:</label>
           <input type="text" name="website_name" placeholder="Bigmarkmedia" class="form-control" required=>
        </div>
        <div class="form-group">
           <label>Website Url:</label>
           <input type="url" name="website_url" placeholder="http://example.com" class="form-control" required=>
        </div>
        <div class="form-group">
           <label>Website Logo:</label>
           <input type="file" name="website_logo"  class="form-control-file" accept="image/*" required=>
        </div>
    </fieldset>
    <fieldset>
        <legend><h2 class="text-primary">Website Credentials</h2></legend>
        <div class="form-group">
           <label>Login Username:</label>
           <input type="text" name="username" placeholder="admin" class="form-control" required=>
        </div>
        <div class="form-group">
           <label>Login Password:</label>
           <input type="password" name="password" placeholder="Zx_Y@!5x4" class="form-control" autocomplete="new-password" required=>
        </div>
        <div class="form-group">
           <label>Admin Email:</label>
           <input type="text" name="email" placeholder="admin@gmail.com" class="form-control" autocomplete="new-email" required=>
        </div>
    </fieldset>
    <button type="submit" name="setup" class="btn btn-primary">Setup</button>
</form>
</div>
</html>