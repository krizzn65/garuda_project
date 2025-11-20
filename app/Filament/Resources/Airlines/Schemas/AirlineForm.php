<?php

namespace App\Filament\Resources\Airlines\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AirlineForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('Logo')
                    ->image()
                    ->directory('airlines')
                    ->required()
                    ->columnSpan(2),
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->required()]);
    }
}
