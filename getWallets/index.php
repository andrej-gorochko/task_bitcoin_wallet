<? 
$title = 'формы для поиска кошелька по id';
require_once('../header.php');?>
<body>
<main>
<div class="container"> 
<? if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../class/BitcoinWallet.php');
    // Пример использования класса BitcoinWallet
    $wallet = new BitcoinWallet();
    $id_to_search =   htmlspecialchars($_POST['search_id']);
    $searched_wallet = $wallet->searchWallet($id_to_search);
    if ($searched_wallet == "Wallet not found") {
        echo "Wallet not found<br>";
    } else {
        echo "Wallet id: " . $searched_wallet['id'] . ", balance: " . $searched_wallet['balance'] . " BTC, balance in USD: " . $searched_wallet['balance_usd'] . ", balance in GBP: " . $searched_wallet['balance_gbp'] . ", balance in EUR: " . $searched_wallet['balance_eur'] . "<br>";
    }
} else { ?>
  <!-- Форма для поиска кошелька по id -->
<form class="d-flex justify-content-center py-3 my-4" method="post" action="">
    <label>Search by id:</label>
    <input type="text" name="search_id" class="mx-2">
    <input type="submit" class="btn btn-success" value="Search">
</form>
<?}?>
</div>
</main>
<? require_once('../footer.php');?>
