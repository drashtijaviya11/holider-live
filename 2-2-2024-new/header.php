
<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>   -->
<script src="<?php echo base_url(); ?>assets\js\jquery.min.js"></script>

<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> 
<!-- /*****************************     Noty Css And Js     ******************************** */ -->
<script src="<?php echo base_url(); ?>assets/js/jquery.noty.js"></script>
<script src="<?php echo base_url(); ?>assets/js/noty.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/noty.css" />
<!-- /*****************************   End  Noty Css And Js     ******************************** */ -->
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> 
    
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="<?php echo base_url(); ?>assets\js\sweetalert2@11.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    body {
  padding-bottom: 30px;
  position: relative;
  min-height: 100%;
}

a {
  transition: background 0.2s, color 0.2s;
}
a:hover,
a:focus {
  text-decoration: none;
}

#wrapper {
  padding-left: 0;
  transition: all 0.5s ease;
  position: relative;
}

#sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  overflow-x: hidden;
  background: #c6c6c6;
  transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
  width: 250px;
}
.logo img {
    width: 168px;
    height: calc(10*var(--aspect-ratio));
}
.sidebar-brand {
    position: absolute;
    top: 0;
    left: 0%;
    width: 220px;
    text-align: center;
    padding: 20px 0;
}
.sidebar-brand h2 {
  margin: 0;
  font-weight: 600;
  font-size: 24px;
  color: #fff;
}

.sidebar-nav {
  position: absolute;
  top: 75px;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
}
.sidebar-nav > li {
  text-indent: 10px;
  line-height: 42px;
}
.sidebar-nav > li a {
  display: block;
  text-decoration: none;
  color: #757575;
  font-weight: 600;
  font-size: 18px;
}
.sidebar-nav > li > a:hover,
.sidebar-nav > li.active > a {
  text-decoration: none;
  color: #fff;
  background: #000000;
}
.sidebar-nav > li > a i.fa {
  font-size: 24px;
  width: 60px;
}

#navbar-wrapper {
    width: 100%;
    position: absolute;
    z-index: 2;
}
#wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -250px;
}
#navbar-wrapper .navbar {
  border-width: 0 0 0 0;
  background-color: #eee;
  font-size: 24px;
  margin-bottom: 0;
  border-radius: 0;
}
#navbar-wrapper .navbar a {
  color: #757575;
}
#navbar-wrapper .navbar a:hover {
  color: #F8BE12;
}

#content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
  top: 100px;
}
#wrapper.toggled #content-wrapper {
  position: absolute;
  margin-right: -250px;
}

@media (min-width: 992px) {
  #wrapper {
    padding-left: 250px;
  }
  
  #wrapper.toggled {
    padding-left: 60px;
  }

  #sidebar-wrapper {
    width: 250px;
  }
  
  #wrapper.toggled #sidebar-wrapper {
    width: 60px;
  }
  
  #wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -190px;
}
  
  #wrapper.toggled #content-wrapper {
    position: absolute;
    margin-right: -190px;
  }

  #navbar-wrapper {
    position: relative;
  }

  #wrapper.toggled {
    padding-left: 60px;
  }

  #content-wrapper {
    position: relative;
    top: 0;
  }

  #wrapper.toggled #navbar-wrapper,
  #wrapper.toggled #content-wrapper {
    position: relative;
    margin-right: 60px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  #wrapper {
    padding-left: 60px;
  }

  #sidebar-wrapper {
    width: 60px;
  }
  
#wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -250px;
}
  
  #wrapper.toggled #content-wrapper {
    position: absolute;
    margin-right: -250px;
  }

  #navbar-wrapper {
    position: relative;
  }

  #wrapper.toggled {
    padding-left: 250px;
  }

  #content-wrapper {
    position: relative;
    top: 0;
  }

  #wrapper.toggled #navbar-wrapper,
  #wrapper.toggled #content-wrapper {
    position: relative;
    margin-right: 250px;
  }
}

@media (max-width: 767px) {
  #wrapper {
    padding-left: 0;
  }

  #sidebar-wrapper {
    width: 0;
  }

  #wrapper.toggled #sidebar-wrapper {
    width: 250px;
  }
  #wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -250px;
  }

  #wrapper.toggled #content-wrapper {
    position: absolute;
    margin-right: -250px;
  }

  #navbar-wrapper {
    position: relative;
  }

  #wrapper.toggled {
    padding-left: 250px;
  }

  #content-wrapper {
    position: relative;
    top: 0;
  }
  .logo img {
    width: calc(35*var(--aspect-ratio));
    height: calc(10*var(--aspect-ratio));
}
  #wrapper.toggled #navbar-wrapper,
  #wrapper.toggled #content-wrapper {
    position: relative;
    margin-right: 250px;
  }
}
.temp{
  margin-right: 10px;
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  margin-bottom: 20px;
}
.whatsapp{
    background-color: #055c7491;
    padding: 5px;
    font-weight: bold;
}
.bi-star-fill{
  margin: 4px;
    font-size: 4px;
    position: absolute;
    margin-left: 4px;
    color: red;
}
.form-control
{
    font-size: 1.5rem !important;
}
.modal-dialog{
  font-size: 14px;
}

.nav-icon {
   margin: 0px -3px;
}
.bar-icon {
	position: absolute;
    top: 10px;
}
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap-icons.css" /> -->
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" /> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets\css\jquery.dataTables.css" />
<div id="wrapper">

  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
    <div class="logo">
                <a class="active" href="<?= base_url('offer?country='.$this->input->cookie('country', true).'&state='.$this->input->cookie('state', true)) ?>"><img src="<?= base_url() ; ?>assets/images/logo.png" alt=""></a>
                </div>
    </div>
    <ul class="sidebar-nav">
      <li class="menu-item">
        <a href="#" class=""><i class="fa fa-home nav-icon"></i>Home</a>
      </li>
      <li class="menu-item <?php echo $this->router->fetch_method()=='offer'?'active':''?>">
        <a href="<?= base_url(); ?>admin/offer" class="offers" ><i class="fa fa-stack-overflow nav-icon"></i>Offers </a>
      </li>
      <li class="menu-item <?php if($this->router->fetch_method()=='provider'|| $this->router->fetch_method()=='employee'){ echo 'active';}?>">
        <a href="<?= base_url();?>admin/provider" class="provider" ><i class="fa fa-users nav-icon"></i>Provider</a>
      </li>
      <li class="menu-item <?php echo $this->router->fetch_method()=='affiliator'?'active':''?>">
        <a href="<?= base_url(); ?>admin/affiliator" class="affiliator" ><i class="fa fa-users nav-icon"></i>Affiliator </a>
      </li>
      <li class="menu-item <?php echo $this->router->fetch_method()=='category'?'active':''?>">
        <a href="<?= base_url(); ?>admin/category" class="category" ><i class="fa fa-tags nav-icon"></i>Category </a>
      </li>
      <li class="menu-item <?php echo $this->router->fetch_method()=='users'?'active':''?>">
        <a href="<?= base_url(); ?>admin/users" class="users"><i class="fa fa-user nav-icon"></i>Users </a>
      </li>
      <li class="menu-item <?php if($this->router->fetch_method()=='devices' || $this->router->fetch_method()=='add_device'){ echo 'active';}?>">
        <a href="<?= base_url(); ?>admin/devices" class="register"><i class="fa fa-mobile nav-icon"></i>Register Device </a>
      </li>
			<li class="menu-item <?php echo $this->router->fetch_method()=='area'?'active':''?>">
        <a href="<?= base_url(); ?>admin/area" class="area" onclick="area()"><i class="fa fa-globe nav-icon"></i>Area</a>
      </li>
			<li class="menu-item <?php echo $this->router->fetch_method()=='testimonial'?'active':''?>">
        <a href="<?= base_url(); ?>admin/testimonial" class="testimonial" ><i class="fa fa-comments nav-icon"></i>Testimonial</a>
      </li>
			<li class="menu-item <?php echo $this->router->fetch_method()=='faq'?'active':''?>">
        <a href="<?= base_url(); ?>admin/faq" class="faq" ><i class="fa fa-question nav-icon"></i>FAQ </a>
      </li>
			<li class="menu-item <?php echo $this->router->fetch_method()=='contact_support'?'active':''?>">
        <a href="<?= base_url(); ?>admin/contact_support" class="contact_support" ><i class="fa fa-american-sign-language-interpreting nav-icon"></i>Contact & Support </a>
      </li>
			<li class="menu-item <?php echo $this->router->fetch_method()=='about_us'?'active':''?>">
        <a href="<?= base_url(); ?>admin/about_us" class="about_us" ><i class="fa fa-user-circle nav-icon"></i>About Us </a>
      </li>
      <li class="menu-item <?php echo $this->router->fetch_method()=='setting'?'active':''?>">
        <a href="<?= base_url(); ?>admin/setting" class="setting" onclick="users()"><i class="fa fa-gear nav-icon"></i>Setting </a>
      </li>
      <li class="menu-item">
        <a href="<?= base_url(); ?>admin/logout" class="logout"><i class="fa fa-sign-out"></i>Logout </a>
      </li>
    </ul>
  </aside>

  <div id="navbar-wrapper">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header bar-icon">
          <a href="#" class="navbar-brand fs-2" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
        </div>
      </div>
    </nav>
  </div>