<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'Robots.php';
?>
<?php if(isset($_GET['url'])): ?>
    <table class="table">
        <thead class="thead-default">
            <tr>
                <th>№</th>
                <th>Название проверки</th>
                <th>Статус</th>
                <th></th>
                <th>Текущее состояние</th>
            </tr>
        </thead>
        <tbody>
        <?php if(Robots::isRobots($_GET['url'])): ?>
            <tr>
                <td rowspan="2">1</td>
                <td rowspan="2">Проверка наличия файла robots.txt</td>
                <td rowspan="2" class="ok">Ok</td>
                <td>Состояние</td>
                <td>Файл robots.txt присутствует</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Доработки не требуются</td>
            </tr>
        <?php else: ?>
            <tr>
                <td rowspan="2">1</td>
                <td rowspan="2">Проверка наличия файла robots.txt</td>
                <td rowspan="2" class="err">Ошибка</td>
                <td>Состояние</td>
                <td>Файл robots.txt отсутствует</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Программист: Создать файл robots.txt и разместить его на сайте.</td>
            </tr>
        <?php endif ?>


        <?php if(Robots::countHost($_GET['url']) > 0): ?>
            <tr>
                <td rowspan="2">2</td>
                <td rowspan="2">Проверка указания директивы Host</td>
                <td rowspan="2" class="ok">Ok</td>
                <td>Состояние</td>
                <td>Директива Host указана</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Доработки не требуются</td>
            </tr>
        <?php else: ?>
            <tr>
                <td rowspan="2">2</td>
                <td rowspan="2">Проверка указания директивы Host</td>
                <td rowspan="2" class="err">Ошибка</td>
                <td>Состояние</td>
                <td>В файле robots.txt не указана директива Host</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Программист: Для того, чтобы поисковые системы знали, какая версия сайта является основных зеркалом, необходимо прописать адрес основного зеркала в директиве Host. В данный момент это не прописано. Необходимо добавить в файл robots.txt директиву Host. Директива Host задётся в файле 1 раз, после всех правил.</td>
            </tr>
        <?php endif ?>


        <?php if(Robots::countHost($_GET['url']) == 1): ?>
            <tr>
                <td rowspan="2">3</td>
                <td rowspan="2">Проверка количества директив Host, прописанных в файле</td>
                <td rowspan="2" class="ok">Ok</td>
                <td>Состояние</td>
                <td>В файле прописана 1 директива Host</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Доработки не требуются</td>
            </tr>
        <?php else: ?>
            <tr>
                <td rowspan="2">3</td>
                <td rowspan="2">Проверка количества директив Host, прописанных в файле</td>
                <td rowspan="2" class="err">Ошибка</td>
                <td>Состояние</td>
                <td>В файле прописано несколько директив Host</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Программист: Директива Host должна быть указана в файле толоко 1 раз. Необходимо удалить все дополнительные директивы Host и оставить только 1, корректную и соответствующую основному зеркалу сайта</td>
            </tr>
        <?php endif ?>


        <?php if(Robots::validRobotsSize($_GET['url']) < 32768): ?>
            <tr>
                <td rowspan="2">4</td>
                <td rowspan="2">Проверка размера файла robots.txt</td>
                <td rowspan="2" class="ok">Ok</td>
                <td>Состояние</td>
                <td>Размер файла robots.txt составляет <?=Robots::validRobotsSize($_GET['url'])/1024?> Кб, что находится в пределах допустимой нормы</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Доработки не требуются</td>
            </tr>
        <?php else: ?>
            <tr>
                <td rowspan="2">4</td>
                <td rowspan="2">Проверка размера файла robots.txt</td>
                <td rowspan="2" class="err">Ошибка</td>
                <td>Состояние</td>
                <td>Размера файла robots.txt составляет <?=Robots::validRobotsSize($_GET['url'])/1024?> Кб, что превышает допустимую норму</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Программист: Максимально допустимый размер файла robots.txt составляем 32 кб. Необходимо отредактировть файл robots.txt таким образом, чтобы его размер не превышал 32 Кб</td>
            </tr>
        <?php endif ?>


        <?php if(Robots::isSitemap($_GET['url'])): ?>
            <tr>
                <td rowspan="2">5</td>
                <td rowspan="2">Проверка указания директивы Sitemap</td>
                <td rowspan="2" class="ok">Ok</td>
                <td>Состояние</td>
                <td>Директива Sitemap указана</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Доработки не требуются</td>
            </tr>
        <?php else: ?>
            <tr>
                <td rowspan="2">5</td>
                <td rowspan="2">Проверка указания директивы Sitemap</td>
                <td rowspan="2" class="err">Ошибка</td>
                <td>Состояние</td>
                <td>В файле robots.txt не указана директива Sitemap</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Программист: Добавить в файл robots.txt директиву Sitemap</td>
            </tr>
        <?php endif ?>


        <?php if(Robots::respondeCode($_GET['url']) === true): ?>
            <tr>
                <td rowspan="2">6</td>
                <td rowspan="2">Проверка кода ответа сервера для файла robots.txt</td>
                <td rowspan="2" class="ok">Ok</td>
                <td>Состояние</td>
                <td>Файл robots.txt отдаёт код ответа сервера 200</td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Доработки не требуются</td>
            </tr>
        <?php else: ?>
            <tr>
                <td rowspan="2">6</td>
                <td rowspan="2">Проверка кода ответа сервера для файла robots.txt</td>
                <td rowspan="2" class="err">Ошибка</td>
                <td>Состояние</td>
                <td>При обращении к файлу robots.txt сервер возвращает код ответа: <?=Robots::respondeCode($_GET['url'])?></td>
            </tr>
            <tr>
                <td>Рекомендации</td>
                <td>Программист: Файл robots.txt должны отдавать код ответа 200, иначе файл не будет обрабатываться. Необходимо настроить сайт таким образом, чтобы при обращении к файлу sitemap.xml сервер возвращает код ответа 200</td>
            </tr>
        <?php endif ?>
        </tbody>
    </table>
<?php endif ?>
