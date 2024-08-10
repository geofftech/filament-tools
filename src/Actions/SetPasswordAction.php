<?php

namespace GeoffTech\FilamentTools\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\MaxWidth;

class SetPasswordAction
{
    public static function make(): Action
    {
        return Action::make('Set password')
            ->label('Set password')
            ->icon('heroicon-o-lock-closed')
            ->modalWidth(MaxWidth::Medium)
            ->form([

                TextInput::make('password')
                    ->required()
                    ->password()
                    ->confirmed()
                    ->maxLength(255),

                TextInput::make('password_confirmation')
                    ->label('Confirm password')
                    ->required()
                    ->password()
                    ->maxLength(255),

            ])
            ->action(function (array $data, $record): void {

                $record->password = $data['password'];
                $record->save();

            })
            ->after(function () {

                Notification::make()
                    ->title('Password successfully changed')
                    ->success()
                    ->send();

            });
    }
}
