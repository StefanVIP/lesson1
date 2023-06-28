<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
$message = $messageStorage->getMessageById($_GET['id']);
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h2><?= $message->getTitle() ?></h2>
                <p><b>Отправитель:</b> <?= $message->getSender() ?></p>
                <p><b>Сообщение: </b><?= $message->getText() ?></p>
                <p><b>Отправлено:</b><?= $message->getDateTime() ?></p>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
