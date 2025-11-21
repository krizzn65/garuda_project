<?php

namespace App\Filament\Resources\Flights\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Schema;

class FlightForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Wizard\Step::make('Flight Information')
                        ->schema([
                            TextInput::make('flight_number')
                                ->unique(ignoreRecord: true)
                                ->required(),
                            Select::make('airline_id')
                                ->relationship('airline', 'name')
                                ->required(),
                        ]),
                    Wizard\Step::make('Flight Segments')
                        ->schema([
                            Repeater::make('flight_segments')
                                ->relationship('segments')
                                ->schema([
                                    TextInput::make('sequence')
                                        ->numeric()
                                        ->required(),
                                    Select::make('airport_id')
                                        ->relationship('airport', 'name')
                                        ->required(),
                                    DateTimePicker::make('time')
                                        ->required(),
                                ])
                                ->collapsed(false)
                                ->minItems(1),
                        ]),
                    Wizard\Step::make('Flight Class')
                        ->schema([
                            repeater::make('flight_classes')
                                ->relationship('classes')
                                ->schema([
                                    Select::make('class_type')
                                        ->options([
                                            'economy' => 'Economy',
                                            'business' => 'Business',
                                        ])
                                        ->required(),
                                    TextInput::make('price')
                                        ->numeric()
                                        ->prefix('IDR ')
                                        ->minValue(0)
                                        ->required(),
                                    TextInput::make('total_seats')
                                        ->numeric()
                                        ->label('Total Seats')
                                        ->minValue(1)
                                        ->required(),
                                    Select::make('facilities')
                                        ->relationship('facilities', 'name')
                                        ->multiple()
                                        ->required(),
                                ]),
                        ]),
                ])->columnSpan(2),
            ]);
    }
}
