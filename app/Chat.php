<?php


namespace App;

use ParseCsv\Csv;

class Chat
{
    private array $messageHistory = [];
    private Csv $reader;

    public function __construct()
    {

        $this->reader = new Csv();
        $this->reader->delimiter = ";";
        $this->reader->parseFile('app/chatHistory.csv');
        foreach ($this->reader->data as $data) {
            $this->addMessage(new ChatData($data['nickname'], $data['message']));
        }
    }

    public function addMessage(ChatData $message): void
    {
        $this->messageHistory[] = $message;
        $this->save();
    }

    public function messageHistory(): array
    {
        return $this->messageHistory;
    }

    public function validateInput(ChatData $message): bool
    {
        if ($message->nickname() === "") {
            return false;
        }
        if ($message->message() === "") {
            return false;
        }
        return true;
    }

    public function save(): void
    {
        $f = fopen('app/ChatHistory.csv', 'w');
        $headers = ['nickname', 'message'];
        fputcsv($f, $headers, ';');
        foreach ($this->messageHistory() as $message) {
            fputcsv($f, [$message->nickname(), $message->message()], ';');
        }
        fclose($f);
    }
}