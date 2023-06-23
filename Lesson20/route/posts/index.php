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
                        <th>Заголовок</th>
                        <th>Отправитель</th>
                        <th>E-mail</th>
                        <th>Отправлено</th>
                        <th>Сообщение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($messages->getSenderMessages() as $message) {
                        echo "<tr>";
                        echo "<td>" . $message['title'] . "</td>";
                        echo "<td>" . $message['surname'] . " " . $message['first_name'] . " " . $message['middle_name'] . "</td>";
                        echo "<td>" . $message['email'] . "</td>";
                        echo "<td>" . $message['creation_time'] . "</td>";
                        echo "<td>" . $message['text'] . "</td>";
                        echo "</tr>";
                    } ?>
                    </tbody>
                </table>
                <h2>Иходящие сообщения:</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Получатель</th>
                        <th>E-mail</th>
                        <th>Отправлено</th>
                        <th>Сообщение</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($messages->getRecepientMessages() as $message) {
                        echo "<tr>";
                        echo "<td>" . $message['title'] . "</td>";
                        echo "<td>" . $message['surname'] . " " . $message['first_name'] . " " . $message['middle_name'] . "</td>";
                        echo "<td>" . $message['email'] . "</td>";
                        echo "<td>" . $message['creation_time'] . "</td>";
                        echo "<td>" . $message['text'] . "</td>";
                        echo "</tr>";
                    } ?>
                    </tbody>
                </table>
                <?php if (in_array(4,$userProfile->getUserGroupId())) {
                    echo "<p><strong>Отправить сообщение</strong></p>";
                } else if (in_array(3,$userProfile->getUserGroupId())) {
                    echo "<p> сможете отправлять сообщения после прохождения модерации</p>"; }?>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
?>