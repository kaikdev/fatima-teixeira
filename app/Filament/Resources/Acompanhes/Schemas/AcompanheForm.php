<?php

namespace App\Filament\Resources\Acompanhes\Schemas;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Flex;

class AcompanheForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Flex::make([
                Section::make([
                    TextInput::make('title')
                    ->live(onBlur: true)
                    ->label('Título')
                    ->maxLength(150)
                    ->reactive()
                    ->suffix(fn ($state) => (strlen((string) $state) ?: 0) . '/150')
                    ->required(),

                    TextInput::make('author')
                    ->label('Autor')
                    ->maxLength(100)
                    ->reactive()
                    ->suffix(fn ($state) => (strlen((string) $state) ?: 0) . '/100')
                    ->required(),

                    Textarea::make('resume')
                    ->rows(5)
                    ->label('Resumo')
                    ->required()
                    ->maxLength(400)
                    ->reactive()
                    ->helperText(fn ($state) =>
                        $state
                            ? strlen((string) $state) . ' caracteres de 400.'
                            : '0 de 400 caracteres.'
                    )
                    ->columnSpanFull(),

                    MarkdownEditor::make('text')
                    ->label('Texto')
                    ->required()
                    ->columnSpanFull(),


                    Builder::make('gallery')
                    ->label('Galeria')
                    ->blocks([
                        Block::make('Imagem')
                        ->label('Imagem')
                        ->schema([
                            FileUpload::make('imagens')
                            ->visibility('public')
                            ->disk('public')
                            ->directory('acompanhe/gallery/images')
                            ->reorderable()
                            ->image()
                            ->maxFiles(10)
                            ->getUploadedFileNameForStorageUsing(function ($file) {
                                return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
                            })
                            ->saveUploadedFileUsing(function ($file, $livewire, $set) {
                                $manager = new ImageManager(new Driver());

                                $image = $manager->read($file->getRealPath())->encode(new \Intervention\Image\Encoders\WebpEncoder(90));

                                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
                                $path = 'acompanhe/gallery/images/' . $filename;

                                Storage::disk('public')->put($path, (string) $image);

                                return $path;
                            })
                            ->deleteUploadedFileUsing(function ($file) {
                                if (is_string($file) && Storage::disk('public')->exists($file)) {
                                    Storage::disk('public')->delete($file);
                                }
                            }),
                        ]),

                        Block::make('video')
                        ->label('Vídeo')
                        ->schema([
                            TextInput::make('url')
                            ->placeholder('URL do vídeo (YouTube)')
                            ->url()
                            ->reactive()
                            ->required(),

                            ViewField::make('url')
                            ->label('Pré-visualização')
                            ->reactive()
                            ->view('filament.iframe_youtube'),
                        ]),
                    ])
                    ->required()
                    ->columnSpan('full')
                ]),

                Section::make('Publicação')
                ->description('Escolha quando o conteúdo será publicado.')
                ->schema([
                    Radio::make('status')
                        ->label('Modo de publicação')
                        ->options([
                            'now' => 'Publicar agora',
                            'schedule' => 'Agendar horário',
                            'disabled' => 'Desabilitar',
                        ])
                        ->default('now')
                        ->dehydrateStateUsing(fn ($state) => trim($state, '"'))
                        ->reactive(),

                    DateTimePicker::make('scheduled_at')
                        ->label('Agendar para')
                        ->visible(fn ($get) => $get('status') === 'schedule')
                        ->seconds(false)
                        ->nullable(),
                ])
                ->columns(1)
                ->collapsible()
                ->grow(false)

            ])->columnSpan('full'),
        ]);
    }
}
