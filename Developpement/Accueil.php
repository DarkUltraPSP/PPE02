<?php
include_once 'include/header.php';
print_r(ProduitManager::findAllProduits());

echo "<pre>";
print_r(ClientManager::findAllClients());
echo "</pre>";

echo "<pre>";
print_r(CommandeManager::findAllCommandes());
echo "</pre>";
?>

<?php
include_once 'include/footer.php';