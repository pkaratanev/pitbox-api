<?php

namespace App\Filament\Resources;

use App\Enum\GarageTypeEnum;
use App\Filament\Resources\GarageResource\Pages;
use App\Filament\Resources\GarageResource\RelationManagers;
use App\Models\Garage;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class GarageResource extends Resource
{
    protected static ?string $model = Garage::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Garages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\TextInput::make('address'),
                Forms\Components\Select::make('type')
                    ->options(array_column(GarageTypeEnum::cases(), 'value')),
                Forms\Components\Select::make('owner')
                    ->relationship(name: 'owner', titleAttribute: 'name')
                    ->searchable(),
                Forms\Components\TextArea::make('description'),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('photos')
                    ->collection('garage_photos')
                    ->reorderable()
                    ->multiple(),
                Map::make('location')
                    ->defaultZoom(7)
                    ->geolocate()
                    ->clickable(true)
                    ->draggable()
                    ->defaultLocation([42.660821, 25.150656]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('owner.name'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('visit')
                    ->url(function (Garage $garage) {
                        return "https://www.google.com/maps/place/{$garage->location['lat']},{$garage->location['lng']}";
                    })
                    ->tooltip('View Garage Location')
                    ->openUrlInNewTab()
                    ->icon('heroicon-m-map-pin')
                    ->iconButton(),
                Tables\Actions\EditAction::make()
                    ->tooltip('Edit Garage')
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
            'index' => Pages\ListGarages::route('/'),
            'create' => Pages\CreateGarage::route('/create'),
            'edit' => Pages\EditGarage::route('/{record}/edit'),
        ];
    }
}
