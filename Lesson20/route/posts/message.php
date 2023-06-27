<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
$messageById = $messageStorage->getMessageById($_GET['id']);
// $userAuth->isAuthorized() ?: header("Location: /index.php?login=yes");
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h2><?= $messageById->getTitle() ?></h2>
                <p><b>Отправитель:</b> <?= $messageById->getSender() ?></p>
                <p><b>Сообщение: </b><?= $messageById->getText() ?></p>
                <p><b>Отправлено:</b><?= $messageById->getDateTime() ?></p>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
