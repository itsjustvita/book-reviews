@extends('layouts.app')

@section('content')
    <form method="GET" action="{{ route('books.index') }}" class="mb-4 flex items-center space-x-2">
        <input class="input h-10" name="title" type="text" placeholder="Titel suchen" value="{{ request('title') }}" />
        <input type="hidden" name="filter" value="{{ request('filter') }}" />
        <button class="btn h-10" type="submit">Suche</button>
        <a class="btn h-10" href="{{ route('books.index') }}"> Reset </a>
    </form>
    <div class="filter-container mb-4 flex">
        @php
            $filters = [
                '' => 'Neuste',
                'popular_last_month' => 'Beliebteste letzten Monat',
                'popular_last_6_months' => 'Beliebteste letzten 6 Monate',
                'highest_rated_last_month' => 'Bestbewertete letzten Monat',
                'highest_rated_last_6_months' => 'Bestbewertete letzten 6 Monate',
            ];
        @endphp
        @foreach ($filters as $key => $label)
            <a href="{{ route('books.index', ['filter' => $key]) }}" class="filter-item {{ request('filter') === $key || request('filter') === null && $key == '' ? 'filter-item-active' : '' }}">{{ $label }}</a>
        @endforeach
    </div>
    <ul>
    @forelse($books as $book)
        <li class="mb-4">
            <div class="book-item">
                <div
                    class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="{{ route('books.show',$book) }}" class="book-title">{{ $book->title }}</a>
                        <span class="book-author">by {{ $book->author }}</span>
                    </div>
                    <div>
                        <div class="book-rating">
                            {{ $book->reviews_avg_rating }}
                        </div>
                        <div class="book-review-count">
                            out {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @empty
        <li class="mb-4">
            <div class="empty-book-item">
                <p class="empty-text">No books found</p>
                <a href="{{ route('books.index') }}" class="reset-link">Reset</a>
            </div>
        </li>
    @endforelse
    </ul>
@endsection
