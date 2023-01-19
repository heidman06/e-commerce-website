<!DOCTYPE html>
<html lang="en">

<head>
    <!-- REQUIRE -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE -->
    <title>Desktop Builder ADMIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/order.css">
    <link rel="stylesheet" href="../../CSS/navAdmin.css">
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Oleo+Script&family=Roboto:wght@100;400;500;900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- NAV ADMIN -->
    <?php
    require './adminGeneralPartPage/adminNavbar.php';
    ?>

    <div class="container">
        <div class="list-title">ORDER</div>
        <div class="div-complet-item">
            <div class="div-order">
                <div class="div-item-l-side">
                    <div class="div-id-order  info-order">ID : 99999</div>
                    <div class="name-client info-order">Jean CLAUDE</div>
                    <div class="email-client info-order">jeanclaude@gmail.com</div>
                    <div class="div-date info-order">10/12/2022</div> <!-- PAS OBLIGATOIRE JE PENSE -->
                    <div class="div-adr info-order">145B rue de FRANCE 06000 Nice FRANCE</div>
                    <div class="tt-price info-order">TOTAL : 99999,99 €</div>
                    <div class="div-action">
                        <div class="div-remove"><i class="fa-solid fa-trash-can"></i></div>
                        <div class="div-edit"><a href="editOrder.php"><i class="fa-regular fa-pen-to-square"></i></a></div>
                    </div>
                </div>
                <div class="div-item-r-side">
                    <div class="div-all-item">
                        <div class="div-one-item">
                            <div class="div-name-item">Lorem</div>
                            <div class="div-quantity-price">
                                <div class="div-quantity">X</div>
                                <div class="div-price">999,99 €</div>
                            </div>
                        </div>
                        <div class="div-bar-item"></div>
                        <div class="div-one-item">
                            <div class="div-name-item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint iste molestiae suscipit ad quia laboriosam maxime, architecto consequatur, modi quisquam laborum ab optio explicabo ipsam libero quis voluptas. Nisi, dignissimos.</div>
                            <div class="div-quantity-price">
                                <div class="div-quantity">X</div>
                                <div class="div-price">9999,99 €</div>
                            </div>
                        </div>
                        <div class="div-bar-item"></div>
                    </div>
                </div>
            </div>
            <div class="bottom-line"></div>
        </div>
        <div class="div-complet-item">
            <div class="div-order">
                <div class="div-item-l-side">
                    <div class="div-id-order  info-order">ID : 58234</div>
                    <div class="name-client info-order">Jean CLAUDE</div>
                    <div class="email-client info-order">jeanclaude@gmail.com</div>
                    <div class="div-date info-order">10/12/2022</div> <!-- PAS OBLIGATOIRE JE PENSE -->
                    <div class="div-adr info-order">145B rue de FRANCE 06000 Nice FRANCE</div>
                    <div class="tt-price">TOTAL : 99999,99 €</div>
                    <div class="div-action">
                        <div class="div-remove"><i class="fa-solid fa-trash-can"></i></div>
                        <div class="div-edit"><a href="editOrder.php"><i class="fa-regular fa-pen-to-square"></i></a></div>
                    </div>
                </div>
                <div class="div-item-r-side">
                    <div class="div-all-item">
                        <div class="div-one-item">
                            <div class="div-name-item">Lorem</div>
                            <div class="div-quantity-price">
                                <div class="div-quantity">X</div>
                                <div class="div-price">999,99 €</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-line"></div>
        </div>
    </div>


    <?php
    require './../generalPartPage/footerGeneral.php';
    ?>
    <!-- SCRIPT -->
    <script src="../../JS/fonctionsSite.js"></script>

    <!-- ICONS -->
    <script src="https://kit.fontawesome.com/9e3559e954.js" crossorigin="anonymous"></script>
</body>

</html>