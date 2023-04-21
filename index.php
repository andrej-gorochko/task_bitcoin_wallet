<? 
$title = 'All Wallets';
require_once('header.php');?>
<body>
<main>
<div class="container"> 
<?
// Подключаем необходимые классы и файлы
require_once('class/BitcoinWallet.php');
$wallet = new BitcoinWallet();

  //Получение списка кошельков
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 1;
$per_page = 5; // количество кошельков на странице
$total_wallets = $wallet->countWallets();  //общее количество кошельков
$total_pages = ceil($total_wallets / $per_page);  //общее колич

$wallets = $wallet->getWallets($page);
?>

<ul class="list-group py-3 my-4">
  <?foreach ($wallets as $arr_wallet): ?>
    <li class="list-group-item">
      Wallet id: <?= $arr_wallet['id'] ?><br>
      Balance: <?= $arr_wallet['balance'] ?> BTC<br>
      Balance in USD: <?= $arr_wallet['balance_usd'] ?><br>
      Balance in GBP: <?= $arr_wallet['balance_gbp'] ?><br>
      Balance in EUR: <?= $arr_wallet['balance_eur'] ?><br>
    </li>
  <?endforeach; ?>
</ul>
<? if ($total_wallets > 5):?>
<div class="d-flex justify-content-center">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php
      // Вывод ссылок на другие страницы
      echo "<li class='page-item'><a class='page-link' href='?page=1'>First</a></li>";
      for ($i = 1; $i <= $total_pages; $i++) {
          if ($i == $page) {
              echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
          } else {
              echo "<li class='page-item'><a class='page-link' href=\"?page=$i\">$i</a></li>";
          }
      }
      echo "<li class='page-item'><a class='page-link' href='?page=$total_pages'>Last</a></li>";
      ?>
    </ul>
  </nav>
</div>
<?endif;?>
<?
// Закрытие соединения с базой данных
$pdo = null;
?>
</div>
</main>
<? require_once('footer.php');?>
