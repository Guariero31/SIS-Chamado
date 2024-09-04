<?php

namespace App\Filament\Resources;

use App\Enum\PrioridadeChamado;
use App\Enum\Status;
use App\Filament\Resources\ChamadoResource\Pages;
use App\Filament\Resources\ChamadoResource\RelationManagers;
use App\Models\Chamado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChamadoResource extends Resource
{
    protected static ?string $model = Chamado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Grid::make()->columns([
                        'sm' => 1,
                        'lg' => 2
                    ])->schema([
                        Forms\Components\TextInput::make('tecnico_id')
                            ->numeric(),
                        Forms\Components\Select::make('subcategoria_id')
                            ->label('Subcategoria')
                            ->native(false)
                            ->relationship('subcategoria', 'nome'),
                        Forms\Components\MarkdownEditor::make('descricao')
                            ->label('Descrição')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('prioridade')
                            ->label('Prioridade')
                            ->options(PrioridadeChamado::class)
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options(Status::class)
                            ->native(false)
                            ->required(),
                        Forms\Components\DateTimePicker::make('data_abertura')
                            ->required(),
                        Forms\Components\DateTimePicker::make('data_atualizacao')
                            ->required(),
                        Forms\Components\DateTimePicker::make('data_conclusa'),
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tecnico_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subcategoria_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('prioridade'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('data_abertura')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_atualizacao')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_conclusa')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListChamados::route('/'),
            'create' => Pages\CreateChamado::route('/create'),
            'edit' => Pages\EditChamado::route('/{record}/edit'),
        ];
    }
}
