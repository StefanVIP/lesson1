<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
// $userAuth->isAuthorized() ?: header("Location: /index.php?login=yes");
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h1><?php
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
<h2>Входящие сообщения:</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Отправитель</th>
                        <th>Заголовок</th>
                        <th>Сообщение</th>
                        <th>Отправлено</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($incomingMessages as $message) {
                        echo "<tr>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . $message->getSender() . "</td>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . $message->getTitle() . "</td>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . cutString($message->getText(),70) . "</td>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . $message->getDateTime() . "</td>";
                        echo "</tr>";
                    } ?>
                    </tbody>
                </table>
                <h2>Исходящие сообщения:</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Получатель</th>
                        <th>Заголовок</th>
                        <th>Сообщение</th>
                        <th>Отправлено</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($outgoingMessages as $message) {
                        echo "<tr>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . $message->getRecipient() . "</td>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . $message->getTitle() . "</td>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . cutString($message->getText(),70) . "</td>";
                        echo "<td><a href=message.php?id=" . $message->getId() . ">" . $message->getDateTime() . "</td>";
                        echo "</tr>";
                    } ?>
                    </tbody>
                </table>
                <?php if (in_array(4, $user->getGroupId())) {
                    echo "<h2><strong><a href='add/index.php'>Отправить сообщение</a></strong></h2>";
                } else if (in_array(3, $user->getGroupId())) {
                    echo "<p> Вы сможете отправлять сообщения после прохождения модерации</p>"; }?>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
