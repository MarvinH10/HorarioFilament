<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpleadoResource\Pages;
use App\Filament\Resources\EmpleadoResource\RelationManagers;
use App\Models\Cargo;
use App\Models\Empleado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;

class EmpleadoResource extends Resource
{
    protected static ?string $model = Empleado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Reporte';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('empresa_id')
                    ->label('Empresa')
                    ->relationship('empresa', 'nombre_empresa')
                    ->required(),
                Forms\Components\Select::make('departamento_id')
                    ->label('Departamento')
                    ->relationship('departamento', 'nombre_departamento')
                    ->required()
                    ->live(),
                Forms\Components\Select::make('cargo_id')
                    ->label('Cargo')
                    ->options(
                        fn(callable $get) =>
                        Cargo::where('departamento_id', $get('departamento_id'))
                            ->pluck('nombre_cargo', 'id')
                    )
                    ->reactive()
                    ->required(),
                Forms\Components\TextInput::make('nombre_empleado')
                    ->label('Nombre Empleado')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('apellido_empleado')
                    ->label('Apellido Empleado')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('documento_identidad_empleado')
                    ->label('Documento Identidad Empleado')
                    ->maxLength(20),
                Forms\Components\DatePicker::make('fecha_contratacion_empleado')
                    ->label('Fecha Contratacion Empleado')
                    ->required(),
                Forms\Components\Toggle::make('estado_empleado')
                    ->label('Estado Empleado')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('empresa.nombre_empresa')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('departamento.nombre_departamento')
                    ->label('Departamento')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cargo.nombre_cargo')
                    ->label('Cargo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_empleado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellido_empleado')
                    ->label('Apellido Empleado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('documento_identidad_empleado')
                    ->label('Documento Identidad Empleado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_contratacion_empleado')
                    ->label('Fecha Contratación Empleado')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('estado_empleado')
                    ->label('Estado Empleado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado en')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado en')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('Estado')
                    ->query(fn(Builder $query): Builder => $query->where('estado_empleado', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEmpleados::route('/'),
            'create' => Pages\CreateEmpleado::route('/create'),
            'edit' => Pages\EditEmpleado::route('/{record}/edit'),
        ];
    }
}
