<? 
$title = 'формы для регистрации нового кошелька';
require_once('../header.php');?>
<body>
<main>
<div class="container"> 
<?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Подключаем необходимые классы и файлы
    require_once('../class/BitcoinWallet.php');
    $bitcoin_wallet = new BitcoinWallet();
    $wallet = $bitcoin_wallet->registerWallet();
    echo "ID кошелька: {$wallet[0]}<br>";
    echo "Пароль кошелька: {$wallet[1]}<br>";
} else { ?>
    <!-- Форма для добавления кошелька -->
<form class="d-flex justify-content-center py-3 my-4" method="post" action="">
    <label class="mx-2">Create new wallet:</label>
    <input type="submit" class="btn btn-success" name="create_wallet" value="Create">
</form>
<?}?>
</div>
</main>
<? require_once('../footer.php');?>
