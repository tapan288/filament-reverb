<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Notifications\Events\DatabaseNotificationsSent;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected function getHeaderActions(): array
    {
        return [
            Action::make('action')
                ->label('Update Profile')
                ->form([
                    TextInput::make('name')
                        ->required()
                        ->autofocus(),
                ])
                ->action(function (array $data) {
                    // perform an action
                    $user = User::find(2);

                    // Notification::make()
                    //     ->title('Saved successfully')
                    //     ->broadcast($user);
        
                    Notification::make()
                        ->title('Saved successfully')
                        ->success()
                        ->seconds(10)
                        ->sendToDatabase($user);

                    event(new DatabaseNotificationsSent($user));
                }),
        ];
    }
}
