### Entry Point: index.php

```php
<?php
$route = $_GET['route'] ?? 'main';

switch ($route) {
    case 'cash':
        require 'controller/CashDonationController.php';
        $controller = new CashDonationController();
        $controller->handleDonation();
        break;
    case 'gear':
        require 'controller/GearDonationController.php';
        $controller = new GearDonationController();
        $controller->handleDonation();
        break;
    case 'equipment':
        require 'controller/EquipmentDonationController.php';
        $controller = new EquipmentDonationController();
        $controller->handleDonation();
        break;
    default:
        require 'controller/MainController.php';
        $controller = new MainController();
        $controller->index();
   break;
}
?>
