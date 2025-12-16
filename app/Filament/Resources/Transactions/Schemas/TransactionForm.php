<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Umum')
                    ->schema([
                        TextInput::make('code')
                            ->required(),
                        Select::make('flight_id')
                            ->relationship('flight', 'flight_number')
                            ->required(),
                        Select::make('flight_class_id')
                            ->relationship('class', 'class_type')
                            ->required(),
                    ])
                    ->columnSpan('full'),
                    
                Section::make('Informasi Penumpang')
                    ->schema([
                        TextInput::make('number_of_passengers')
                            ->required(),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->required(),
                        TextInput::make('phone')
                            ->required(),
                        Section::make('Daftar Penumpang')
                            ->schema([
                                Repeater::make('passenger')
                                    ->relationship('passengers')
                                    ->schema([
                                        Select::make('flight_seat_id')
                                            ->label('Seat Name')
                                            ->relationship('seat', 'name')
                                            ->required(),
                                        TextInput::make('name'),
                                        TextInput::make('date_of_birth'),
                                        TextInput::make('nationality'),
                                    ]),
                            ])
                            ->columnSpan('full'),
                    ])
                    ->columnSpan('full'),
                    
                Section::make('Pembayaran')
                    ->schema([
                        Select::make('promo_code_id')
                            ->relationship('promo', 'code'),
                        TextInput::make('payment_status'),
                        TextInput::make('sub_total'),
                        TextInput::make('grand_total'),
                    ])
                    ->columnSpan('full'),
            ]);
    }
}
