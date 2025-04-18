<?php

namespace GeoffTech\FilamentTools\Tables;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables\Actions\Action;

class SetPasswordAction
{
    public static function make(): Action
    {
        return Action::make('set_password')
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
