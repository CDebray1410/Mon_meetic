<?php

class ChatManager extends MainManager
{
    public function ChatroomMessagesGet()
    {
        $db = $this->connectDb();
        $getMessages = $db->query('SELECT UPPER(full_name) AS full_name_upper, chatroom_message, DATE_FORMAT(message_date, \'%d/%m/%Y à %Hh%im%ss \') AS message_date_fr FROM chatroom ORDER BY id_message DESC LIMIT 0,10');
        return $getMessages;
    }

    public function ChatroomMessagesSend($first_name, $last_name, $message)
    {
        $db = $this->connectDb();
        $full_name = $first_name . " " . $last_name;
        $message = strip_tags($message);

        $add_message = $db->prepare('INSERT INTO chatroom(full_name, chatroom_message) VALUES(?, ?)');
        $add_message->execute(array($full_name, $message));
    }
}