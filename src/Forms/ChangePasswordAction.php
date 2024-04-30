<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Auth;

class ChangePasswordAction
{

  public static function make(?string $name = 'Change password'): Action
  {
    return Action::make($name)
      ->label('Change password')
      ->icon('heroicon-o-lock-closed')
      ->modalWidth(MaxWidth::Medium)
      ->form([

        TextInput::make('password')
          ->required()
          ->password()
          ->revealable()
          ->confirmed()
          ->maxLength(255),

        TextInput::make('password_confirmation')
          ->label('Confirm password')
          ->required()
          ->revealable()
          ->password()
          ->maxLength(255),

      ])
      ->action(function (array $data): void {

        $user = Auth::user();

        if (!$user) {
          return;
        }

        $user->update([
          'password' => $data['password'],
        ]);

        if (request()->hasSession()) {
          request()
            ->session()
            ->put(['password_hash_' . Filament::getAuthGuard() => $data['password']]);
        }

        Auth::login($user);

      })
      ->after(function () {

        Notification::make()
          ->title('Password successfully changed')
          ->success()
          ->send();

      });
  }

}
