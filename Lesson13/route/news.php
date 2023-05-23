<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/header.php';
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="catalog-collum-index">
                <h1><?php
                    // There is also a function makeHeadline in headline.php , but i think this method is better
                    echo array_column($mainMenu, 'title', 'path')[$_SERVER["REQUEST_URI"]]; ?></h1>
                <h2>Время как вода</h2>
                <p>Американский профессор Джозеф Дитури побил мировой рекорд по продолжительности нахождения под водой
                    в условиях экстремального давления, сообщает Associated Press.</p>
                <p>В рамках проекта «Нептун 100» 55-летний Дитури провел более 74 дней в подводной капсуле
                    Jules у побережья Флориды.</p>
                <p>Из подводной капсулы, в которую провели интернет, Дитури ведет подробный блог и читает онлайн-курс
                    для студентов Университета Южной Флориды. Он собирается оставаться в ней до 9 июня, чтобы провести
                    под водой сто дней.</p>
                <h2>Выборы в Таиланде: кто победит и что будет дальше</h2>
                <p>В Таиланде сегодня прошли всеобщие выборы. 52,2 миллиона тайцев проголосовали за политические партии,
                    которые, в свою очередь, определят имя следующего премьер-министра.</p>
                <p>Оппозиция способна завоевать большинство мест в Палате представителей, но это не гарантирует ей
                    назначения своего премьера. Правящие консерваторы и вовсе рискуют оказаться с правительством
                    меньшинства, что сделает перспективы тайской политики крайне туманными.</p>
            </td>
        </tr>
    </table>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lesson13/templates/footer.php';
?>