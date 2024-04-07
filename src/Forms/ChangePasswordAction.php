<?php

namespace GeoffTech\FilamentTools\Forms;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ChangePasswordAction extends Action
{

  public static function make(?string $name = null): static
  {
    return parent::make('Change password')
      ->icon('heroicon-o-lock-closed')
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
        $user->password = $data['password'];
        $user->save();

        if (request()->hasSession()) {
          request()
            ->session()
            ->put(['password_hash_' . Filament::getAuthGuard() => $data['password']]);
        }

      })
      ->after(function () {

        Notification::make()
          ->title('Password successfully changed')
          ->success()
          ->send();

      });
  }

}
