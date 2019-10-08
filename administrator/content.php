<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/fungsi_rupiah.php";


if ($_GET[module]=='home'){
  if ($_SESSION['leveluser']=='admin'){
  echo "<p><img width=900 src='../header/4.jpg'></p>";
  }
}



elseif ($_GET[module]=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}


elseif ($_GET[module]=='produk'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_produk/produk.php";
  }
}

elseif ($_GET[module]=='produk_in'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_produk_in/produk_in.php";
  }
}


elseif ($_GET[module]=='order'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_order/order.php";
  }
}

elseif ($_GET[module]=='orderr'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_orderr/orderr.php";
  }
}

elseif ($_GET[module]=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}




elseif ($_GET[module]=='carabeli'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_carabeli/carabeli.php";
  }
}


elseif ($_GET[module]=='bank'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_bank/bank.php";
  }
}





elseif ($_GET[module]=='ongkoskirim'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ongkoskirim/ongkoskirim.php";
  }
}

elseif ($_GET[module]=='password'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_password/password.php";
  }
}

elseif ($_GET[module]=='laporan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporan/laporan.php";
  }
}


elseif ($_GET['module']=='jasapengiriman'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_pengiriman/pengiriman.php";
  }
}





elseif ($_GET['module']=='customer'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_customer/customer.php";
  }
}

elseif ($_GET['module']=='konfirmasi'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_konfirmasi/konfirmasi.php";
  }
}

elseif ($_GET['module']=='sms'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_sms/sms.php";
  }
}

elseif ($_GET['module']=='ordermanual'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_ordermanual/ordermanual.php";
  }
}

elseif ($_GET['module']=='isipesan'){
if ($_SESSION['leveluser']=='admin'){
  require_once "modul/mod_ordermanual/isipesanan.php";
  }
}





else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
