<? 
$title = 'Пополнение кошелька';
require_once('../header.php');?>
<body>
<main>
<div class="container"> 
<?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Подключаем необходимые классы и файлы
require_once('../class/BitcoinWallet.php');
// Пример использования класса BitcoinWallet
    $wallet = new BitcoinWallet();
    $id = htmlspecialchars($_POST['id']);
    $currency = htmlspecialchars($_POST['currency']);
    $amount = htmlspecialchars($_POST['amount']);
    $bitcoin_amount = $wallet->depositBitcoin($id, $currency, $amount);
   // Пополнение кошелька
   echo "<div class='alert alert-success'>Deposited $bitcoin_amount BTC to wallet $id</div>";

   // Получение баланса кошелька
   $balance = $wallet->getWalletBalance($id);
   echo "<div class='alert alert-info'>Wallet $id balance is $balance BTC</div>";
   
   // Получение баланса кошелька в USD
   $balance_usd = $wallet->getWalletBalanceInUSD($id);
   echo "<div class='alert alert-info'>Wallet $id balance is $balance_usd USD</div>";
   
   // Получение баланса кошелька в GBP
   $balance_gbp = $wallet->getWalletBalanceInGBP($id);
   echo "<div class='alert alert-info'>Wallet $id balance is $balance_gbp GBP</div>";
   
   // Получение баланса кошелька в EUR
   $balance_eur = $wallet->getWalletBalanceInEUR($id);
   echo "<div class='alert alert-info'>Wallet $id balance is $balance_eur EUR</div>";
   
} else {?>
   <!-- Форма для пополнения кошелька -->
   <form class="d-flex justify-content-center py-3 my-4" method="post" action="">
    <label class="mx-2">Recharge wallet:</label>
    <select class="mx-2" name="currency">
        <option value="USD">USD</option>
        <option value="GBP">GBP</option>
        <option value="EUR">EUR</option>
    </select>
    <input type="text" class="mx-2" name="amount" placeholder="amount">
    <input type="text" class="mx-2" name="id" value="" placeholder="id">
    <input type="submit" class="btn btn-success mx-2" name="recharge_wallet" value="Recharge">
</form>
<?}?>
</div>
</main>
<? require_once('../footer.php');?>
</body>
</html>