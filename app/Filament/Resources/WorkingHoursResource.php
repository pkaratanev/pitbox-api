<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkingHoursResource\Pages;
use App\Filament\Resources\WorkingHoursResource\RelationManagers;
use App\Models\WorkingHours;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkingHoursResource extends Resource
{
    protected static ?string $model = WorkingHours::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Garages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TimePicker::make('sunday_open'),
                Forms\Components\TimePicker::make('sunday_close'),
                Forms\Components\TimePicker::make('monday_open'),
                Forms\Components\TimePicker::make('monday_close'),
                Forms\Components\TimePicker::make('tuesday_open'),
                Forms\Components\TimePicker::make('tuesday_close'),
                Forms\Components\TimePicker::make('wednesday_open'),
                Forms\Components\TimePicker::make('wednesday_close'),
                Forms\Components\TimePicker::make('thursday_open'),
                Forms\Components\TimePicker::make('thursday_close'),
                Forms\Components\TimePicker::make('friday_open'),
                Forms\Components\TimePicker::make('friday_close'),
                Forms\Components\TimePicker::make('saturday_open'),
                Forms\Components\TimePicker::make('saturday_close'),
                Forms\Components\Select::make('garage')->relationship(name: 'garage', titleAttribute: 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('garage.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->tooltip('Edit Working Hours')
                    ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkingHours::route('/'),
            'create' => Pages\CreateWorkingHours::route('/create'),
            'edit' => Pages\EditWorkingHours::route('/{record}/edit'),
        ];
    }
}
