<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HorarioDepartamentoResource\Pages;
use App\Filament\Resources\HorarioDepartamentoResource\RelationManagers;
use App\Models\HorarioDepartamento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HorarioDepartamentoResource extends Resource
{
    protected static ?string $model = HorarioDepartamento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('departamento_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('turno_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dia_semana_horario_departamento')
                    ->required()
                    ->numeric(),
                Forms\Components\Toggle::make('es_dia_descanso_horario_departamento')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_inicio_vigencia_horario_departamento')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin_vigencia_horario_departamento'),
                Forms\Components\TextInput::make('motivo_cambio_horario_departamento')
                    ->maxLength(255),
                Forms\Components\Toggle::make('estado_horario_departamento')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('departamento_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('turno_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dia_semana_horario_departamento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('es_dia_descanso_horario_departamento')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fecha_inicio_vigencia_horario_departamento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin_vigencia_horario_departamento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('motivo_cambio_horario_departamento')
                    ->searchable(),
                Tables\Columns\IconColumn::make('estado_horario_departamento')
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
            'index' => Pages\ListHorarioDepartamentos::route('/'),
            'create' => Pages\CreateHorarioDepartamento::route('/create'),
            'edit' => Pages\EditHorarioDepartamento::route('/{record}/edit'),
        ];
    }
}
