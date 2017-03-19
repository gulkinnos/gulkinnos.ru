<?php

/**
 * Класс отвечает за логирование информации о входах на сайт.
 *
 * @author Aleksandr Golubev aka gulkinnos <gulkinnos@gmail.com>
 */
class Visitors {
    /** Добавляет запись о входе пользователя на сайт.
     * Использует $_SERVER для получения информации.
     * Добавить id пользователя, когда сделаю авторизацию и пользователей.
     * 
     */
    public function writeLog() {
        $app = App::getInstance();
        //$user=$app->getCurrentUser();
        $dbc = $app->getDB();
        $sql = '
            INSERT INTO
                `visitors`
               (`referer`,
                `ip`,
                `datetime`,
                `visited_page`,
                `server_headers`,
                `HTTP_USER_AGENT`
                )
            VALUES
               ("' . $dbc->real_escape_string($_SERVER['HTTP_REFERER']) . '",
                "' . $dbc->real_escape_string($_SERVER['REMOTE_ADDR']) . '",
                CURRENT_TIMESTAMP,
                "' . $dbc->real_escape_string($_SERVER['REQUEST_URI']) . '",
                "' . $dbc->real_escape_string(serialize($_SERVER)) . '",
                "' .  $dbc->real_escape_string((isset($_SERVER['HTTP_USER_AGENT']))?$_SERVER['HTTP_USER_AGENT']:'--'). '"
                    );
            ';
        $dbc->query($sql);
        return;
    }

}
