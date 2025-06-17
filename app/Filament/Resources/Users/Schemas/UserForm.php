<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([

                Section::make('Details')
                    ->schema([

                        TextInput::make('name')
                            ->required(),

                        TextInput::make('email')
                            ->email()
                            ->required(),

                    ]),

                Section::make('Notes')
                    ->schema([

                        Textarea::make('notes')
                            ->hiddenLabel()
                            ->columnSpanFull(),

                    ])
                    ->collapsible()
                    ->collapsed(
                        fn(Get $get) => blank($get('notes'))
                    ),

            ]);
    }
}
