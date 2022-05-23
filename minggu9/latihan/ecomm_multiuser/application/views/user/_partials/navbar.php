<nav class="navbar navbar-expand-lg navbar-light bg-white shadow " id="nav">

  <a class="navbar-brand mr-auto" href="<?php echo base_url() ?>"><h2 class="font-weight-bold text-success"><?php echo SITE_NAME?></h2></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

    <form class="form-inline mx-auto form col-md-4 col-12  ml-md-5" action="<?php echo site_url('produk/search') ?>" method="post">

      <input class="form-control form-control-sm searchform col-10" type="search" placeholder="Search" name="keyword" value="<?php if(isset($keyword_search)){echo $keyword_search;} ?>">

      <button class="btn btn-default btn-sm ml-0 bg-light searchbutton col-2" type="submit"><i class="fas fa-search">&nbsp;</i></button>

    </form>

  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav ml-auto">

      <!-- <li class="nav-item">

        <a class="nav-link text-success" href="<?php //echo base_url() ?>">Home</a>

      </li> -->

      <li class="nav-item cart-nav">

        <?php

          $text_cart_url = '<i class="fas fa-shopping-cart mr-1"></i>'. $this->cart->total_items() .' items';

        ?>

        <div class="nav-link"><?=anchor('produk/cart', $text_cart_url, array('class' => 'btn text-success px-0 py-1'))?></div>

      </li>
      <?php if($this->session->userdata('username')) { ?>
        <li class="nav-item" >
          <div class="nav-link">
            <?=anchor('profil', '<i class="fas fa-user mr-1"></i>'.$this->session->userdata('username'), array('class' => 'btn text-success px-0 py-1'))?>  
          </div>
        </li>
        <li class="nav-item"><div class="nav-link"><?php echo anchor('order/my_order', 'My Orders', array('class' => 'btn text-success '));?></div></li>
        <li class="nav-item"><div class="nav-link"><?php echo anchor('login/logout', 'Logout', array('class' => 'btn btn-outline-success '));?></div></li>
      <?php } else { ?>
        <li  class="nav-item"><div class="nav-link"><?php echo anchor('login', '<b>Masuk</b>', array('class' => 'btn btn-sm border-success text-success px-3'));?></div></li>
        <li  class="nav-item"><div class="nav-link"><?php echo anchor('register', '<b>Daftar</b>', array('class' => 'btn btn-sm bg-success px-3 text-white'));?></div></li>
      <?php } ?>
      </ul>
    </ul>
  </div>
</nav>