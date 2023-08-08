<?php
require_once("PayPal-PHP-SDK/autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AXeVY3xwA_wM-MarcjDjsL6Z9QCTe9VjXIuIu_S2PwBUiLU3zTrSHFwNcYyZLv-9D-Oqr-CR-uoSncMi',     // ClientID
            'ED0njLax2TbJqwLY9kxHB_G3TyHDZKm5zf7Ro3VcPDUTUdfm8qFGqRns2l1ceEAuZ01rZNzOIvVi2TvR'      // ClientSecret
        )
);
