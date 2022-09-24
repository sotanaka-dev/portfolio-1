<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Products extends Component
{
    use WithPagination;

    private const INDEX_OF_ALL_CATEGORIES = 0;
    private const EMPTY_CHAR = '';
    private const INIT_VALUE_OF_SORT_BY = 'created_at,desc';
    private const DELIMITER_FOR_SORT_BY = ',';
    private const INDEX_OF_SORT_KEY = 0;
    private const INDEX_OF_SORT_ORDER = 1;
    private const DISPLAY_FOR_ALL_CATEGORIES = 'ALL';
    private const MAX_NUM_OF_DISPLAYS_PER_PAGE = 12;

    public $category_id = self::INDEX_OF_ALL_CATEGORIES;
    public $keyword     = self::EMPTY_CHAR;
    public $sort_by     = self::INIT_VALUE_OF_SORT_BY;

    protected $queryString = [
        'category_id' => ['except' => self::INDEX_OF_ALL_CATEGORIES],
        'keyword'     => ['except' => self::EMPTY_CHAR],
        'sort_by'
    ];

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingKeyword()
    {
        $this->resetPage();
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function updatedPage()
    {
        $this->dispatchBrowserEvent('page-switching');
    }

    public function render()
    {
        return view('livewire.products.index', [
            'products'        => $this->getProducts(),
            'categories'      => $this->getCategories(),
            'select_category' => $this->getSelectCategory(),
        ])
            ->extends('layouts.template')
            ->section('content');
    }

    private function getProducts()
    {
        return
            Product::when($this->category_id, function ($query, $category_id) {
                return $query->where('category_id', $category_id);
            })
            ->when($this->keyword, function ($query, $keyword) {
                return $query->where('name', 'like', "%{$keyword}%");
            })
            ->orderBy(
                explode(self::DELIMITER_FOR_SORT_BY, $this->sort_by)[self::INDEX_OF_SORT_KEY],
                explode(self::DELIMITER_FOR_SORT_BY, $this->sort_by)[self::INDEX_OF_SORT_ORDER]
            )
            ->paginate(self::MAX_NUM_OF_DISPLAYS_PER_PAGE);
    }

    private function getCategories()
    {
        return
            DB::table('categories')->get();
    }

    private function getSelectCategory()
    {
        if ($this->category_id) {
            return
                DB::table('categories')
                ->select('name')
                ->where('id', $this->category_id)
                ->value('name');
        }
        return self::DISPLAY_FOR_ALL_CATEGORIES;
    }
}
