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
                                        TextInput::make('seat.name'),
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
                        TextInput::make('promo.code'),
                        TextInput::make('promo.discount_type'),
                        TextInput::make('promo.discount'),
                        TextInput::make('payment_status'),
                        TextInput::make('sub_total'),
                        TextInput::make('grand_total'),
                    ])
                    ->columnSpan('full'),
            ]);
    }
}
