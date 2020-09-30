<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d0cecf;">
<a class="navbar-brand" href="<?=base_url('dash');?>"><img src="<?=base_url('assets/images/logo.png');?>" height="50px;"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ml-auto">
  <?php if ($page != "ccadastro") { ?>
    <li class="nav-item <?= ($page == "vcli" ? "active": "")?>">
      <a class="nav-link" href="<?=base_url('dash/list_cliente');?>">Cliente</a>
    </li>
    <li class="nav-item <?= ($page == "vespec" ? "active": "")?>">
      <a class="nav-link" href="<?=base_url('dash/list_espec');?>">Especialidades</a>
    </li>
    <li class="nav-item <?= ($page == "vmedi" ? "active": "")?>">
      <a class="nav-link" href="<?=base_url('dash/list_medi');?>">Parceiros credenciados</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url('Login/logout');?>"><i class="icon-sign-out"></i> Sair</a>
    </li>
  <?php } else { ?>
  <li class="nav-item">
      <a class="nav-link" href="<?=base_url('Login/logout');?>"><i class="icon-sign-out"></i> Sair</a>
    </li>
  <?php } ?>
  </ul>
</div>
</nav>