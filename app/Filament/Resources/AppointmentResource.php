<?php

namespace App\Filament\Resources;

use App\Enum\AppointmentStatusEnum;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subject'),
                Forms\Components\DateTimePicker::make('start_datetime'),
                Forms\Components\TextArea::make('request_description'),
                Forms\Components\TextArea::make('work_description'),
                Forms\Components\Select::make('type')
                    ->options(array_column(AppointmentStatusEnum::cases(), 'value')),
                Forms\Components\Select::make('client')->relationship(name: 'client', titleAttribute: 'name'),
                Forms\Components\Select::make('garage')->relationship(name: 'garage', titleAttribute: 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('subject'),
                Tables\Columns\TextColumn::make('request_description'),
                Tables\Columns\TextColumn::make('work_description'),
                // TODO: Format datetime better
                Tables\Columns\TextColumn::make('start_datetime'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'requested' => 'gray',
                        'in_progress' => 'warning',
                        'completed' => 'success',
                    }),
                Tables\Columns\TextColumn::make('client.name'),
                Tables\Columns\TextColumn::make('garage.name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
