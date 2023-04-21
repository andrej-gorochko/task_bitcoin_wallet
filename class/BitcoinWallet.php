<?php
class BitcoinWallet {
    private $db;
    
    public function __construct() {
        $host = 'localhost';
        $dbname = 'wallets';
        $username = 'root';
        $password = 'root';
        $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }
    
    public function registerWallet() {
        $id = uniqid();
        $password = password_hash($id, PASSWORD_DEFAULT);
        $query = $this->db->prepare("INSERT INTO wallets (id, password, balance, balance_usd, balance_gbp, balance_eur) VALUES (?, ?, 0, 0, 0, 0)");
        $query->execute([$id, $password]);

        return [$id, $password];
    }
    
    public function getWalletBalance($id) {
        $query = $this->db->prepare("SELECT balance FROM wallets WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC)['balance'];
    }
    
    public function getWalletBalanceInUSD($id) {
        $balance = $this->getWalletBalance($id);
        $usd_rate = $this->getExchangeRate('USD');
        return round($balance * $usd_rate, 2);
    }
    public function countWallets()
{
    $stmt = $this->db->prepare("SELECT COUNT(*) FROM wallets");
    $stmt->execute();
    return $stmt->fetchColumn();
}

    public function getWalletBalanceInGBP($id) {
        $balance = $this->getWalletBalance($id);
        $gbp_rate = $this->getExchangeRate('GBP');
        return round($balance * $gbp_rate, 2);
    }
    
    public function getWalletBalanceInEUR($id) {
        $balance = $this->getWalletBalance($id);
        $eur_rate = $this->getExchangeRate('EUR');
        return round($balance * $eur_rate, 2);
    }
    
    private function getExchangeRate($currency) {
        $json = file_get_contents('https://api.coindesk.com/v1/bpi/currentprice.json');
        $data = json_decode($json, true);
        $rate = $data['bpi'][$currency]['rate_float'];
        return $rate;
    }
    
    public function depositBitcoin($id, $currency, $amount) {
        $rate = $this->getExchangeRate($currency);
        $bitcoin_amount = round($amount / $rate, 8);
        $query = $this->db->prepare("UPDATE wallets SET balance = balance + ? WHERE id = ?");
        $query->execute([$bitcoin_amount, $id]);
        return $bitcoin_amount;
    }
    
    public function getWallets($page = 1) {
        $offset = ($page - 1) * 5;
        $query = $this->db->prepare("SELECT id, balance FROM wallets ORDER BY id LIMIT :offset, 5");
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();
        $wallets = $query->fetchAll(PDO::FETCH_ASSOC);
        $usd_rate = $this->getExchangeRate('USD');
        $gbp_rate = $this->getExchangeRate('GBP');
        $eur_rate = $this->getExchangeRate('EUR');
        foreach ($wallets as &$wallet) {
            $wallet['balance_usd'] = round($wallet['balance'] * $usd_rate, 2);
            $wallet['balance_gbp'] = round($wallet['balance'] * $gbp_rate, 2);
            $wallet['balance_eur'] = round($wallet['balance'] * $eur_rate, 2);
        }
        return $wallets;
    }
    
    public function searchWallet($id) {
        $query = $this->db->prepare("SELECT id, balance FROM wallets WHERE id = ?");
        $query->execute([$id]);
        $wallet = $query->fetch(PDO::FETCH_ASSOC);
        if (!$wallet) {
            return "Wallet not found";
        }
        $usd_rate = $this->getExchangeRate('USD');
        $gbp_rate = $this->getExchangeRate('GBP');
        $eur_rate = $this->getExchangeRate('EUR');
        $wallet['balance_usd'] = round($wallet['balance'] * $usd_rate, 2);
        $wallet['balance_gbp'] = round($wallet['balance'] * $gbp_rate, 2);
        $wallet['balance_eur'] = round($wallet['balance'] * $eur_rate, 2);
        return $wallet;
    }

    
        public function deleteWallet($id) {
            $stmt = $this->db->prepare("DELETE FROM wallets WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    
    
}

