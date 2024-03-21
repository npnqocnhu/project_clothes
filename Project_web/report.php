<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="./asset/css/mainadmin.css">
    <link rel="stylesheet" href="./asset/css/ad_product1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kanit:wght@500&family=Quicksand:wght@700&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        .admin-report-cover{
            padding-top: 100px;
        }

        .admin-content-list__big{
            width: 800px;
        }
    </style>
</head>
<body>
<div class="admin-main">
    <div class="admin__header">
        <ul class="admin-main__header">
            <li class="admin-main__header-title">Kingdom</li>
        </ul>
        <ul class="admin-main__header">    
            <li class="admin__search-li open_login_ad">
                <span class="admin-name">
                    Admin
                    <i class="fa-solid fa-caret-down"></i>
                </span>
                <div class="admin__login">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <a href="./admin.php">Log out</a>
                </div>
            </li>
        </ul>
    </div> 
    <div class="admin-report-cover">
            <div class="admin-main-center">
                <div class="admin-content-list__big">
                    <p class="admin-list__big-text"><i class="fa-solid fa-chart-simple"></i>Manage invoices by product</p>
                </div>
            </div>
            <a href="./bill.php" style="text-decoration: none;">
                <div class="admin-main-center">
                    <div class="admin-content-list__big">
                        <p class="admin-list__big-text"><i class="fa-solid fa-wallet"></i> Bill</p>
                    </div>
                </div>
            </a>
    </div>
</div>