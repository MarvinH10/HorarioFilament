<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsistenciaResource\Pages;
use App\Filament\Resources\AsistenciaResource\RelationManagers;
use App\Models\Asistencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsistenciaResource extends Resource
{
    protected static ?string $model = Asistencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('empleado_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('turno_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('feriado_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('fecha_asistencia')
                    ->required(),
                Forms\Components\DateTimePicker::make('hora_entrada_asistencia'),
                Forms\Components\DateTimePicker::make('hora_salida_asistencia'),
                Forms\Components\Toggle::make('es_feriado_asistencia')
                    ->required(),
                Forms\Components\TextInput::make('horas_trabajadas_asistencia')
                    ->numeric(),
                Forms\Components\TextInput::make('observacion_asistencia')
                    ->maxLength(255),
                Forms\Components\Toggle::make('estado_asistencia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('empleado_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('turno_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('feriado_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_asistencia')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_entrada_asistencia')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hora_salida_asistencia')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('es_feriado_asistencia')
                    ->boolean(),
                Tables\Columns\TextColumn::make('horas_trabajadas_asistencia')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('observacion_asistencia')
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado_asistencia')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAsistencias::route('/'),
            'create' => Pages\CreateAsistencia::route('/create'),
            'edit' => Pages\EditAsistencia::route('/{record}/edit'),
        ];
    }
}
