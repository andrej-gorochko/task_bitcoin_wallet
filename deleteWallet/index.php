
<? 
$title = 'формы для регистрации нового кошелька';
require_once('../header.php');?>
<body>
<main>
<div class="container"> 
<? if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Подключаем необходимые классы и файлы
require_once('./class/BitcoinWallet.php');
    $wallet = new BitcoinWallet();
    $id = htmlspecialchars($_POST['wallet_id']);

// Удаление кошелька
$wallet->deleteWallet($id);
echo "Wallet $id deleted\n";
// Закрытие соединения с базой данных
$pdo = null;
} else { ?>
<!-- Форма для удаления кошелька -->
<form class="d-flex justify-content-center py-3 my-4" method="post" action="">
    <label class="mx-2">Delete wallet:</label>
    <input type="text" class="mx-2" name="wallet_id">
    <input type="submit" class="btn btn-danger" name="delete_wallet" value="Delete">
</form>
<?}?>
</div>
</main>
<? require_once('../footer.php');?>
