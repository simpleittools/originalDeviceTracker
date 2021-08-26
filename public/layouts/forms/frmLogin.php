<form action="<?php $actionPage;?>" method="post">
      <p>Username:
        <input class="form-control" type="text" name="username" value="<?php echo htmlentities($username); ?>" />
      </p>
      <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" value="" />
      </p>
      <input class="btn btn-primary" type="submit" name="submit" value="Login" />
</form>