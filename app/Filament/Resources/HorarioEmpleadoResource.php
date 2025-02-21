<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorarioEmpleadoResource\Pages;
use App\Filament\Resources\HorarioEmpleadoResource\RelationManagers;
use App\Models\HorarioEmpleado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HorarioEmpleadoResource extends Resource
{
    protected static ?string $model = HorarioEmpleado::class;

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
                Forms\Components\TextInput::make('dia_semana_horario_empleado')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('es_dia_descanso_horario_empleado')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_inicio_vigencia_horario_empleado')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin_vigencia_horario_empleado'),
                Forms\Components\TextInput::make('motivo_cambio_horario_empleado')
                    ->maxLength(255),
                Forms\Components\Toggle::make('estado_horario_empleado')
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
                Tables\Columns\TextColumn::make('dia_semana_horario_empleado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('es_dia_descanso_horario_empleado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fecha_inicio_vigencia_horario_empleado')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin_vigencia_horario_empleado')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('motivo_cambio_horario_empleado')
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado_horario_empleado')
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
            'index' => Pages\ListHorarioEmpleados::route('/'),
            'create' => Pages\CreateHorarioEmpleado::route('/create'),
            'edit' => Pages\EditHorarioEmpleado::route('/{record}/edit'),
        ];
    }
}
