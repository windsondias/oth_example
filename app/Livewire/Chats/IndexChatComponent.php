<?php

namespace App\Livewire\Chats;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class IndexChatComponent extends Component
{
    public ?string $message;

    public ?array $prompt;

    public ?array $history;

    public function ask(): void
    {
        $answer = null;

        $stream = OpenAI::chat()->createStreamed([
            'model' => 'gpt-3.5-turbo',
            'messages' => $this->prompt,
        ]);

        foreach ($stream as $response) {
            $choice = $this->formatContent($response->choices[0]->toArray());

            $answer .= $choice;

            $this->stream(
                to: 'answer',
                content: $choice,
            );
        }

        $this->history[] = $answer . '<br><br>';

        $this->setPrompt('assistant', $answer);
    }

    public function setPrompt(string $role, string $content): void
    {
        $this->prompt[] = ['role' => $role, 'content' => $content];
    }

    public function formatContent($content): array|string
    {
        return nl2br($content['delta']['content'] ?? '');
    }

    public function submit(): void
    {
        $this->setPrompt('user', $this->message);

        $this->history[] = 'You <br>' . $this->message . '<br><br>';

        $this->history[] = 'Chat <br>';

        $this->message = '';

        $this->js('$wire.ask()');
    }

    public function render(): View
    {
        return view('livewire.chats.index-chat-component');
    }
}
