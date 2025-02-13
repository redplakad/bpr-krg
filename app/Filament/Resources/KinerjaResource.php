<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KinerjaResource\Pages;
use App\Filament\Resources\KinerjaResource\RelationManagers;
use App\Models\Kinerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Checkbox;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Forms\Components\Select;

class KinerjaResource extends Resource
{
    protected static ?string $model = Kinerja::class;

    protected static ?string $navigationIcon = 'gmdi-menu-book-tt';

    public function getTitle(): string | Htmlable
    {
        return __('Rencana Kerja');
    }

    public static function getLabel(): string
    {
        return __('Rencana Kerja');
    }

    public static function getPluralLabel(): string
    {
        return __('Rencana Kerja');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Checkbox::make('checklist')->inline(false)->label('Checklist')
                    ->helperText('Silahkan Ceklis apabila rencana kerja sudah selesai dikerjakan'),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Select::make('kategori')
                    ->searchable()
                    ->options([
                        'Kredit' => [
                            'penagihan' => 'Penagihan Debitur',
                            'survei' => 'Survei Debitur',
                            'analisa' => 'Analisa Kredit',
                            'slik' => 'Input Slik Kredit',
                            'deskcollect' => 'Desk Collection',
                            'ekspansi' => 'Ekspansi Kredit',
                            'kunjungan' => 'Kunjungan Dinas/Perusahaan'
                        ],
                        'Dana' => [
                            'pengambilan' => 'Pengambilan Dana',
                            'pelayanan' => 'Pelayanan Nasabah',
                            'promosi' => 'Promosi Produk',
                        ],
                        'Lainnya' => [
                            'lain-lain' => 'Lain-lain',
                        ],
                    ])->label('Kategori'),
                Forms\Components\TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('lampiran1')
                    ->image()
                    ->label('Lampiran Foto')
                    ->helperText('Lampirkan foto jika diperlukan')
                    ->downloadable(),
                Forms\Components\FileUpload::make('lampiran2')
                    ->label('Lampiran File')
                    ->helperText('Lampirkan file berupa excel, word, text jika diperlukan')
                    ->downloadable(),
            ]);
    }

    protected function mutateFormDataUsing(array $data): array
    {
        // Automatically set the user_id to the currently authenticated user's ID
        $data['user_id'] = auth()->id();
        return $data;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn (Builder $query) => (auth()->user()->role === 'admin') ? $query->where('cab', auth()->user()->branch_code)->orderBy('created_at', 'desc') : $query->where('user_id', auth()->id())->orderBy('created_at', 'desc'))
            ->columns([
                Tables\Columns\CheckboxColumn::make('checklist')
                    ->label('Selesai'),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('lampiran1')
                    ->searchable(),
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
            'index' => Pages\ListKinerjas::route('/'),
            'create' => Pages\CreateKinerja::route('/create'),
            'edit' => Pages\EditKinerja::route('/{record}/edit'),
        ];
    }
}
