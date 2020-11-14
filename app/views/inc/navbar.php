<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 shadow">
  <div class="container">
  
    <a class="navbar-brand an-in-nav" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>

        <?php if (isset($_SESSION['user_id'])) :?>
          <li class="nav-item n-user m-2">
              <i class="fa fa-user-secret"></i><?php echo $_SESSION['u_sn'];?>
          </li>
          <?php endif; ?>
        
        <!-- REMOVE FOR NOW...I MAY ADD THINGS TO THIS WHEN COURSE COMPLETES WHEN I ADD ONTO IT -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
      
      </ul>

      <!-- remove search bar for now -->
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> -->

      <!-- LOGIN|REGISTER -->
      <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/signUp">Sign Up</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>