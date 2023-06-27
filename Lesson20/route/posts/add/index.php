<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
// $userAuth->isAuthorized() ?: header("Location: /index.php?login=yes");
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
<h1>Создать сообщение</h1>
                <form action="" method="post" name="add_message">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <label for="title">Заголовок:</label>
                                <input id="title" name="title">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="text">Текст сообщения:</label>
                                <input id="text" name="text">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="recipient">Получатель:</label>
                                <select id="recipient" name="recipient">
                                <option disabled>Выберите получателя</option>
                                <?php
                                foreach ($allUsers as $user) {
                                    echo '<option value="' . $user->getId() . '">' . $user->getFirstName() . " " . $user->getMiddleName() . " " . mb_substr($user->getLastName(),0,1) . "." . '</option>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name="submit_message" type="submit" value="Отправить">
                                <p class="error"><?= isset($errorEmpty) ? $errorEmpty : ''; ?></p>
                                <p class="authorized"><?= isset($successSend) ? $successSend : ''; ?></p>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
